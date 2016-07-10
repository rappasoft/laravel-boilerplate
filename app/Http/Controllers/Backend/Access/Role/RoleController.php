<?php

namespace App\Http\Controllers\Backend\Access\Role;

use App\Models\Access\Role\Role;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\Backend\Access\Role\StoreRoleRequest;
use App\Http\Requests\Backend\Access\Role\ManageRoleRequest;
use App\Http\Requests\Backend\Access\Role\UpdateRoleRequest;
use App\Repositories\Backend\Access\Role\RoleRepositoryContract;
use App\Repositories\Backend\Access\Permission\PermissionRepositoryContract;

/**
 * Class RoleController
 * @package App\Http\Controllers\Access
 */
class RoleController extends Controller
{
    /**
     * @var RoleRepositoryContract
     */
    protected $roles;

    /**
     * @var PermissionRepositoryContract
     */
    protected $permissions;

    /**
     * @param RoleRepositoryContract       $roles
     * @param PermissionRepositoryContract $permissions
     */
    public function __construct(RoleRepositoryContract $roles, PermissionRepositoryContract $permissions)
	{
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

	/**
	 * @param ManageRoleRequest $request
	 * @return mixed
	 */
	public function index(ManageRoleRequest $request)
	{
        return view('backend.access.roles.index');
    }

	/**
	 * @param ManageRoleRequest $request
	 * @return mixed
	 */
	public function get(ManageRoleRequest $request)
	{
		return Datatables::of($this->roles->getForDataTable())
			->addColumn('permissions', function($role) {
				$permissions = [];

				if ($role->all)
					return '<span class="label label-success">' . trans('labels.general.all') . '</span>';

				if (count($role->permissions) > 0) {
					foreach ($role->permissions as $permission) {
						array_push($permissions, $permission->display_name);
					}

					return implode("<br/>", $permissions);
				} else {
					return '<span class="label label-danger">' . trans('labels.general.none') . '</span>';
				}
			})
			->addColumn('users', function($role) {
				return $role->users()->count();
			})
			->addColumn('actions', function($role) {
				return $role->action_buttons;
			})
			->make(true);
	}

    /**
     * @param ManageRoleRequest $request
     * @return mixed
     */
    public function create(ManageRoleRequest $request)
    {
        return view('backend.access.roles.create')
            ->withPermissions($this->permissions->getAllPermissions())
			->withRoleCount($this->roles->getCount());
    }

    /**
     * @param  StoreRoleRequest $request
     * @return mixed
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roles->create($request->all());
        return redirect()->route('admin.access.role.index')->withFlashSuccess(trans('alerts.backend.roles.created'));
    }

    /**
     * @param  Role $role
     * @param  ManageRoleRequest $request
     * @return mixed
     */
    public function edit(Role $role, ManageRoleRequest $request)
    {
        return view('backend.access.roles.edit')
            ->withRole($role)
            ->withRolePermissions($role->permissions->lists('id')->all())
            ->withPermissions($this->permissions->getAllPermissions());
    }

    /**
     * @param  Role $role
     * @param  UpdateRoleRequest $request
     * @return mixed
     */
    public function update(Role $role, UpdateRoleRequest $request)
    {
        $this->roles->update($role, $request->all());
        return redirect()->route('admin.access.role.index')->withFlashSuccess(trans('alerts.backend.roles.updated'));
    }

    /**
     * @param  Role $role
     * @param  ManageRoleRequest $request
     * @return mixed
     */
    public function destroy(Role $role, ManageRoleRequest $request)
    {
        $this->roles->destroy($role);
        return redirect()->route('admin.access.role.index')->withFlashSuccess(trans('alerts.backend.roles.deleted'));
    }
}