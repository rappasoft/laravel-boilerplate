<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller {

	use AuthenticatesAndRegistersUsers;

	/**
	 * Override the default redirect of 'home'
	 *
	 * @var string
	 */
	protected $redirectTo = "/dashboard";

	/**
	 * @param Guard $auth
	 * @param Registrar $registrar
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getRegister() {
		return view('frontend.auth.register');
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function getLogin() {
		return view('frontend.auth.login');
	}

	/**
	 * @param Request $request
	 * @param $provider
	 * @return mixed
	 */
	public function loginThirdParty(Request $request, $provider) {
		return $this->registrar->loginThirdParty($request->all(), $provider);
	}
}
