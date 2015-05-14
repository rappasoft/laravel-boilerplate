<?php namespace App\Handlers\Events\Frontend\Auth;

use App\Events\Frontend\Auth\UserLoggedOut;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class UserLoggedOutHandler implements ShouldBeQueued {

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
	 * @param  UserLoggedOut  $event
	 * @return void
	 */
	public function handle(UserLoggedOut $event)
	{
		\Log::info("User Logged Out: ".$event->user->name);
	}
}
