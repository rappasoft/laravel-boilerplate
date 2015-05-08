<?php namespace App\Http\Controllers\Frontend\Auth;

use App\Services\Registrar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Access\LoginRequest;
use App\Http\Requests\Frontend\Access\RegisterRequest;

/**
 * Class AuthController
 * @package App\Http\Controllers\Frontend\Auth
 */
class AuthController extends Controller {

	/**
	 * @param Registrar $registrar
	 */
	public function __construct(Registrar $registrar)
	{
		$this->registrar = $registrar;
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
		$this->registrar->login($this->registrar->create($request->all()));
		return redirect()->route('frontend.dashboard');
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
		$this->registrar->login($request);
		return redirect()->intended('/dashboard');
	}

	/**
	 * @param Request $request
	 * @param $provider
	 * @return mixed
	 */
	public function loginThirdParty(Request $request, $provider) {
		$this->registrar->loginThirdParty($request->all(), $provider);
		return redirect()->route('frontend.dashboard');
	}

	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function getLogout()
	{
		$this->registrar->logout();
		return redirect()->route('home');
	}
}
