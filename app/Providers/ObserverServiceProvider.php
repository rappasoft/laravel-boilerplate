<?php

namespace App\Providers;

use App\Models\Auth\User;
use App\Observers\User\UserObserver;
use Illuminate\Support\ServiceProvider;

/**
 * Class ObserverServiceProvider.
 */
class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}
