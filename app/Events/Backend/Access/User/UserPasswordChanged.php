<?php

namespace App\Events\Backend\Access\User;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserPasswordChanged
 * @package App\Events\Backend\Access\User
 */
class UserPasswordChanged extends Event
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