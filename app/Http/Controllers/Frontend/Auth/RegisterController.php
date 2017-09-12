<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Events\Frontend\Auth\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Frontend\Auth\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

	/**
	 * @var UserRepository
	 */
	protected $user;

	/**
	 * RegisterController constructor.
	 *
	 * @param UserRepository $user
	 */
	public function __construct(UserRepository $user)
	{
		$this->user = $user;
	}

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
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showRegistrationForm()
	{
		return view('frontend.auth.register');
	}

	/**
	 * @param RegisterRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function register(RegisterRequest $request)
	{
		$user = $this->user->create($request->only('first_name', 'last_name', 'email', 'password'));

		// If the user must confirm their email or their account requires approval,
		// create the account but don't log them in.
		if (config('access.users.confirm_email') || config('access.users.requires_approval')) {
			event(new UserRegistered($user));

			return redirect($this->redirectPath())->withFlashSuccess(
				config('access.users.requires_approval') ?
					__('exceptions.frontend.auth.confirmation.created_pending') :
					__('exceptions.frontend.auth.confirmation.created_confirm')
			);
		} else {
			auth()->login($user);

			event(new UserRegistered($user));

			return redirect($this->redirectPath());
		}
	}
}