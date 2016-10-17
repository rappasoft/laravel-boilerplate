<?php

namespace App\Helpers\Auth;

use App\Models\Access\User\User;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

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
		//Remove any old session variables
		session()->forget("admin_user_id");
		session()->forget("admin_user_name");
		session()->forget("temp_user_id");
	}

	/**
	 * @param User $user
	 */
	public function sendConfirmationEmail(User $user) {
		$user->notify(new UserNeedsConfirmation($user->confirmation_code));
	}
}