<?php namespace App\Services\Access\Traits;

use Illuminate\Support\Facades\Config;

/**
 * Class UserHasRole
 * @package App\Services\Access\Traits
 */
trait UserHasRole {

	use AccessAttributes;

	/**
	 * Many-to-Many relations with Role.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function roles()
	{
		return $this->belongsToMany(Config::get('access.role'), Config::get('access.assigned_roles_table'), 'user_id', 'role_id');
	}

	/**
	 * Many-to-Many relations with Permission.
	 * ONLY GETS PERMISSIONS ARE ARE NOT ASSOCIATED WITH A ROLE
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function permissions()
	{
		return $this->belongsToMany(Config::get('access.permission'), Config::get('access.permission_user_table'), 'user_id', 'permission_id');
	}

	/**
	 * Checks if the user has a Role by its name.
	 *
	 * @param string $name Role name.
	 *
	 * @return bool
	 */
	public function hasRole($name)
	{
		foreach ($this->roles as $role) {
			if ($role->name == $name) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Checks to see if user has array of roles
	 * All must return true
	 * @param $roles
	 * @return bool
	 */
	public function hasRoles($roles, $needsAll) {
		//User has to possess all of the roles specified
		if ($needsAll)
		{
			$hasRoles = 0;
			$numRoles = count($roles);

			foreach ($roles as $role)
			{
				if ($this->hasRole($role))
					$hasRoles++;
			}

			return $numRoles == $hasRoles;
		}

		//User has to possess one of the roles specified
		$hasRoles = 0;
		foreach ($roles as $role) {
			if ($this->hasRole($role))
				$hasRoles++;
		}

		return $hasRoles > 0;
	}

	/**
	 * Check if user has a permission by its name.
	 *
	 * @param string $permission Permission string.
	 *
	 * @return bool
	 */
	public function can($permission)
	{
		foreach ($this->roles as $role) {
			// Validate against the Permission table
			foreach ($role->permissions as $perm) {
				if ($perm->name == $permission)
					return true;
			}
		}

		//Check permissions directly tied to user
		foreach ($this->permissions as $perm) {
			if ($perm->name == $permission)
				return true;
		}

		return false;
	}

	/**
	 * Check an array of permissions and whether or not all are required to continue
	 * @param $permissions
	 * @param $needsAll
	 * @return bool
	 */
	public function canMultiple($permissions, $needsAll = false) {
		//User has to possess all of the permissions specified
		if ($needsAll)
		{
			$hasPermissions = 0;
			$numPermissions = count($permissions);

			foreach ($permissions as $perm)
			{
				if ($this->can($perm))
					$hasPermissions++;
			}

			return $numPermissions == $hasPermissions;
		}

		//User has to possess one of the permissions specified
		$hasPermissions = 0;
		foreach ($permissions as $perm) {
			if ($this->can($perm))
				$hasPermissions++;
		}

		return $hasPermissions > 0;
	}

	/**
	 * Alias to eloquent many-to-many relation's attach() method.
	 *
	 * @param mixed $role
	 *
	 * @return void
	 */
	public function attachRole($role)
	{
		if( is_object($role))
			$role = $role->getKey();

		if( is_array($role))
			$role = $role['id'];

		$this->roles()->attach($role);
	}

	/**
	 * Alias to eloquent many-to-many relation's detach() method.
	 *
	 * @param mixed $role
	 *
	 * @return void
	 */
	public function detachRole($role)
	{
		if (is_object($role)) {
			$role = $role->getKey();
		}

		if (is_array($role)) {
			$role = $role['id'];
		}

		$this->roles()->detach($role);
	}

	/**
	 * Attach multiple roles to a user
	 *
	 * @param mixed $roles
	 *
	 * @return void
	 */
	public function attachRoles($roles)
	{
		foreach ($roles as $role) {
			$this->attachRole($role);
		}
	}

	/**
	 * Detach multiple roles from a user
	 *
	 * @param mixed $roles
	 *
	 * @return void
	 */
	public function detachRoles($roles)
	{
		foreach ($roles as $role) {
			$this->detachRole($role);
		}
	}

	/**
	 * Attach one permission not associated with a role directly to a user
	 *
	 * @param $permission
	 */
	public function attachPermission($permission) {
		if( is_object($permission))
			$permission = $permission->getKey();

		if( is_array($permission))
			$permission = $permission['id'];

		$this->permissions()->attach($permission);
	}

	/**
	 * Attach other permissions not associated with a role directly to a user
	 *
	 * @param $permissions
	 */
	public function attachPermissions($permissions) {
		if (count($permissions))
		{
			foreach ($permissions as $perm)
			{
				$this->attachPermission($perm);
			}
		}
	}

	/**
	 * Detach one permission not associated with a role directly to a user
	 *
	 * @param $permission
	 */
	public function detachPermission($permission) {
		if( is_object($permission))
			$permission = $permission->getKey();

		if( is_array($permission))
			$permission = $permission['id'];

		$this->permissions()->detach($permission);
	}

	/**
	 * Detach other permissions not associated with a role directly to a user
	 *
	 * @param $permissions
	 */
	public function detachPermissions($permissions) {
		foreach ($permissions as $perm) {
			$this->detachPermission($perm);
		}
	}
}