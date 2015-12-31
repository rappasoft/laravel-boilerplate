<?php

namespace App\Listeners\Frontend\Auth;

use Illuminate\Queue\InteractsWithQueue;
use App\Events\Frontend\Auth\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class UserLoggedInListener
 * @package App\Listeners\Frontend\Auth
 */
class UserLoggedInListener implements ShouldQueue
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
     * @param  UserLoggedIn $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        \Log::info('User Logged In: ' . $event->user->name);
    }
}