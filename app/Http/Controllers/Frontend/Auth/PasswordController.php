<?php namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use App\Repositories\Frontend\User\UserContract;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Requests\Frontend\Access\ChangePasswordRequest;
use App\Http\Requests\Frontend\Access\ResetPasswordEmailRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PasswordController
 * @package App\Http\Controllers\Auth
 */
class PasswordController extends Controller {

	use ResetsPasswords;

	/**
	 * @param Guard $auth
	 * @param PasswordBroker $passwords
	 * @param UserContract $user
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords, UserContract $user)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;
		$this->user = $user;
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getEmail()
	{
		return view('frontend.auth.password');
	}

	/**
	 * @param ResetPasswordEmailRequest $request
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function postEmail(ResetPasswordEmailRequest $request)
	{
		$response = $this->passwords->sendResetLink($request->only('email'), function($m)
		{
			$m->subject("Your Password Reset Link");
		});

		switch ($response)
		{
			case PasswordBroker::RESET_LINK_SENT:
				return redirect()->back()->withStatus('status', trans($response));

			case PasswordBroker::INVALID_USER:
				return redirect()->back()->withErrors(['email' => trans($response)]);
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token))
			throw new NotFoundHttpException;
		return view('frontend.auth.reset')->withToken($token);
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getChangePassword() {
		return view('frontend.auth.change-password');
	}

	/**
	 * @param ChangePasswordRequest $request
	 * @return mixed
	 */
	public function postChangePassword(ChangePasswordRequest $request) {
		$this->user->changePassword($request->all());
		return redirect()->route('frontend.dashboard')->withFlashSuccess("Password successfully changed");
	}
}
