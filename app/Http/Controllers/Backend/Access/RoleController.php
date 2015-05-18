<?php namespace App\Http\Controllers\Backend\Access;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Role\RoleRepositoryContract;
use App\Repositories\Backend\Permission\PermissionRepositoryContract;
use App\Http\Requests\Backend\Access\Role\CreateRoleRequest;
use App\Http\Requests\Backend\Access\Role\UpdateRoleRequest;

/**
 * Class RoleController
 * @package App\Http\Controllers\Access
 */
class RoleController extends Controller {

	/**
	 * @var RoleRepositoryContract
	 */
	protected $roles;
	/**
	 * @var PermissionRepositoryContract
	 */
	protected $permissions;

	/**
	 * @param RoleRepositoryContract $roles
	 * @param PermissionRepositoryContract $permissions
	 */
	public function __construct(
		RoleRepositoryContract $roles,
		PermissionRepositoryContract $permissions) {
		$this->roles = $roles;
		$this->permissions = $permissions;
	}

	/**
	 * @return mixed
	 */
	public function index() {
		return view('backend.access.roles.index')
			->withRoles($this->roles->getRolesPaginated(50));
	}

	/**
	 * @return mixed
	 */
	public function create() {
		return view('backend.access.roles.create')
			->withPermissions($this->permissions->getPermissionsNotAssociatedWithUser());
	}

	/**
	 * @param CreateRoleRequest $request
	 * @return mixed
	 */
	public function store(CreateRoleRequest $request) {
		$this->roles->create($request->except('role_permissions'), $request->only('role_permissions'));
		return redirect()->route('admin.access.roles.index')->withFlashSuccess('The role was successfully created.');
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function edit($id) {
		$role = $this->roles->findOrThrowException($id, true);
		return view('backend.access.roles.edit')
			->withRole($role)
			->withRolePermissions($role->permissions->lists('id')->all())
			->withPermissions($this->permissions->getPermissionsNotAssociatedWithUser());
	}

	/**
	 * @param $id
	 * @param UpdateRoleRequest $request
	 * @return mixed
	 */
	public function update($id, UpdateRoleRequest $request) {
		$this->roles->update($id, $request->except('role_permissions'), $request->only('role_permissions'));
		return redirect()->route('admin.access.roles.index')->withFlashSuccess('The role was successfully updated.');
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function destroy($id) {
		$this->roles->destroy($id);
		return redirect()->route('admin.access.roles.index')->withFlashSuccess('The role was successfully deleted.');
	}
}