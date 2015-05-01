<?php namespace App\Services\Validators\Rules\Auth\User;

use Illuminate\Support\Facades\Config;
use App\Services\Validators\Validator as Validator;

/**
 * Class Update
 * @package App\Services\Validators\Rules\Auth\User
 */
class Update extends Validator {

	/**
	 * @var
	 */
	public static $rules;

	//Default rules in case there aren't any in config file
	/**
	 * @var array
	 */
	public static $defaultRules = [
		'email'			=>	'required|email',
		'name'			=>  'required',
	];

	//Work around to not being able to add non-trivial expressions in initializers.
	static function init() {
		self::$rules = Config::get('vault.validation.users.update') ?
			Config::get('vault.validation.users.update') :
			self::$defaultRules;
	}
}