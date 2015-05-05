<?php namespace App\Http\Controllers\Backend\Access;

use Exception;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserContract;
use App\Repositories\Role\RoleRepositoryContract;
use App\Repositories\Permission\PermissionRepositoryContract;
use App\Exceptions\EntityNotValidException;
use App\Exceptions\Access\UserNeedsRolesException;

/**
 * Class UserController
 */
class UserController extends Controller {

	/**
	 * @var UserContract
	 */
	protected $users;
	/**
	 * @var RoleRepositoryContract
	 */
	protected $roles;

	/**
	 * @var PermissionRepositoryContract
	 */
	protected $permissions;

	/**
	 * @param UserContract $users
	 * @param RoleRepositoryContract $roles
	 * @param PermissionRepositoryContract $permissions
	 */
	public function __construct(UserContract $users, RoleRepositoryContract $roles, PermissionRepositoryContract $permissions) {
		$this->middleware('auth');

		$this->users = $users;
		$this->roles = $roles;
		$this->permissions = $permissions;
	}

	/**
	 * @return mixed
	 */
	public function index() {
		return view('backend.access.index')
			->withUsers($this->users->getUsersPaginated(Config::get('access.users.default_per_page'), 1));
	}

	/**
	 * @return mixed
	 */
	public function create() {
		return view('backend.access.create')
			->withRoles($this->roles->getAllRoles('id', 'asc', true))
			->withPermissions($this->permissions->getPermissionsNotAssociatedWithRole());
	}

	/**
	 * @return mixed
	 */
	public function store() {
		try {
			$this->users->createWithRoles(Input::except('assignees_roles', 'permission_user'), Input::only('assignees_roles'), Input::only('permission_user'));
		} catch(EntityNotValidException $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->validationErrors());
		} catch(UserNeedsRolesException $e) {
			return redirect()->route('admin.access.users.edit', $e->userID())->withInput()->withFlashDanger($e->validationErrors());
		}

		return redirect()->route('admin.access.users.index')->withFlashSuccess('The user was successfully created.');
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function edit($id) {
		$user = $this->users->findOrThrowException($id, true);
		return view('backend.access.edit')
			->withUser($user)
			->withUserRoles($user->roles->lists('id'))
			->withRoles($this->roles->getAllRoles('id', 'asc', true))
			->withUserPermissions($user->permissions->lists('id'))
			->withPermissions($this->permissions->getPermissionsNotAssociatedWithRole());
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function update($id) {
		try {
			$this->users->update($id, Input::except('assignees_roles', 'permission_user'), Input::only('assignees_roles'), Input::only('permission_user'));
		} catch(EntityNotValidException $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->validationErrors());
		} catch(Exception $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
		}

		return redirect()->route('admin.access.users.index')->withFlashSuccess('The user was successfully updated.');
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function destroy($id) {
		try {
			$this->users->destroy($id);
		} catch(Exception $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
		}

		return redirect()->route('admin.access.users.index')->withFlashSuccess('The user was successfully deleted.');
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function delete($id) {
		try {
			$this->users->delete($id);
		} catch(Exception $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
		}

		return redirect()->route('admin.access.users.index')->withFlashSuccess('The user was deleted permanently.');
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function restore($id) {
		try {
			$this->users->restore($id);
		} catch(Exception $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
		}

		return redirect()->route('admin.access.users.index')->withFlashSuccess('The user was successfully restored.');
	}

	/**
	 * @param $id
	 * @param $status
	 * @return mixed
	 */
	public function mark($id, $status) {
		try {
			$this->users->mark($id, $status);
		} catch(Exception $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
		}

		return redirect()->route('admin.access.users.index')->withFlashSuccess('The user was successfully updated.');
	}

	/**
	 * @return mixed
	 */
	public function deactivated() {
		return view('backend.access.deactivated')
			->withUsers($this->users->getUsersPaginated(25, 0));
	}

	/**
	 * @return mixed
	 */
	public function deleted() {
		return view('backend.access.deleted')
			->withUsers($this->users->getDeletedUsersPaginated(25));
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function changePassword($id) {
		return view('backend.access.change-password')
			->withUser($this->users->findOrThrowException($id));
	}

	/**
	 * @param $id
	 * @return mixed
	 */
	public function updatePassword($id) {
		try {
			$this->users->updatePassword($id, Input::all());
		} catch(EntityNotValidException $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->validationErrors());
		} catch(Exception $e) {
			return redirect()->back()->withInput()->withFlashDanger($e->getMessage());
		}

		return redirect()->route('admin.access.users.index')->withFlashSuccess("The user's password was successfully updated.");
	}
}