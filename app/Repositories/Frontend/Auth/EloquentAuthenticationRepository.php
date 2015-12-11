<?php

namespace App\Repositories\Frontend\Auth;

use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use App\Exceptions\GeneralException;
use App\Models\Access\User\User;
use App\Repositories\Frontend\User\UserContract;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;

/**
 * Class Registrar
 * @package App\Services
 */
class EloquentAuthenticationRepository implements AuthenticationContract
{
    /**
     * @var Socialite
     */
    private $socialite;
    /**
     * @var Guard
     */
    private $auth;
    /**
     * @var UserContract
     */
    private $users;

    /**
     * @param Socialite    $socialite
     * @param Guard        $auth
     * @param UserContract $users
     */
    public function __construct(Socialite $socialite, Guard $auth, UserContract $users)
    {
        $this->socialite = $socialite;
        $this->users     = $users;
        $this->auth      = $auth;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        return $this->users->create($data);
    }

    /**
     * @param  $request
     * @throws GeneralException
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login($request)
    {
        if ($this->auth->attempt($request->only('email', 'password'), $request->has('remember'))) {
            $this->isBannedOrDeactivated($this->auth->user());

            if ($this->auth->user()->confirmed == 0) {
                $user_id = $this->auth->user()->id;
                $this->auth->logout();
                throw new GeneralException('Your account is not confirmed. Please click the confirmation link in your e-mail, or ' . '<a href="' . route('account.confirm.resend', $user_id) . '">click here</a>' . ' to resend the confirmation e-mail.');
            }

            event(new UserLoggedIn($this->auth->user()));
            return true;
        }

        throw new GeneralException('These credentials do not match our records.');
    }

    /**
     * Log the user out and fire an event
     */
    public function logout()
    {
        event(new UserLoggedOut($this->auth->user()));
        $this->auth->logout();
    }

    /**
     * Socialite Functions
     */

    /**
     * @param  $request
     * @param  $provider
     * @throws GeneralException
     * @return bool|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function loginThirdParty($request, $provider)
    {
        /**
         * The first time this is hit, request is empty
         * It's redirected to the provider and then back here, where request is populated
         * So it then continues creating the user
         */
        if (!$request) {
            return $this->getAuthorizationFirst($provider);
        }

        /**
         * Create the user if this is a new social account or find the one that is already there
         */
        $user = $this->users->findByUsernameOrCreate($this->getSocialUser($provider), $provider);

        /**
         * See if the user has been banned or deactivated from the admin area
         * They should be by default active the first time they log in with a social account
         */
        $this->isBannedOrDeactivated($user);

        /**
         * User has been successfully created or already exists
         * Log the user in and redirect to the dashboard
         */
        $this->auth->login($user, true);

        /**
         * Throw an event in case you want to do anything when the user logs in
         */
        event(new UserLoggedIn($user));

        /**
         * Set session variable so we know which provider user is logged in as, if ever needed
         */
        session([config('access.socialite_session_name') => $provider]);

        /**
         * Redirect back to the user dashboard with them logged in
         */
        return redirect()->route('frontend.dashboard');
    }

    /**
     * @param  $provider
     * @return mixed
     */
    public function getAuthorizationFirst($provider)
    {
        /**
         * Both scopes and with are set
         */
        if (count(config("services.{$provider}.scopes")) && count(config("services.{$provider}.with"))) {
            return $this->socialite->driver($provider)
                ->scopes(config("services.{$provider}.scopes"))
                ->with(config("services.{$provider}.with"))
                ->redirect();
        }

        /**
         * Just scopes are set
         */
        if (count(config("services.{$provider}.scopes")) && !count(config("services.{$provider}.with"))) {
            return $this->socialite->driver($provider)
                ->scopes(config("services.{$provider}.scopes"))
                ->redirect();
        }

        /**
         * Just with is set
         */
        if (!count(config("services.{$provider}.scopes")) && count(config("services.{$provider}.with"))) {
            return $this->socialite->driver($provider)
                ->with(config("services.{$provider}.with"))
                ->redirect();
        }

        /**
         * Neither scopes or with are set
         */
        return $this->socialite->driver($provider)
            ->redirect();
    }

    /**
     * @param  $provider
     * @return \Laravel\Socialite\Contracts\User
     */
    public function getSocialUser($provider)
    {
        return $this->socialite->driver($provider)
            ->user();
    }

    /**
     * @param  $token
     * @return mixed
     */
    public function confirmAccount($token)
    {
        return $this->users->confirmAccount($token);
    }

    /**
     * @param  $user_id
     * @return mixed
     */
    public function resendConfirmationEmail($user_id)
    {
        return $this->users->sendConfirmationEmail($user_id);
    }

    /**
     * @param  $user
     * @throws GeneralException
     * @return bool
     */
    public function isBannedOrDeactivated($user)
    {
        if ($user instanceof User) {
            if ($user->isBanned()) {
                throw new GeneralException('Your account has been banned.');
            }

            if ($user->isDeactivated()) {
                throw new GeneralException('Your account has been deactivated.');
            }

        }

        return true;
    }
}
