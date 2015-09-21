<?php namespace App\Http\Middleware;

use Closure;

/**
 * Class RouteNeedsRole
 * @package App\Http\Middleware
 */
class RouteNeedsRole {

	/**
	 * @param $request
	 * @param callable $next
	 * @param $role
	 * @return mixed
     */
	public function handle($request, Closure $next, $role)
	{
		if (! access()->hasRole($role))
			return redirect('/')->withFlashDanger("You do not have access to do that.");
		return $next($request);
	}
}
