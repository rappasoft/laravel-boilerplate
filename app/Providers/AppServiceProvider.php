<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Application locale defaults for various components
         *
         * These will be overridden by LocaleMiddleware if the session local is set
         */

        /**
         * setLocale for php. Enables ->formatLocalized() with localized values for dates
         */
        setLocale(LC_TIME, config('app.locale_php'));

        /**
         * setLocale to use Carbon source locales. Enables diffForHumans() localized
         */
        Carbon::setLocale(config('app.locale'));

        /**
         * Set the session variable for whether or not the app is using RTL support
		 * For use in the blade directive in BladeServiceProvider
         */
        if (config('locale.languages')[config('app.locale')][2]) {
            session(['lang-rtl' => true]);
        } else {
            session()->forget('lang-rtl');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Sets third party service providers that are only needed on local environments
         */
        if ($this->app->environment() == 'local') {
            /**
             * Loader for registering facades
             */
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();

            /**
             * Load third party local providers and facades
             */
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
            $loader->alias('Debugbar', \Barryvdh\Debugbar\Facade::class);

            $this->app->register(\Laracasts\Generators\GeneratorsServiceProvider::class);
        }
    }
}
