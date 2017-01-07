<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Repositories\Frontend\Access\User\UserRepository;
use App\Helpers\Frontend\Auth\Socialite as SocialiteHelper;

/**
 * Class SocialLoginController.
 */
class SocialLoginController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * @var SocialiteHelper
     */
    protected $helper;

    /**
     * SocialLoginController constructor.
     *
     * @param UserRepository  $user
     * @param SocialiteHelper $helper
     */
    public function __construct(UserRepository $user, SocialiteHelper $helper)
    {
        $this->user = $user;
        $this->helper = $helper;
    }

    /**
     * @param Request $request
     * @param $provider
     *
     * @throws GeneralException
     *
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function login(Request $request, $provider)
    {
        //If the provider is not an acceptable third party than kick back
        if (! in_array($provider, $this->helper->getAcceptedProviders())) {
            return redirect()->route('frontend.index')->withFlashDanger(trans('auth.socialite.unacceptable', ['provider' => $provider]));
        }

        /*
         * The first time this is hit, request is empty
         * It's redirected to the provider and then back here, where request is populated
         * So it then continues creating the user
         */
        if (! $request->all()) {
            return $this->getAuthorizationFirst($provider);
        }

        /**
         * Create the user if this is a new social account or find the one that is already there.
         */
        $user = $this->user->findOrCreateSocial($this->getSocialUser($provider), $provider);

        /*
         * User has been successfully created or already exists
         * Log the user in
         */
        auth()->login($user, true);

        /*
         * User authenticated, check to see if they are active.
         */
        if (! access()->user()->isActive()) {
            access()->logout();
            throw new GeneralException(trans('exceptions.frontend.auth.deactivated'));
        }

        /*
         * Throw an event in case you want to do anything when the user logs in
         */
        event(new UserLoggedIn($user));

        /*
         * Set session variable so we know which provider user is logged in as, if ever needed
         */
        session([config('access.socialite_session_name') => $provider]);

        /*
         * Return to the intended url or default to the class property
         */
        return redirect()->intended(route('frontend.index'));
    }

    /**
     * @param  $provider
     *
     * @return mixed
     */
    private function getAuthorizationFirst($provider)
    {
        $socialite = Socialite::driver($provider);
        $scopes = count(config("services.{$provider}.scopes")) ? config("services.{$provider}.scopes") : false;
        $with = count(config("services.{$provider}.with")) ? config("services.{$provider}.with") : false;
        $fields = count(config("services.{$provider}.fields")) ? config("services.{$provider}.fields") : false;

        if ($scopes) {
            $socialite->scopes($scopes);
        }

        if ($with) {
            $socialite->with($with);
        }

        if ($fields) {
            $socialite->fields($fields);
        }

        return $socialite->redirect();
    }

    /**
     * @param $provider
     *
     * @return mixed
     */
    private function getSocialUser($provider)
    {
        return Socialite::driver($provider)->user();
    }
}
