<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Foundation\Auth\ResetsPasswords;

/**
 * Class ResetPasswordController.
 */
class ResetPasswordController extends Controller
{
	use ResetsPasswords;

	/**
	 * @var UserRepository
	 */
	protected $user;

	/**
	 * ChangePasswordController constructor.
	 *
	 * @param UserRepository $user
	 */
	public function __construct(UserRepository $user)
	{
		$this->user = $user;
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * If no token is present, display the link request form.
	 *
	 * @param string|null $token
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showResetForm($token = null)
	{
		if (! $token) {
			return redirect()->route('frontend.auth.password.email');
		}

		$user = $this->user->findByPasswordResetToken($token);

		if ($user && app()->make('auth.password.broker')->tokenExists($user, $token)) {
			return view('frontend.auth.passwords.reset')
				->withToken($token)
				->withEmail($user->email);
		}

		return redirect()->route('frontend.auth.password.email')
			->withFlashDanger(__('exceptions.frontend.auth.password.reset_problem'));
	}

	/**
	 * Get the response for a successful password reset.
	 *
	 * @param  string  $response
	 * @return \Illuminate\Http\RedirectResponse
	 */
	protected function sendResetResponse($response)
	{
		return redirect()->route(homeRoute())->withFlashSuccess(trans($response));
	}
}
