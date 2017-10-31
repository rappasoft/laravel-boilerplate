<?php

namespace App\Models\Auth\Traits\Method;

/**
 * Trait RoleMethod
 *
 * @package App\Models\Auth\Traits\Method
 */
trait RoleMethod
{

	/**
	 * @return mixed
	 */
	public function isAdmin() {
		return $this->name === config('access.users.admin_role');
	}
}