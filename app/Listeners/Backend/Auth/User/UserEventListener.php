<?php

namespace App\Listeners\Backend\Auth\User;

/**
 * Class UserEventListener.
 */
class UserEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        \Log::info('User Created');
    }

    /**
     * @param $event
     */
    public function onConfirmed($event)
    {
        \Log::info('User Confirmed');
    }

    /**
     * @param $event
     */
    public function onUnconfirmed($event)
    {
        \Log::info('User Unconfirmed');
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Auth\User\UserCreated::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Auth\User\UserConfirmed::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onConfirmed'
        );

        $events->listen(
            \App\Events\Backend\Auth\User\UserUnconfirmed::class,
            'App\Listeners\Backend\Auth\User\UserEventListener@onUnconfirmed'
        );
    }
}
