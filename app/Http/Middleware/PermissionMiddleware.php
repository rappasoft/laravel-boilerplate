<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class PermissionMiddleware.
 */
class PermissionMiddleware
{
    /**
     * @param         $request
     * @param Closure $next
     * @param         $permission
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (auth()->guest()) {
            return redirect()
                ->route(home_route())
                ->withFlashDanger(__('auth.general_error'));
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        foreach ($permissions as $permission) {
            if (auth()->user()->can($permission)) {
                return $next($request);
            }
        }

        return redirect()
            ->route(home_route())
            ->withFlashDanger(__('auth.general_error'));
    }
}
