<?php

namespace App\Services\Access\Traits;

use Illuminate\Http\Request;
use Illuminate\Cache\RateLimiter;
use App\Exceptions\GeneralException;
use App\Events\Frontend\Auth\UserLoggedIn;
use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Http\Requests\Frontend\Auth\LoginRequest;
use App\Repositories\Backend\Access\User\UserRepositoryContract;

/**
 * Class AuthenticatesUsers
 * @package App\Services\Access\Traits
 */
trait AuthenticatesUsers
{
    use RedirectsUsers;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('frontend.auth.login')
            ->withSocialiteLinks($this->getSocialLinks())
			->withCaptcha($this->hasCaptchaSession());
    }

    /**
     * @param LoginRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = in_array(
            ThrottlesLogins::class, class_uses_recursive(get_class($this))
        );

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        if (auth()->attempt($request->only($this->loginUsername(), 'password'), $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
			$this->loginNeedsCaptcha($request, $throttles);
            $this->incrementLoginAttempts($request);
        }

        return redirect()->back()
            ->withInput($request->only($this->loginUsername(), 'remember'))
			->withCaptcha($this->hasCaptchaSession())
            ->withErrors([$this->loginUsername() => trans('auth.failed')]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        /**
         * Remove the socialite session variable if exists
         */
        if (app('session')->has(config('access.socialite_session_name'))) {
            app('session')->forget(config('access.socialite_session_name'));
        }

		/**
		 * Remove any session data from backend
		 */
		app()->make(UserRepositoryContract::class)->flushTempSession();

		/**
		 * Fire event, Log out user, Redirect
		 */
        event(new UserLoggedOut(access()->user()));
        access()->logout();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }

    /**
     * This is here so we can use the default Laravel ThrottlesLogins trait
     *
     * @return string
     */
    public function loginUsername()
    {
        return 'email';
    }

    /**
     * @param Request $request
     * @param $throttles
     * @return \Illuminate\Http\RedirectResponse
     * @throws GeneralException
     */
    protected function handleUserWasAuthenticated(Request $request, $throttles)
    {
        if ($throttles) {
			$this->clearCaptchaSession();
            $this->clearLoginAttempts($request);
        }

        /**
         * Check to see if the users account is confirmed and active
         */
        if (! access()->user()->isConfirmed()) {
            $id = access()->user()->id;
            access()->logout();
            throw new GeneralException(trans('exceptions.frontend.auth.confirmation.resend', ['user_id' => $id]));
        } elseif (! access()->user()->isActive()) {
            access()->logout();
            throw new GeneralException(trans('exceptions.frontend.auth.deactivated'));
        }

        event(new UserLoggedIn(access()->user()));
        return redirect()->intended($this->redirectPath());
    }

	/**
	 * @return bool
	 */
	private function hasCaptchaSession() {
		return session()->has(config('access.captcha.session_key')) && session()->get(config('access.captcha.session_key')) === true;
	}

	/**
	 *
	 */
	private function clearCaptchaSession() {
		session()->forget(config('access.captcha.session_key'));
	}

	/**
	 * @param $request
	 * @param $throttles
	 * @return bool
	 */
	private function loginNeedsCaptcha($request, $throttles) {
		// If throttling is enabled
		if ($throttles) {
			if ($this->hasCaptchaSession()) {
				return true;
			} else {
				// If the login captcha is enabled
				if (config('access.captcha.login')) {
					/**
					 * If the current login attempts exceed the minimum amount set for the captcha
					 * then the session variable will be true until it expires or the user logs in
					 */
					session([
						config('access.captcha.session_key') =>
							app(RateLimiter::class)->attempts($this->getThrottleKey($request)) > (int)config('access.captcha.login_tries')
					]);
				}
			}
		}

		return false;
	}
}