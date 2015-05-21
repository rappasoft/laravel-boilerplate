<?php namespace App\Repositories\Backend\Role;

use App\Role;
use App\Exceptions\GeneralException;

/**
 * Class EloquentRoleRepository
 * @package App\Repositories\Role
 */
class EloquentRoleRepository implements RoleRepositoryContract {

	/**
	 * @param $id
	 * @param bool $withPermissions
	 * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|null|static
	 * @throws GeneralException
	 */
	public function findOrThrowException($id, $withPermissions = false) {
		if (! is_null(Role::find($id))) {
			if ($withPermissions)
				return Role::with('permissions')->find($id);

			return Role::find($id);
		}

		throw new GeneralException('That role does not exist.');
	}

	/**
	 * @param $per_page
	 * @param string $order_by
	 * @param string $sort
	 * @return mixed
	 */
	public function getRolesPaginated($per_page, $order_by = 'id', $sort = 'asc') {
		return Role::with('permissions')->orderBy($order_by, $sort)->paginate($per_page);
	}

	/**
	 * @param string $order_by
	 * @param string $sort
	 * @param bool $withPermissions
	 * @return mixed
	 */
	public function getAllRoles($order_by = 'id', $sort = 'asc', $withPermissions = false) {
		if ($withPermissions)
			return Role::with('permissions')->orderBy($order_by, $sort)->get();

		return Role::orderBy($order_by, $sort)->get();
	}

	/**
	 * @param $input
	 * @param $permissions
	 * @return bool
	 * @throws GeneralException
	 */
	public function create($input, $permissions) {
		if (Role::where('name', '=', $input['name'])->first())
			throw new GeneralException('That role already exists. Please choose a different name.');

		//See if the role must contain a permission as per config
		if (config('access.roles.role_must_contain_permission') && count($permissions['role_permissions']) == 0)
			throw new GeneralException('You must select at least one permission for this role.');

		$role = new Role;
		$role->name = $input['name'];

		if ($role->save()) {
			//Attach permissions
			if (count($permissions['role_permissions']) > 0)
				$role->attachPermissions($permissions['role_permissions']);

			return true;
		}

		throw new GeneralException("There was a problem creating this role. Please try again.");
	}

	/**
	 * @param $id
	 * @param $input
	 * @param $permissions
	 * @return bool
	 * @throws GeneralException
	 */
	public function update($id, $input, $permissions) {
		$role = $this->findOrThrowException($id);

		//Validate
		if (strlen($input['name']) == 0)
			throw new GeneralException('You must specify the role name.');

		//See if the role must contain a permission as per config
		if (config('access.roles.role_must_contain_permission') && count($permissions['role_permissions']) == 0)
			throw new GeneralException('You must select at least one permission for this role.');

		$role->name = $input['name'];

		if ($role->save()) {
			$role->savePermissions($permissions['role_permissions']);
			return true;
		}

		throw new GeneralException('There was a problem updating this role. Please try again.');
	}

	/**
	 * @param $id
	 * @return bool
	 * @throws GeneralException
	 */
	public function destroy($id) {
		//Would be stupid to delete the administrator role
		if ($id == 1) //id is 1 because of the seeder
			throw new GeneralException("You can not delete the Administrator role.");

		$role = $this->findOrThrowException($id, true);

		//Don't delete the role is there are users associated
		if ($role->users()->count() > 0)
			throw new GeneralException("You can not delete a role with associated users.");

		//Detach all associated roles
		$role->permissions()->sync([]);

		if ($role->delete())
			return true;

		throw new GeneralException("There was a problem deleting this role. Please try again.");
	}

	/**
	 * @return mixed
	 */
	public function getDefaultUserRole() {
		return Role::where('name', config('access.users.default_role'))->first();
	}
}