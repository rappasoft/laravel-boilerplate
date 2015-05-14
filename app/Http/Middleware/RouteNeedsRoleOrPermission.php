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
			if (! access()->hasRoles($assets['roles'], true) || ! access()->canMultiple($assets['permissions'], true))
				return $this->getRedirectMethodAndGo($request);
		} else {
			if (! access()->hasRoles($assets['roles'], false) && ! access()->canMultiple($assets['permissions'], false))
				return $this->getRedirectMethodAndGo($request);
		}

		return $next($request);
	}
}
