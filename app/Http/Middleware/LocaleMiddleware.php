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
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		/**
		 * Locale is enabled and allowed to be changed
		 */
		if (config('locale.status')) {

			if (session()->has('locale') && in_array(session()->get('locale'), array_keys(config('locale.languages')))) {

				/**
				 * Set the Laravel locale
				 */
				app()->setLocale(session()->get('locale'));

				/**
				 * setLocale for php. Enables ->formatLocalized() with localized values for dates
				 */
				setLocale(LC_TIME, config('locale.languages')[session()->get('locale')][1]);

				/**
				 * setLocale to use Carbon source locales. Enables diffForHumans() localized
				 */
				Carbon::setLocale(config('locale.languages')[session()->get('locale')][0]);

				/**
				 * Set the session variable for whether or not the app is using RTL support
				 * for the current language being selected
				 * For use in the blade directive in BladeServiceProvider
				 */
				if (config('locale.languages')[session()->get('locale')][2]) {
					session(['lang-rtl' => true]);
				} else {
					session()->forget('lang-rtl');
				}
			}

		}

		return $next($request);
	}
}