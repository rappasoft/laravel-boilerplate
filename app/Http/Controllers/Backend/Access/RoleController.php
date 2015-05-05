<?php namespace App\Http\Controllers\Backend\Access;

use Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Repositories\Role\RoleRepositoryContract;
use App\Repositories\Permission\PermissionRepositoryContract;

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
	 * @return mixed
	 */
	public function create() {
		return view('backend.access.roles.create')
			->withPermissions($this->permissions->getPermissionsNotAssociatedWithUser());
	}

	/**
	 * @return mixed
	 */
	public function store() {
		try {
			$this->roles->create(Input::except('role_permissions'), Input::only('role_permissions'));
		} catch (Exception $e) {
			return redirect()->route('admin.access.roles.create')->withInput()->withFlashDanger($e->getMessage());
		}

		return redirect()->route('admin.access.roles.index')->withFlashSuccess('The role was successfully created.');
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function edit($id) {
		try
		{
			$role = $this->roles->findOrThrowException($id, true);

			return view('backend.access.roles.edit')
				->withRole($role)
				->withRolePermissions($role->permissions->lists('id'))
				->withPermissions($this->permissions->getPermissionsNotAssociatedWithUser());
		} catch (Exception $e) {
			return redirect()->route('admin.access.roles.index')->withInput()->withFlashDanger($e->getMessage());
		}
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function update($id) {
		try {
			$this->roles->update($id, Input::except('role_permissions'), Input::only('role_permissions'));
		} catch (Exception $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
		}

		return redirect()->route('admin.access.roles.index')->withFlashSuccess('The role was successfully updated.');
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function destroy($id) {
		try {
			$this->roles->destroy($id);
		} catch (Exception $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
		}

		return redirect()->route('admin.access.roles.index')->withFlashSuccess('The role was successfully deleted.');
	}
}