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
	 * @param null $params
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
	 */
	public function handle($request, Closure $next, $params = null)
	{
		$assets = $this->getAssets($request, $params);

		dd($assets);

		if (! access()->hasRoles($assets['roles'], $assets['needsAll']))
			return $this->getRedirectMethodAndGo($request, $params);
		return $next($request);
	}
}
