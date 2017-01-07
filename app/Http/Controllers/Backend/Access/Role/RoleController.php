<?php

namespace App\Http\Controllers\Backend\Access\Role;

use App\Models\Access\Role\Role;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Http\Requests\Backend\Access\Role\StoreRoleRequest;
use App\Http\Requests\Backend\Access\Role\ManageRoleRequest;
use App\Http\Requests\Backend\Access\Role\UpdateRoleRequest;
use App\Repositories\Backend\Access\Permission\PermissionRepository;

/**
 * Class RoleController.
 */
class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roles;

    /**
     * @var PermissionRepository
     */
    protected $permissions;

    /**
     * @param RoleRepository       $roles
     * @param PermissionRepository $permissions
     */
    public function __construct(RoleRepository $roles, PermissionRepository $permissions)
    {
        $this->roles = $roles;
        $this->permissions = $permissions;
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function index(ManageRoleRequest $request)
    {
        return view('backend.access.roles.index');
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function create(ManageRoleRequest $request)
    {
        return view('backend.access.roles.create')
            ->withPermissions($this->permissions->getAll())
            ->withRoleCount($this->roles->getCount());
    }

    /**
     * @param StoreRoleRequest $request
     *
     * @return mixed
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roles->create($request->all());

        return redirect()->route('admin.access.role.index')->withFlashSuccess(trans('alerts.backend.roles.created'));
    }

    /**
     * @param Role              $role
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function edit(Role $role, ManageRoleRequest $request)
    {
        return view('backend.access.roles.edit')
            ->withRole($role)
            ->withRolePermissions($role->permissions->pluck('id')->all())
            ->withPermissions($this->permissions->getAll());
    }

    /**
     * @param Role              $role
     * @param UpdateRoleRequest $request
     *
     * @return mixed
     */
    public function update(Role $role, UpdateRoleRequest $request)
    {
        $this->roles->update($role, $request->all());

        return redirect()->route('admin.access.role.index')->withFlashSuccess(trans('alerts.backend.roles.updated'));
    }

    /**
     * @param Role              $role
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function destroy(Role $role, ManageRoleRequest $request)
    {
        $this->roles->delete($role);

        return redirect()->route('admin.access.role.index')->withFlashSuccess(trans('alerts.backend.roles.deleted'));
    }
}
