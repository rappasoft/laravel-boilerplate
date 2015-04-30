<?php namespace App\Exceptions;

class EntityNotValidException extends \Exception {

	protected $errors;

	public function setValidationErrors($errors)
	{
		$this->errors = $errors;
	}

	public function validationErrors()
	{
		return $this->errors;
	}
}