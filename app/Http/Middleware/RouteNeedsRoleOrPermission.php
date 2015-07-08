<?php namespace App\Http\Middleware;

use Closure;
use App\Services\Access\Traits\AccessParams;

/**
 * Class RouteNeedsRole
 * @package App\Http\Middleware
 */
class RouteNeedsRoleOrPermission {

	use AccessParams;

	/**
	 * @param $request
	 * @param callable $next
	 * @param null $params
	 * @return bool|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
	 */
	public function handle($request, Closure $next, $params = null)
	{
		$assets = $this->getAssets($request, $params);

		if ($assets['needsAll']) {
			if (! access()->hasRoles($assets['roles'], true) || ! access()->canMultiple($assets['permissions'], true)) {
				return $this->getRedirectMethodAndGo($request, $params);
			}
		} else {
			if (! access()->hasRoles($assets['roles'], false) && ! access()->canMultiple($assets['permissions'], false)) {
				return $this->getRedirectMethodAndGo($request, $params);
			}
		}

		return $next($request);
	}
}