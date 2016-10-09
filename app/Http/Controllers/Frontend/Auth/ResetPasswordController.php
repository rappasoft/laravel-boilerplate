<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

/**
 * Class ResetPasswordController
 * @package App\Http\Controllers\Frontend\Auth
 */
class ResetPasswordController extends Controller
{
    use ResetsPasswords;

	/**
	 * Where to redirect users after resetting password
	 *
	 * @return string
	 */
	public function redirectPath() {
		return route('frontend.index');
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * If no token is present, display the link request form.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  string|null  $token
	 * @return \Illuminate\Http\Response
	 */
	public function showResetForm(Request $request, $token = null)
	{
		return view('frontend.auth.passwords.reset')
			->withToken($token)
			->withEmail($request->email);
	}
}