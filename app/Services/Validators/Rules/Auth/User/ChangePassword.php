<?php namespace App\Services\Validators\Rules\Auth\User;

use App\Services\Validators\Validator as Validator;
use Illuminate\Support\Facades\Config;

class ChangePassword extends Validator {

	public static $rules;

	//Work around to not being able to add non-trivial expressions in initializers.
	static function init() {
		self::$rules = [
			'password'				=>	Config::get('vault.users.password_validation').'|confirmed',
			'password_confirmation'	=>	Config::get('vault.users.password_validation')
		];
	}

}