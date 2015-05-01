<?php namespace App\Services\Validators\Rules\Auth\User;

use Illuminate\Support\Facades\Config;
use App\Services\Validators\Validator as Validator;

/**
 * Class ChangePassword
 * @package App\Services\Validators\Rules\Auth\User
 */
class ChangePassword extends Validator {

	/**
	 * @var
	 */
	public static $rules;

	//Work around to not being able to add non-trivial expressions in initializers.
	/**
	 *
	 */
	static function init() {
		self::$rules = [
			'password'				=>	Config::get('vault.users.password_validation').'|confirmed',
			'password_confirmation'	=>	Config::get('vault.users.password_validation')
		];
	}
}