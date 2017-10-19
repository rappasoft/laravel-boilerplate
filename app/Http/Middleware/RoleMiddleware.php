<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class RoleMiddleware.
 */
class RoleMiddleware
{
    /**
     * @param         $request
     * @param Closure $next
     * @param         $role
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->guest()) {
            return redirect()
                ->route(home_route())
                ->withFlashDanger(__('auth.general_error'));
        }

        $role = is_array($role)
            ? $role
            : explode('|', $role);

        if (! auth()->user()->hasAnyRole($role)) {
            return redirect()
                ->route(home_route())
                ->withFlashDanger(__('auth.general_error'));
        }

        return $next($request);
    }
}
