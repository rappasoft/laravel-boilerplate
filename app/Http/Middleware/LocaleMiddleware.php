<?php namespace App\Http\Middleware;

use Closure;

/**
 * Class LocaleMiddleware
 * @package App\Http\Middleware
 */
class LocaleMiddleware
{

    /**
     * @var array
     */
    protected $languages = ['en', 'es', 'fr-FR', 'it', 'pl', 'pt-BR', 'ru', 'sv'];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('locale') && in_array(session()->get('locale'), $this->languages))
        {
            app()->setLocale(session()->get('locale'));
        }

        return $next($request);
    }
}