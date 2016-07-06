<?php

namespace App\Http\Controllers\Backend\Access\User;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Backend\Access\User\StoreUserRequest;
use App\Http\Requests\Backend\Access\User\ManageUserRequest;
use App\Http\Requests\Backend\Access\User\UpdateUserRequest;
use App\Repositories\Backend\Access\User\UserRepositoryContract;
use App\Repositories\Backend\Access\Role\RoleRepositoryContract;
use App\Http\Requests\Backend\Access\User\UpdateUserPasswordRequest;
use App\Repositories\Frontend\Access\User\UserRepositoryContract as FrontendUserRepositoryContract;

/**
 * Class UserController
 */
class UserController extends Controller
{
    /**
     * @var UserRepositoryContract
     */
    protected $users;

    /**
     * @var RoleRepositoryContract
     */
    protected $roles;

    /**
     * @param UserRepositoryContract $users
     * @param RoleRepositoryContract $roles
     */
    public function __construct(UserRepositoryContract $users, RoleRepositoryContract $roles)
    {
        $this->users       = $users;
        $this->roles       = $roles;
    }

	/**
     * @param ManageUserRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageUserRequest $request)
    {
        return view('backend.access.index');
    }

	/**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function get(ManageUserRequest $request) {
        return Datatables::of($this->users->getForDataTable($request->get('status'), $request->get('trashed')))
            ->editColumn('confirmed', function($user) {
                return $user->confirmed_label;
            })
            ->addColumn('roles', function($user) {
                $roles = [];

                if ($user->roles()->count() > 0) {
                    foreach ($user->roles as $role) {
                        array_push($roles, $role->name);
                    }

                    return implode("<br/>", $roles);
                } else {
                    return trans('labels.general.none');
                }
            })
            ->addColumn('actions', function($user) {
                return $user->action_buttons;
            })
            ->make(true);
    }

	/**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function create(ManageUserRequest $request)
    {
        return view('backend.access.create')
            ->withRoles($this->roles->getAllRoles('sort', 'asc', true));
    }

	/**
     * @param StoreUserRequest $request
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $this->users->create(
            $request->except('assignees_roles'),
            $request->only('assignees_roles')
        );
        return redirect()->route('admin.access.users.index')->withFlashSuccess(trans('alerts.backend.users.created'));
    }

	/**
     * @param $id
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function edit($id, ManageUserRequest $request)
    {
        $user = $this->users->findOrThrowException($id, true);
        return view('backend.access.edit')
            ->withUser($user)
            ->withUserRoles($user->roles->lists('id')->all())
            ->withRoles($this->roles->getAllRoles('sort', 'asc', true));
    }

	/**
     * @param $id
     * @param UpdateUserRequest $request
     * @return mixed
     */
    public function update($id, UpdateUserRequest $request)
    {
        $this->users->update($id,
            $request->except('assignees_roles'),
            $request->only('assignees_roles')
        );
        return redirect()->route('admin.access.users.index')->withFlashSuccess(trans('alerts.backend.users.updated'));
    }

	/**
     * @param $id
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function destroy($id, ManageUserRequest $request)
    {
        $this->users->destroy($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.deleted'));
    }

	/**
     * @param $id
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function delete($id, ManageUserRequest $request)
    {
        $this->users->delete($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.deleted_permanently'));
    }

	/**
     * @param $id
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function restore($id, ManageUserRequest $request)
    {
        $this->users->restore($id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.restored'));
    }

	/**
     * @param $id
     * @param $status
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function mark($id, $status, ManageUserRequest $request)
    {
        $this->users->mark($id, $status);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.updated'));
    }

	/**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function deactivated(ManageUserRequest $request)
    {
        return view('backend.access.deactivated');
    }

	/**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function deleted(ManageUserRequest $request)
    {
        return view('backend.access.deleted');
    }

	/**
     * @param $id
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function changePassword($id, ManageUserRequest $request)
    {
        return view('backend.access.change-password')
            ->withUser($this->users->findOrThrowException($id));
    }

	/**
     * @param $id
     * @param UpdateUserPasswordRequest $request
     * @return mixed
     */
    public function updatePassword($id, UpdateUserPasswordRequest $request)
    {
        $this->users->updatePassword($id, $request->all());
        return redirect()->route('admin.access.users.index')->withFlashSuccess(trans('alerts.backend.users.updated_password'));
    }

	/**
     * @param $user_id
     * @param FrontendUserRepositoryContract $user
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function resendConfirmationEmail($user_id, FrontendUserRepositoryContract $user, ManageUserRequest $request)
    {
        $user->sendConfirmationEmail($user_id);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.confirmation_email'));
    }

	/**
	 * @param $user_id
	 * @param ManageUserRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function loginAs($user_id, ManageUserRequest $request) {
        return $this->users->loginAs($user_id);
    }

	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function logoutAs() {
        return $this->users->logoutAs();
    }
}