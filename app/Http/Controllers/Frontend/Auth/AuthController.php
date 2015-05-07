<?php namespace App\Http\Controllers\Frontend\Auth;

use App\Handlers\Events\Auth\UserLoggedIn;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\Access\LoginRequest;

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
	 * @param LoginRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws Exception
	 */
	public function postLogin(LoginRequest $request)
	{
		if ($this->auth->attempt($request->only('email', 'password'), $request->has('remember')))
		{

			if (auth()->user()->status == 0)
			{
				auth()->logout();
				return redirect()
					->back()
					->withInput()
					->withFlashDanger("Your account is currently deactivated.");
			}

			if (auth()->user()->status == 2)
			{
				auth()->logout();
				return redirect()
					->back()
					->withInput()
					->withFlashDanger("Your account is currently banned.");
			}

			event(new UserLoggedIn(auth()->user()));
			return redirect()->intended($this->redirectPath());
		}

		return redirect()
			->back()
			->withInput()
			->withFlashDanger($this->getFailedLoginMessage());
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
