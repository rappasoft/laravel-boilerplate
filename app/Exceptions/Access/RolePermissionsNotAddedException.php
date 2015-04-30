<?php namespace App\Exceptions\Access;

class RolePermissionsNotAddedException extends \Exception {

	protected $role_id;
	protected $errors;

	public function setRoleID($role_id)
	{
		$this->role_id = $role_id;
	}

	public function roleID()
	{
		return $this->role_id;
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