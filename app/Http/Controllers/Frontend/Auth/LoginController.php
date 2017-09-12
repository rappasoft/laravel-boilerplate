<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use App\Exceptions\GeneralException;
use App\Helpers\Frontend\Auth\Socialite;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\UserSessionRepository;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers\Frontend\Auth
 */
class LoginController extends Controller
{

    use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		return route(homeRoute());
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showLoginForm()
	{
		return view('frontend.auth.login')
			->withSocialiteLinks((new Socialite)->getSocialLinks());
	}

	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function username()
	{
		return config('access.users.username');
	}

	/**
	 * The user has been authenticated.
	 *
	 * @param Request $request
	 * @param         $user
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws GeneralException
	 */
	protected function authenticated(Request $request, $user)
	{
		/*
         * Check to see if the users account is confirmed and active
         */
		if (! $user->isConfirmed()) {
			auth()->logout();

			// If the user is pending (account approval is on)
			if ($user->isPending()) {
				throw new GeneralException(__('exceptions.frontend.auth.confirmation.pending'));
			}

			// Otherwise see if they want to resent the confirmation e-mail
			throw new GeneralException(__('exceptions.frontend.auth.confirmation.resend', ['user_id' => $user->id]));
		} elseif (! $user->isActive()) {
			auth()->logout();
			throw new GeneralException(__('exceptions.frontend.auth.deactivated'));
		}

		event(new UserLoggedIn($user));

		// If only allowed one session at a time
		if (config('access.users.single_login')) {
			resolve(UserSessionRepository::class)->clearSessionExceptCurrent($user);
		}

		return redirect()->intended($this->redirectPath());
	}

	/**
	 * Log the user out of the application.
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function logout(Request $request)
	{
		/*
		 * Remove the socialite session variable if exists
		 */
		if (app('session')->has(config('access.socialite_session_name'))) {
			app('session')->forget(config('access.socialite_session_name'));
		}

		/*
		 * Remove any session data from backend
		 */
		// TODO
		//app()->make(Auth::class)->flushTempSession();

		/*
		 * Fire event, Log out user, Redirect
		 */
		event(new UserLoggedOut($request->user()));

		/*
		 * Laravel specific logic
		 */
		$this->guard()->logout();
		$request->session()->invalidate();

		return redirect()->route('frontend.index');
	}
}
