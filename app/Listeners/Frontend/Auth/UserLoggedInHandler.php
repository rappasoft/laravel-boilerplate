<?php namespace App\Listeners\Frontend\Auth;

use Illuminate\Queue\InteractsWithQueue;
use App\Events\Frontend\Auth\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class UserLoggedInHandler
 * @package App\Listeners\Frontend\Auth
 */
class UserLoggedInHandler implements ShouldQueue {

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
