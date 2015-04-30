<?php namespace App\Services\Validators\Rules\Auth\Permission;

use App\Services\Validators\Validator as Validator;

class Create extends Validator {

	public static $rules = [
		'name'			=>  'required',
		'display_name'	=>	'required',
	];

}