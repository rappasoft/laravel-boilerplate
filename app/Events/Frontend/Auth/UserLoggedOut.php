<?php namespace App\Events\Frontend\Auth;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class UserLoggedOut extends Event {

	use SerializesModels;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

}
