<?php namespace App\Services;

use App\User;
use App\Exceptions\GeneralException;
use App\Repositories\Frontend\User\UserContract;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;

/**
 * Class Registrar
 * @package App\Services
 */
class Registrar {

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
	 * @param Socialite $socialite
	 * @param Guard $auth
	 * @param UserContract $users
	 */
	public function __construct(Socialite $socialite, Guard $auth, UserContract $users) {
		$this->socialite = $socialite;
		$this->users = $users;
		$this->auth = $auth;
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
	 * @param $request
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws GeneralException
	 */
	public function login($request) {
		if ($this->auth->attempt($request->only('email', 'password'), $request->has('remember')))
		{

			if ($this->auth->user()->status == 0)
			{
				$this->auth->logout();
				throw new GeneralException("Your account is currently deactivated.");
			}

			if ($this->auth->user()->status == 2)
			{
				$this->auth->logout();
				throw new GeneralException("Your account is currently banned.");
			}

			event(new UserLoggedIn($this->auth->user()));
			return true;
		}

		throw new GeneralException('These credentials do not match our records.');
	}

	/**
	 * Log the user out and fire an event
	 */
	public function logout() {
		event(new UserLoggedOut($this->auth->user()));
		$this->auth->logout();
	}

	/**
	 * Socialite Functions
	 */

	/**
	 * @param $request
	 * @param $provider
	 * @return bool|\Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function loginThirdParty($request, $provider) {
		if (! $request) return $this->getAuthorizationFirst($provider);
		$user = $this->users->findByUserNameOrCreate($this->getSocialUser($provider), $provider);
		$this->auth->login($user, true);
		event(new UserLoggedIn($user));
		return true;
	}

	/**
	 * @param $provider
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	private function getAuthorizationFirst($provider) {
		return $this->socialite->driver($provider)->redirect();
	}

	/**
	 * @param $provider
	 * @return \Laravel\Socialite\Contracts\User
	 */
	private function getSocialUser($provider) {
		return $this->socialite->driver($provider)->user();
	}
}
