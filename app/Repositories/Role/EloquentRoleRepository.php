<?php namespace App\Repositories\Role;

use Exception;
use Illuminate\Support\Facades\Config;
use App\Role;

class EloquentRoleRepository implements RoleRepositoryContract {

	/**
	 * Find item or throw exception
	 */
	public function findOrThrowException($id, $withPermissions = false) {

		if ( ! is_null(Role::find($id))) {
			if ($withPermissions)
				return Role::with('permissions')->find($id);

			return Role::find($id);
		}

		throw new Exception('That role does not exist.');
	}

	/*
	 * Get paginated list of permissions
	 * param $per_page
	 */
	public function getRolesPaginated($per_page, $order_by = 'id', $sort = 'asc') {
		return Role::with('permissions')->orderBy($order_by, $sort)->paginate($per_page);
	}

	/*
	 * Get all permissions
	 */
	public function getAllRoles($order_by = 'id', $sort = 'asc', $withPermissions = false) {
		if ($withPermissions)
			return Role::with('permissions')->orderBy($order_by, $sort)->get();

		return Role::orderBy($order_by, $sort)->get();
	}

	/*
	 * Create the role
	 */
	public function create($input, $permissions) {
		//Validate
		if (strlen($input['name']) == 0)
			throw new Exception('You must specify the role name.');

		if (Role::where('name', '=', $input['name'])->first())
			throw new Exception('That role already exists. Please choose a different name.');

		//See if the role must contain a permission as per config
		if (Config::get('vault.roles.role_must_contain_permission') && count($permissions['role_permissions']) == 0)
		{
			throw new Exception('You must select at least one permission for this role.');
		}

		$role = new Role;
		$role->name = $input['name'];

		if ($role->save()) {
			//Attach permissions
			if (count($permissions['role_permissions']) > 0)
				$role->attachPermissions($permissions['role_permissions']);

			return true;
		}

		throw new Exception("There was a problem creating this role. Please try again.");
	}

	/*
	 * Update the role
	 */
	public function update($id, $input, $permissions) {
		$role = $this->findOrThrowException($id);

		//Validate
		if (strlen($input['name']) == 0)
			throw new Exception('You must specify the role name.');

		//See if the role must contain a permission as per config
		if (Config::get('vault.roles.role_must_contain_permission') && count($permissions['role_permissions']) == 0)
		{
			throw new Exception('You must select at least one permission for this role.');
		}

		$role->name = $input['name'];

		if ($role->save()) {
			//Attach permissions
			if (count($permissions['role_permissions']) > 0)
				$role->attachPermissions($permissions['role_permissions']);

			return true;
		}

		throw new Exception('There was a problem updating this role. Please try again.');
	}

	/*
	 * Delete the specified user
	 */
	public function destroy($id) {
		//Would be stupid to delete the administrator role
		if ($id == 1) //id is 1 because of the seeder
			throw new Exception("You can not delete the Administrator role.");

		$role = $this->findOrThrowException($id, true);

		//Dont delete the role is there are users associated
		if ($role->users()->count() > 0)
			throw new Exception("You can not delete a role with associated users.");

		//Detach all associated roles
		$role->permissions()->sync([]);

		if ($role->delete())
			return true;

		throw new Exception("There was a problem deleting this role. Please try again.");
	}
}