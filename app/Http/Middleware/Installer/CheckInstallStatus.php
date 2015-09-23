<?php namespace App\Http\Middleware\Installer;

use Closure;
use Illuminate\Support\Facades\DB;

/**
 * Class CheckInstallStatus
 * @package App\Http\Middleware\Installer
 */
class CheckInstallStatus
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

        if(empty($tables))
            return redirect("install");

        return $next($request);
    }
}