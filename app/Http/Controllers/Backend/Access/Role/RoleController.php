<?php

namespace App\Http\Controllers\Backend\Access\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\Role\EditRoleRequest;
use App\Http\Requests\Backend\Access\Role\StoreRoleRequest;
use App\Http\Requests\Backend\Access\Role\CreateRoleRequest;
use App\Http\Requests\Backend\Access\Role\DeleteRoleRequest;
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
    public function __construct(
        RoleRepositoryContract $roles,
        PermissionRepositoryContract $permissions
    )
    {
        $this->roles       = $roles;
        $this->permissions = $permissions;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view('backend.access.roles.index')
            ->withRoles($this->roles->getRolesPaginated(50));
    }

    /**
     * @param CreateRoleRequest $request
     * @return mixed
     */
    public function create(CreateRoleRequest $request)
    {
        return view('backend.access.roles.create')
            ->withPermissions($this->permissions->getAllPermissions());
    }

    /**
     * @param  StoreRoleRequest $request
     * @return mixed
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roles->create($request->all());
        return redirect()->route('admin.access.roles.index')->withFlashSuccess(trans('alerts.backend.roles.created'));
    }

    /**
     * @param  $id
     * @param  EditRoleRequest $request
     * @return mixed
     */
    public function edit($id, EditRoleRequest $request)
    {
        $role = $this->roles->findOrThrowException($id, true);
        return view('backend.access.roles.edit')
            ->withRole($role)
            ->withRolePermissions($role->permissions->lists('id')->all())
            ->withPermissions($this->permissions->getAllPermissions());
    }

    /**
     * @param  $id
     * @param  UpdateRoleRequest $request
     * @return mixed
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $this->roles->update($id, $request->all());
        return redirect()->route('admin.access.roles.index')->withFlashSuccess(trans('alerts.backend.roles.updated'));
    }

    /**
     * @param  $id
     * @param  DeleteRoleRequest $request
     * @return mixed
     */
    public function destroy($id, DeleteRoleRequest $request)
    {
        $this->roles->destroy($id);
        return redirect()->route('admin.access.roles.index')->withFlashSuccess(trans('alerts.backend.roles.deleted'));
    }
}
