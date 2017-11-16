<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

/**
 * Class BladeServiceProvider.
 */
class BladeServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register any misc. blade extensions.
     */
    public function register()
    {
        /*
         * The block of code inside this directive indicates
         * the chosen language requests RTL support.
         */
        Blade::if('langrtl', function ($session_identifier = 'lang-rtl') {
            return session()->has($session_identifier);
        });
    }
}
