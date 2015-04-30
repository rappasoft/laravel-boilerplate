<?php namespace App\Observers;

use Illuminate\Support\Facades\Hash;

class UserObserver {

	/**
	 * @param $user
	 * Hashes the users password if the developer wasn't already hashing it via an other method
	 * such as an attribute
	 * @return bool
	 */
	public function creating($user)
	{
		if (Hash::needsRehash($user->password))
		{
			$user->password = Hash::make($user->password);
		}

		return true;
	}

	/**
	 * @param $user
	 * Hashes the users password if the developer wasn't already hashing it via an other method
	 * such as an attribute
	 * @return bool
	 */
	public function saving($user)
	{
		if (Hash::needsRehash($user->password))
		{
			$user->password = Hash::make($user->password);
		}

		return true;
	}
}