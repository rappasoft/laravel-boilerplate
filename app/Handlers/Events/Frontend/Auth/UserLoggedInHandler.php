<?php namespace App\Handlers\Events\Frontend\Auth;

use App\Events\Frontend\Auth\UserLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class UserLoggedInHandler implements ShouldBeQueued {

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
	 * @param  UserLoggedIn  $event
	 * @return void
	 */
	public function handle(UserLoggedIn $event)
	{
		\Log::info("User Logged In: ".$event->user->name);
	}
}
