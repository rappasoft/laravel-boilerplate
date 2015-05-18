<?php namespace App\Http\Middleware;

use Closure;
use App\Services\Access\Traits\AccessRoute;

/**
 * Class RouteNeedsRole
 * @package App\Http\Middleware
 */
class RouteNeedsRole {

	use AccessRoute;

	/**
	 * @param $request
	 * @param callable $next
	 * @param null $roles
	 * @param null $needsAll
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
	 */
	public function handle($request, Closure $next, $roles = null, $needsAll = null)
	{
		$assets = $this->getAssets($request);
		$roles = !is_null($roles) ? (strpos($roles, "|") !== false ? explode("|", $roles) : $roles) : $assets['roles'];
		$needsAll = !is_null($needsAll) ? (bool)$needsAll : $assets['needsAll'];

		if (! access()->hasRoles($roles, $needsAll))
			return $this->getRedirectMethodAndGo($request);

		return $next($request);
	}
}
