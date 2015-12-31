<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class RouteNeedsRole
 * @package App\Http\Middleware
 */
class RouteNeedsPermission
{
    /**
     * @param  $request
     * @param  callable      $next
     * @param  $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (! access()->allow($permission)) {
            return redirect()
                ->route('frontend.index')
                ->withFlashDanger(trans('auth.general_error'));
        }

        return $next($request);
    }
}
