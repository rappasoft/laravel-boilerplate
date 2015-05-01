<?php namespace App\Services\Validators;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator as Validate;

/**
 * Class Validator
 * @package App\Services\Validators
 */
abstract class Validator {

	/**
	 * @var
	 */
	protected $attributes;
	/**
	 * @var
	 */
	public $errors;

	/**
	 * @param null $attributes
	 */
	public function __construct($attributes = null) {

		$this->attributes = $attributes ?: Input::all();
	}

	/**
	 * @return bool
	 */
	public function passes() {
		$validation = Validate::make($this->attributes, static::$rules, isset(static::$messages) ? static::$messages : []);

		if ($validation->passes()) return true;

		$this->errors = $validation->messages();

		return false;
	}
}