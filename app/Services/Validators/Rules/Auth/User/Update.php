<?php namespace App\Services\Validators\Rules\Auth\User;

use App\Services\Validators\Validator as Validator;
use Illuminate\Support\Facades\Config;

class Update extends Validator {

	public static $rules;

	//Default rules in case there aren't any in config file
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