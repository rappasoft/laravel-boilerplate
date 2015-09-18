<?php namespace App\Http\Controllers\Backend\Access;

use App\Http\Controllers\Controller;
use App\Models\Access\Permission\PermissionGroup;
use App\Repositories\Backend\Role\RoleRepositoryContract;
use App\Repositories\Backend\Permission\PermissionRepositoryContract;
use App\Repositories\Backend\Permission\Group\PermissionGroupRepositoryContract;
use App\Http\Requests\Backend\Access\Permission\CreatePermissionRequest;
use App\Http\Requests\Backend\Access\Permission\UpdatePermissionRequest;

/**
 * Class PermissionController
 * @package App\Http\Controllers\Access
 */
class PermissionController extends Controller {

	/**
	 * @var RoleRepositoryContract
	 */
	protected $roles;

	/**
	 * @var PermissionRepositoryContract
	 */
	protected $permissions;

	/**
	 * @var PermissionGroupRepositoryContract
     */
	protected $groups;

	/**
	 * @param RoleRepositoryContract $roles
	 * @param PermissionRepositoryContract $permissions
	 * @param PermissionGroupRepositoryContract $groups
     */
	public function __construct(RoleRepositoryContract $roles, PermissionRepositoryContract $permissions, PermissionGroupRepositoryContract $groups) {
		$this->roles = $roles;
		$this->permissions = $permissions;
		$this->groups = $groups;
	}

	/**
	 * @return mixed
	 */
	public function index() {
		return view('backend.access.roles.permissions.index')
			->withPermissions($this->permissions->getPermissionsPaginated(50))
			->withGroups($this->groups->getGroupsPaginated(50));
	}

	/**
	 * @return mixed
	 */
	public function create() {
		return view('backend.access.roles.permissions.create')
			->withRoles($this->roles->getAllRoles());
	}

	/**
	 * @param CreatePermissionRequest $request
	 * @return mixed
	 */
	public function store(CreatePermissionRequest $request) {
		$this->permissions->create($request->except('permission_roles'), $request->only('permission_roles'));
		return redirect()->route('admin.access.roles.permissions.index')->withFlashSuccess(trans("alerts.permissions.created"));
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function edit($id) {
		$permission = $this->permissions->findOrThrowException($id, true);
		return view('backend.access.roles.permissions.edit')
			->withPermission($permission)
			->withPermissionRoles($permission->roles->lists('id')->all())
			->withRoles($this->roles->getAllRoles());
	}

	/**
	 * @param $id
	 * @param UpdatePermissionRequest $request
	 * @return mixed
	 */
	public function update($id, UpdatePermissionRequest $request) {
		$this->permissions->update($id, $request->except('permission_roles'), $request->only('permission_roles'));
		return redirect()->route('admin.access.roles.permissions.index')->withFlashSuccess(trans("alerts.permissions.created"));
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function destroy($id) {
		$this->permissions->destroy($id);
		return redirect()->route('admin.access.roles.permissions.index')->withFlashSuccess(trans("alerts.permissions.deleted"));
	}
}