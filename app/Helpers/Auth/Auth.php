<?php

namespace App\Helpers\Auth;

/**
 * Class Auth
 * @package App\Helpers\Auth
 */
class Auth {

	/**
	 * Remove old session variables from admin logging in as user
	 */
	public function flushTempSession()
	{
		// Remove any old session variables
		session()->forget("admin_user_id");
		session()->forget("admin_user_name");
		session()->forget("temp_user_id");
	}
}