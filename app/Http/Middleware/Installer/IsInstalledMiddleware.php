<?php namespace App\Http\Middleware\Installer;

use Closure;
use Illuminate\Support\Facades\DB;

/**
 * Class IsInstalledMiddleware
 * @package App\Http\Middleware\Installer
 */
class IsInstalledMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tables = DB::select('SHOW TABLES');

        if(! empty($tables))
            abort(404);

        return $next($request);
    }
}