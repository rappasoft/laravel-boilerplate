<?php namespace App\Services\Validators\Rules\Auth\User;

use Illuminate\Support\Facades\Config;
use App\Services\Validators\Validator as Validator;

/**
 * Class Create
 * @package App\Services\Validators\Rules\Auth\User
 */
class Create extends Validator {

	/**
	 * @var
	 */
	public static $rules;

	//Default rules in case there aren't any in config file
	/**
	 * @var array
	 */
	public static $defaultRules = [
		'name'					=>  'required',
		'email'					=>	'required|email|unique:users',
		'password'				=>	'required|alpha_num|min:6|confirmed',
		'password_confirmation'	=>	'required|alpha_num|min:6',
	];

	//Work around to not being able to add non-trivial expressions in initializers.
	static function init() {
		self::$rules = Config::get('vault.validation.users.create') ?
			Config::get('vault.validation.users.create') :
			self::$defaultRules;
	}
}