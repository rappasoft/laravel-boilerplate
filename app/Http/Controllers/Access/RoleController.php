<?php namespace App\Http\Controllers\Access;

use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Repositories\Role\RoleRepositoryContract;
use App\Repositories\Permission\PermissionRepositoryContract;
use App\Http\Controllers\Controller;

class RoleController extends Controller {

	protected $roles;
	protected $permissions;

	public function __construct(RoleRepositoryContract $roles, PermissionRepositoryContract $permissions) {
		$this->roles = $roles;
		$this->permissions = $permissions;
	}

	/*
	 * Show the list of users
	 */
	public function index() {
		return view('backend.access.roles.index')
			->withRoles($this->roles->getRolesPaginated(50));
	}

	/*
	 * Create a user
	 */
	public function create() {
		return view('backend.access.roles.create')
			->withPermissions($this->permissions->getPermissionsNotAssociatedWithUser());
	}

	/*
	 * Save a new user
	 */
	public function store() {
		try {
			$this->roles->create(Input::except('role_permissions'), Input::only('role_permissions'));
		} catch (Exception $e) {
			return Redirect::route('access.roles.create')->withInput()->withFlashDanger($e->getMessage());
		}

		return Redirect::route('access.roles.index')->withFlashSuccess('The role was successfully created.');
	}

	/*
	 * Edit the specified user
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
			return Redirect::route('access.roles.index')->withInput()->withFlashDanger($e->getMessage());
		}
	}

	/*
	 * Update the specified user
	 */
	public function update($id) {
		try {
			$this->roles->update($id, Input::except('role_permissions'), Input::only('role_permissions'));
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withFlashDanger($e->getMessage());
		}

		return Redirect::route('access.roles.index')->withFlashSuccess('The role was successfully updated.');
	}

	/*
	 * Delete the specified user
	 */
	public function destroy($id) {
		try {
			$this->roles->destroy($id);
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withFlashDanger($e->getMessage());
		}

		return Redirect::route('access.roles.index')->withFlashSuccess('The role was successfully deleted.');
	}

}