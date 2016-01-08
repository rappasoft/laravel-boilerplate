<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

/**
 * Class LocaleMiddleware
 * @package App\Http\Middleware
 */
class LocaleMiddleware
{
    /**
     * @var array
     */
    protected $languages = [
        'en'    => ['en', 'en_US'],
        'fr-FR' => ['fr', 'fr_FR'],
        'sv'    => ['sv', 'sv_SE'],
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if (session()->has('locale') && array_key_exists(session()->get('locale'), $this->languages)) {
                app()->setLocale(session()->get('locale'));

                // setLocale for php. Enables ->formatLocalized() with localized values for dates
                setLocale(LC_TIME, $this->languages[ session()->get('locale') ][1] );

                // setLocale to use Carbon source locales. Enables diffForHumans() localized
                Carbon::setLocale( $this->languages[ session()->get('locale') ][0] );
            }
        return $next($request);
    }
}
