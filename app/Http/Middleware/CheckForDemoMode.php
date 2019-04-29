<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

/**
 * Class CheckForDemoMode.
 */
class CheckForDemoMode
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (config('app.demo')) {
            if ($request->isMethod('post') || $request->isMethod('patch') || $request->isMethod('delete')) {
                abort_if($request->path() !== 'login', Response::HTTP_UNAUTHORIZED);
            }
        }

        return $next($request);
    }
}
