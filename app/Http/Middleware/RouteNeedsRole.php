<?php namespace App\Http\Middleware;

use Closure;
use App\Services\Access\Facades\Access;
use App\Services\Access\Traits\AccessRoute;

/**
 * Class RouteNeedsRole
 * @package App\Http\Middleware
 */
class RouteNeedsRole {

	use AccessRoute;

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$assets = $this->getAssets($request);

		if (! Access::hasRoles($assets['roles'], $assets['needsAll']))
			return $this->getRedirectMethodAndGo($request);

		return $next($request);
	}
}
