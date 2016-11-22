<?php

namespace App\Events\Frontend\Auth;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserConfirmed
 * @package App\Events\Frontend\Auth
 */
class UserConfirmed extends Event
{
	use SerializesModels;

	/**
	 * @var $user
	 */
	public $user;

	/**
	 * @param $user
	 */
	public function __construct($user)
	{
		$this->user = $user;
	}
}