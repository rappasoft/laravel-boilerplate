<?php namespace App\Services\Validators;

use Illuminate\Support\Facades\Validator as Validate;
use Illuminate\Support\Facades\Input;

abstract class Validator {

	protected $attributes;
	public $errors;

	public function __construct($attributes = null) {

		$this->attributes = $attributes ?: Input::all();
	}

	public function passes() {
		$validation = Validate::make($this->attributes, static::$rules, isset(static::$messages) ? static::$messages : []);

		if ($validation->passes()) return true;

		$this->errors = $validation->messages();

		return false;
	}
}