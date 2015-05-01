<?php namespace App\Services\Validators\Rules\Auth\Permission;

use App\Services\Validators\Validator as Validator;

/**
 * Class Create
 * @package App\Services\Validators\Rules\Auth\Permission
 */
class Create extends Validator {

	/**
	 * @var array
	 */
	public static $rules = [
		'name'			=>  'required',
		'display_name'	=>	'required',
	];
}