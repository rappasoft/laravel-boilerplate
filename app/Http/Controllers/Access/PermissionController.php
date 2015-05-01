<?php namespace App\Http\Controllers\Access;

use Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Exceptions\EntityNotValidException;
use App\Repositories\Role\RoleRepositoryContract;
use App\Repositories\Permission\PermissionRepositoryContract;

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
		return view('backend.access.roles.permissions.index')
			->withPermissions($this->permissions->getPermissionsPaginated(50));
	}

	/**
	 * @return mixed
	 */
	public function create() {
		return view('backend.access.roles.permissions.create')
			->withRoles($this->roles->getAllRoles());
	}

	/**
	 * @return mixed
	 */
	public function store() {
		try {
			$this->permissions->create(Input::except('permission_roles'), Input::only('permission_roles'));
		} catch (EntityNotValidException $e) {
			return Redirect::back()->with('input', Input::all())->withFlashDanger($e->validationErrors());
		} catch (Exception $e) {
			return Redirect::back()->with('input', Input::all())->withFlashDanger($e->getMessage());
		}

		return Redirect::route('admin.access.roles.permissions.index')->withFlashSuccess("Permission successfully created.");
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function edit($id) {
		try {
			$permission = $this->permissions->findOrThrowException($id, true);
			return view('backend.access.roles.permissions.edit')
				->withPermission($permission)
				->withPermissionRoles($permission->roles->lists('id'))
				->withRoles($this->roles->getAllRoles());
		} catch (Exception $e) {
			return Redirect::route('admin.access.roles.permissions.index')->withFlashDanger($e->getMessage());
		}
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function update($id) {
		try {
			$this->permissions->update($id, Input::except('permission_roles'), Input::only('permission_roles'));
		} catch (EntityNotValidException $e) {
			return Redirect::back()->with('input', Input::all())->withFlashDanger($e->validationErrors());
		} catch (Exception $e) {
			return Redirect::back()->with('input', Input::all())->withFlashDanger($e->getMessage());
		}

		return Redirect::route('admin.access.roles.permissions.index')->withFlashSuccess("Permission successfully updated.");
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function destroy($id) {
		try {
			$this->permissions->destroy($id);
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withFlashDanger($e->getMessage());
		}

		return Redirect::route('admin.access.roles.permissions.index')->withFlashSuccess("Permission successfully deleted.");
	}
}