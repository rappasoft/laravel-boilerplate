<?php namespace App\Repositories\Backend\Permission;

use App\Models\Access\Permission\Permission;
use App\Exceptions\GeneralException;
use App\Repositories\Backend\Role\RoleRepositoryContract;

/**
 * Class EloquentPermissionRepository
 * @package App\Repositories\Permission
 */
class EloquentPermissionRepository implements PermissionRepositoryContract {

	/**
	 * @var RoleRepositoryContract
	 */
	protected $roles;

	/**
	 * @param RoleRepositoryContract $roles
	 */
	public function __construct(RoleRepositoryContract $roles) {
		$this->roles = $roles;
	}

	/**
	 * @param $id
	 * @param bool $withRoles
	 * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|null|static
	 * @throws GeneralException
	 */
	public function findOrThrowException($id, $withRoles = false) {
		if (! is_null(Permission::find($id))) {
			if ($withRoles)
				return Permission::with('roles')->find($id);

			return Permission::find($id);
		}

		throw new GeneralException('That permission does not exist.');
	}

	/**
	 * @param $per_page
	 * @param string $order_by
	 * @param string $sort
	 * @return mixed
	 */
	public function getPermissionsPaginated($per_page, $order_by = 'id', $sort = 'asc') {
		return Permission::with('roles')->orderBy($order_by, $sort)->paginate($per_page);
	}

	/**
	 * @param string $order_by
	 * @param string $sort
	 * @param bool $withRoles
	 * @return mixed
	 */
	public function getAllPermissions($order_by = 'id', $sort = 'asc', $withRoles = true) {
		if ($withRoles)
			return Permission::with('roles')->orderBy($order_by, $sort)->get();

		return Permission::orderBy($order_by, $sort)->get();
	}

	/**
	 * @param $input
	 * @param $roles
	 * @return bool
	 * @throws GeneralException
	 */
	public function create($input, $roles) {
		$permission = new Permission;
		$permission->name = $input['name'];
		$permission->display_name = $input['display_name'];
		$permission->system = isset($input['system']) ? 1 : 0;

		$this->permissionMustContainRole($roles);

		if ($permission->save()) {
			//For each role, load role, collect perms, add perm to perms, flush perms, read perms
			if (count($roles['permission_roles']) > 0)
			{
				foreach ($roles['permission_roles'] as $role_id)
				{
					//Get the role, with permissions
					$role = $this->roles->findOrThrowException($role_id, true);

					//Get the roles permissions into an array
					$role_permissions = $role->permissions->lists('id')->all();

					if (count($role_permissions) >= 1)
					{
						//Role has permissions, gather them first

						//Add this new permission id to the role
						array_push($role_permissions, $permission->id);

						//For some reason the lists() casts as a string, convert all to int
						$role_permissions_temp = array();
						foreach ($role_permissions as $rp)
						{
							array_push($role_permissions_temp, (int)$rp);
						}
						$role_permissions = $role_permissions_temp;

						//Sync the permissions to the role
						$role->permissions()->sync($role_permissions);
					} else
					{
						//Role has no permissions, add the 1
						$role->permissions()->sync([$permission->id]);
					}
				}
			}

			return true;
		}

		throw new GeneralException("There was a problem creating this permission. Please try again.");
	}

	/**
	 * @param $id
	 * @param $input
	 * @param $roles
	 * @return bool
	 * @throws GeneralException
	 */
	public function update($id, $input, $roles) {
		$permission = $this->findOrThrowException($id);
		$permission->name = $input['name'];
		$permission->display_name = $input['display_name'];
		$permission->system = isset($input['system']) ? 1 : 0;

		//See if this permission is tied directly to a user first
		if (count($permission->users) > 0)
			throw new GeneralException('This permission is currently tied directly to one or more users and can not be assigned to a role.');

		$this->permissionMustContainRole($roles);

		if ($permission->save()) {
			//Detach permission from every role, then add the permission to the selected roles
			$currentRoles = $this->roles->getAllRoles();
			foreach ($currentRoles as $role) {
				$role->detachPermission($permission);
			}

			if (count($roles['permission_roles']) > 0)
			{
				//For each role, load role, collect perms, add perm to perms, flush perms, read perms
				foreach ($roles['permission_roles'] as $role_id)
				{
					//Get the role, with permissions
					$role = $this->roles->findOrThrowException($role_id, true);

					//Get the roles permissions into an array
					$role_permissions = $role->permissions->lists('id')->all();

					if (count($role_permissions) >= 1)
					{
						//Role has permissions, gather them first

						//Add this new permission id to the role
						array_push($role_permissions, $permission->id);

						//For some reason the lists() casts as a string, convert all to int
						$role_permissions_temp = array();
						foreach ($role_permissions as $rp)
						{
							array_push($role_permissions_temp, (int)$rp);
						}
						$role_permissions = $role_permissions_temp;

						//Sync the permissions to the role
						$role->permissions()->sync($role_permissions);
					} else
					{
						//Role has no permissions, add the 1
						$role->permissions()->sync([$permission->id]);
					}
				}
			}

			return true;
		}

		throw new GeneralException("There was a problem updating this permission. Please try again.");
	}

	/**
	 * @param $id
	 * @return bool
	 * @throws GeneralException
	 */
	public function destroy($id) {
		$permission = $this->findOrThrowException($id);

		if ($permission->system == 1)
			throw new GeneralException("You can not delete a system permission.");

		//Remove the permission from all associated roles
		$currentRoles = $permission->roles;
		foreach ($currentRoles as $role) {
			$role->detachPermission($permission);
		}

		//Remove the permission from all associated users
		$currentUsers = $permission->users;
		foreach ($currentUsers as $user) {
			$user->detachPermission($permission);
		}

		if ($permission->delete())
			return true;

		throw new GeneralException("There was a problem deleting this permission. Please try again.");
	}

	/**
	 * @param $roles
	 * @throws GeneralException
	 */
	private function permissionMustContainRole($roles)
	{
		if (config('access.permissions.permission_must_contain_role'))
			if (count($roles['permission_roles']) == 0)
				throw new GeneralException('You must select at least one role for this permission.');
	}
}