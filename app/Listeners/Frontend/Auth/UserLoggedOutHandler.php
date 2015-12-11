<?php

namespace App\Listeners\Frontend\Auth;

use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

/**
 * Class UserLoggedOutHandler
 * @package App\Listeners\Frontend\Auth
 */
class UserLoggedOutHandler implements ShouldQueue
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
