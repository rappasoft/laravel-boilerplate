<?php namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\AuthenticationContract;
use App\Http\Requests\Frontend\Access\LoginRequest;
use App\Http\Requests\Frontend\Access\RegisterRequest;
use App\Exceptions\GeneralException;

/**
 * Class AuthController
 * @package App\Http\Controllers\Frontend\Auth
 */
class AuthController extends Controller {

	/**
	 * @param AuthenticationContract $auth
	 */
	public function __construct(AuthenticationContract $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getRegister() {
		return view('frontend.auth.register');
	}

	/**
	 * @param RegisterRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postRegister(RegisterRequest $request)
	{
		if (config('access.users.confirm_email')) {
			$this->auth->create($request->all());
			return redirect()->route('home')->withFlashSuccess("Your account was successfully created. We have sent you an e-mail to confirm your account.");
		} else {
			$this->auth->login($this->auth->create($request->all()));
			return redirect()->route('frontend.dashboard');
		}
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getLogin() {
		return view('frontend.auth.login');
	}

	/**
	 * @param LoginRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postLogin(LoginRequest $request)
	{
		//Don't know why the exception handler is not catching this
		try {
			$this->auth->login($request);
			return redirect()->intended('/dashboard');
		} catch (GeneralException $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
		}
	}

	/**
	 * @param Request $request
	 * @param $provider
	 * @return mixed
	 */
	public function loginThirdParty(Request $request, $provider) {
		return $this->auth->loginThirdParty($request->all(), $provider);
	}

	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function getLogout()
	{
		$this->auth->logout();
		return redirect()->route('home');
	}

	/**
	 * @param $token
	 * @return mixed
	 * @throws \App\Exceptions\GeneralException
	 */
	public function confirmAccount($token) {
		//Don't know why the exception handler is not catching this
		try {
			$this->auth->confirmAccount($token);
			return redirect()->route('frontend.dashboard')->withFlashSuccess("Your account has been successfully confirmed!");
		} catch (GeneralException $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
		}
	}

	/**
	 * @param $user_id
	 * @return mixed
	 */
	public function resendConfirmationEmail($user_id) {
		//Don't know why the exception handler is not catching this
		try {
			$this->auth->resendConfirmationEmail($user_id);
			return redirect()->route('home')->withFlashSuccess("A new confirmation e-mail has been sent to the address on file.");
		} catch (GeneralException $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
		}
	}
}
