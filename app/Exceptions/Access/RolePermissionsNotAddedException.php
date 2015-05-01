<?php namespace App\Exceptions\Access;

/**
 * Class RolePermissionsNotAddedException
 * @package App\Exceptions\Access
 */
class RolePermissionsNotAddedException extends \Exception {

	/**
	 * @var
	 */
	protected $role_id;
	/**
	 * @var
	 */
	protected $errors;

	/**
	 * @param $role_id
	 */
	public function setRoleID($role_id)
	{
		$this->role_id = $role_id;
	}

	/**
	 * @return mixed
	 */
	public function roleID()
	{
		return $this->role_id;
	}

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