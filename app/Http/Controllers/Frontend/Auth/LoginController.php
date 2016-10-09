<?php

namespace App\Http\Controllers\Frontend\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions\GeneralException;
use App\Helpers\Frontend\Auth\Socialite;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Repositories\Backend\Access\User\UserRepository;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login
	 * @return string
	 */
	public function redirectPath()
	{
		if (access()->allow('view-backend')) {
			return route('admin.dashboard');
		}

		return route('frontend.user.dashboard');
	}

	/**
	 * Show the application's login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showLoginForm()
	{
		return view('frontend.auth.login')
			->withSocialiteLinks((new Socialite)->getSocialLinks());
	}

	/**
	 * @param Request $request
	 * @param $user
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws GeneralException
	 */
	protected function authenticated(Request $request, $user)
	{
		/**
		 * Check to see if the users account is confirmed and active
		 */
		if (! $user->isConfirmed()) {
			access()->logout();
			throw new GeneralException(trans('exceptions.frontend.auth.confirmation.resend', ['user_id' => $user->id]));
		} elseif (! $user->isActive()) {
			access()->logout();
			throw new GeneralException(trans('exceptions.frontend.auth.deactivated'));
		}

		event(new UserLoggedIn($user));
		return redirect()->intended($this->redirectPath());
	}

	/**
	 * Log the user out of the application.
	 *
	 * @param  Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function logout(Request $request)
	{
		/**
		 * Boilerplate needed logic
		 */

		/**
		 * Remove the socialite session variable if exists
		 */
		if (app('session')->has(config('access.socialite_session_name'))) {
			app('session')->forget(config('access.socialite_session_name'));
		}

		/**
		 * Remove any session data from backend
		 */
		app()->make(UserRepository::class)->flushTempSession();

		/**
		 * Fire event, Log out user, Redirect
		 */
		event(new UserLoggedOut($this->guard()->user()));

		/**
		 * Laravel specific logic
		 */
		$this->guard()->logout();
		$request->session()->flush();
		$request->session()->regenerate();

		return redirect('/');
	}
}