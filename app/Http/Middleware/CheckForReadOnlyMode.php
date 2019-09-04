<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

/**
 * Class CheckForReadOnlyMode.
 */
class CheckForReadOnlyMode
{
    /**
     * @var array
     */
    protected $disallowed = [
        'confirm',
        'unconfirm',
        'mark/0',
        'mark/1',
        'clear-session',
    ];

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
        if (config('app.read_only')) {
            // Block all login requests that are not login
            if ($request->isMethod('post') || $request->isMethod('patch') || $request->isMethod('delete')) {
                abort_if($request->path() !== 'login', Response::HTTP_UNAUTHORIZED);
            }

            // Block any other specific get requests that may alter data
            if ($request->isMethod('get')) {
                collect($this->disallowed)
                    ->each(function ($item) use ($request) {
                        if (strpos($request->path(), $item) !== false) {
                            abort(Response::HTTP_UNAUTHORIZED);
                        }
                    });
            }
        }

        return $next($request);
    }
}
