<?php namespace App\Exceptions;

/**
 * Class EntityNotValidException
 * @package App\Exceptions
 */
class EntityNotValidException extends \Exception {

	/**
	 * @var
	 */
	protected $errors;

	/**
	 * @param $errors
	 */
	public function setValidationErrors($errors)
	{
		$this->errors = $errors;
	}

	/**
	 * @return mixed
	 */
	public function validationErrors()
	{
		return $this->errors;
	}
}