<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Force SSL in production
        // if ($this->app->environment() === 'production') {
        //    URL::forceScheme('https');
        // }

        // Fix Specified key was too long error
        // Schema::defaultStringLength(191);
    }
}
