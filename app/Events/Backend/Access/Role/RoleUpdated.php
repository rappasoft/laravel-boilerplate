<?php

namespace App\Events\Backend\Access\Role;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleUpdated
 * @package App\Events\Backend\Access\Role
 */
class RoleUpdated extends Event
{
	use SerializesModels;

	/**
	 * @var $role
	 */
	public $role;

	/**
	 * @param $role
	 */
	public function __construct($role)
	{
		$this->role = $role;
	}
}