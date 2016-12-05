<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Repositories\Frontend\Access\User\UserRepository;

/**
 * Class ResetPasswordController
 * @package App\Http\Controllers\Frontend\Auth
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
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
    	$this->user = $user;
    }

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
	 * @param  string|null  $token
	 * @return \Illuminate\Http\Response
	 */
	public function showResetForm($token = null)
	{
		return view('frontend.auth.passwords.reset')
			->withToken($token)
			->withEmail($this->user->getEmailForPasswordToken($token));
	}
}
