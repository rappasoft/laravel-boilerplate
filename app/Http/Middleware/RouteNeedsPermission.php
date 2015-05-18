<?php namespace App\Http\Middleware;

use Closure;
use App\Services\Access\Traits\AccessRoute;

/**
 * Class RouteNeedsRole
 * @package App\Http\Middleware
 */
class RouteNeedsPermission {

	use AccessRoute;

	/**
	 * @param $request
	 * @param callable $next
	 * @param null $permissions
	 * @param null $needsAll
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
	 */
	public function handle($request, Closure $next, $permissions = null, $needsAll = null)
	{
		$assets = $this->getAssets($request);
		$permissions = !is_null($permissions) ? (strpos($permissions, "|") !== false ? explode("|", $permissions) : $permissions) : $assets['permissions'];
		$needsAll = !is_null($needsAll) ? (bool)$needsAll : $assets['needsAll'];

		if (! access()->canMultiple($permissions, $needsAll))
			return $this->getRedirectMethodAndGo($request);

		return $next($request);
	}
}