<?php

namespace App\Listeners\Frontend\Auth;

use Illuminate\Queue\InteractsWithQueue;
use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class UserLoggedOutListener
 * @package App\Listeners\Frontend\Auth
 */
class UserLoggedOutListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedOut $event
     * @return void
     */
    public function handle(UserLoggedOut $event)
    {
        \Log::info('User Logged Out: ' . $event->user->name);
    }
}