<?php namespace App\Http\Middleware;

use Closure;
use App\Services\Access\Traits\AccessRoute;

/**
 * Class RouteNeedsRole
 * @package App\Http\Middleware
 */
class RouteNeedsRoleOrPermission {

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

		if ($assets['needsAll']) {
			if (! \Access::hasRoles($assets['roles'], true) || ! \Access::canMultiple($assets['permissions'], true))
				return $this->getRedirectMethodAndGo($request);
		} else {
			if (! \Access::hasRoles($assets['roles'], false) && ! \Access::canMultiple($assets['permissions'], false))
				return $this->getRedirectMethodAndGo($request);
		}

		return $next($request);
	}

}
