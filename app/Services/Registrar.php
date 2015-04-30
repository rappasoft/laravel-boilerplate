<?php namespace App\Services;

use App\User;
use App\Repositories\User\UserContract;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Laravel\Socialite\Contracts\Factory as Socialite;

/**
 * Class Registrar
 * @package App\Services
 */
class Registrar implements RegistrarContract {

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
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
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
	 * @param $provider
	 * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function loginThirdParty($request, $provider) {
		if (! $request) return $this->getAuthorizationFirst($provider);
		$user = $this->users->findByUserNameOrCreate($this->getSocialUser($provider), $provider);
		$this->auth->login($user, true);
		return redirect('dashboard');
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
