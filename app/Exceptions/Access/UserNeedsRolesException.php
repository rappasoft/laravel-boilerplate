<?php namespace App\Exceptions\Access;

class UserNeedsRolesException extends \Exception {
	protected $user_id;
	protected $errors;

	public function setUserID($user_id)
	{
		$this->user_id = $user_id;
	}

	public function userID()
	{
		return $this->user_id;
	}

	public function setValidationErrors($errors)
	{
		$this->errors = $errors;
	}

	public function validationErrors()
	{
		return $this->errors;
	}
}