<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\Store;

/**
 * Class SessionTimeout
 * @package App\Http\Middleware
 */
class SessionTimeout {

	/**
	 * @var Store
	 */
	protected $session;

	/**
	 * @var mixed
	 */
	protected $timeout;

	/**
	 * @param Store $session
	 */
	public function __construct(Store $session){
		$this->session = $session;
		$this->timeout = config('misc.session_timeout');
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (config('misc.session_timeout_status')) {
			$isLoggedIn = $request->path() != '/logout';

			if (!session('lastActivityTime')) {
				$this->session->put('lastActivityTime', time());
			} elseif (time() - $this->session->get('lastActivityTime') > $this->timeout) {
				$this->session->forget('lastActivityTime');
				$cookie = cookie('intend', $isLoggedIn ? url()->current() : 'admin/dashboard');
				$email = $request->user()->email;
				access()->logout();

				return redirect()->to('/login')->withFlashWarning('You had no activity in ' . $this->timeout / 60 . ' minutes so you were automatically logged out for security.')->withInput(compact('email'))->withCookie($cookie);
			}

			$isLoggedIn ? $this->session->put('lastActivityTime', time()) : $this->session->forget('lastActivityTime');
		}

		return $next($request);
	}
}