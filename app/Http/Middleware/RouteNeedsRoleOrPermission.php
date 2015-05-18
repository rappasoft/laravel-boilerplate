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
	 * @param $request
	 * @param callable $next
	 * @param null $roles
	 * @param null $permissions
	 * @param null $needsAll
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
	 */
	public function handle($request, Closure $next, $roles = null, $permissions = null, $needsAll = null)
	{
		$assets = $this->getAssets($request);
		$roles = !is_null($roles) ? (strpos($roles, "|") !== false ? explode("|", $roles) : $roles) : $assets['roles'];
		$permissions = !is_null($permissions) ? (strpos($permissions, "|") !== false ? explode("|", $permissions) : $permissions) : $assets['permissions'];
		$needsAll = !is_null($needsAll) ? (bool)$needsAll : $assets['needsAll'];

		if (! access()->hasRoles($roles, $needsAll) || ! access()->canMultiple($permissions, $needsAll))
				return $this->getRedirectMethodAndGo($request);

		return $next($request);
	}
}