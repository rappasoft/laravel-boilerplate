<?php namespace App\Http\Controllers\Backend\Access;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Permission\Group\PermissionGroupRepositoryContract;
use App\Repositories\Backend\Role\RoleRepositoryContract;
use App\Http\Requests\Backend\Access\Role\CreateRoleRequest;
use App\Http\Requests\Backend\Access\Role\UpdateRoleRequest;
use App\Repositories\Backend\Permission\PermissionRepositoryContract;

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
	public function __construct(RoleRepositoryContract $roles, PermissionRepositoryContract $permissions) {
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
	 * @param PermissionGroupRepositoryContract $group
	 * @return mixed
     */
	public function create(PermissionGroupRepositoryContract $group) {
		return view('backend.access.roles.create')
			->withGroups($group->getAllGroups())
			->withPermissions($this->permissions->getUngroupedPermissions());
	}

	/**
	 * @param CreateRoleRequest $request
	 * @return mixed
	 */
	public function store(CreateRoleRequest $request) {
		$this->roles->create($request->all());
		return redirect()->route('admin.access.roles.index')->withFlashSuccess(trans("alerts.roles.created"));
	}

	/**
	 * @param $id
	 * @param PermissionGroupRepositoryContract $group
	 * @return mixed
     */
	public function edit($id, PermissionGroupRepositoryContract $group) {
		$role = $this->roles->findOrThrowException($id, true);
		return view('backend.access.roles.edit')
			->withRole($role)
			->withRolePermissions($role->permissions->lists('id')->all())
			->withGroups($group->getAllGroups())
			->withPermissions($this->permissions->getUngroupedPermissions());
	}

	/**
	 * @param $id
	 * @param UpdateRoleRequest $request
	 * @return mixed
	 */
	public function update($id, UpdateRoleRequest $request) {
		$this->roles->update($id, $request->all());
		return redirect()->route('admin.access.roles.index')->withFlashSuccess(trans("alerts.roles.updated"));
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function destroy($id) {
		$this->roles->destroy($id);
		return redirect()->route('admin.access.roles.index')->withFlashSuccess(trans("alerts.roles.deleted"));
	}
}