<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 * @package App\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /**
         * Frontend Events
         */
        \App\Events\Frontend\Auth\UserLoggedIn::class  => [
            \App\Listeners\Frontend\Auth\UserLoggedInHandler::class,
        ],
        \App\Events\Frontend\Auth\UserLoggedOut::class => [
            \App\Listeners\Frontend\Auth\UserLoggedOutHandler::class,
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
