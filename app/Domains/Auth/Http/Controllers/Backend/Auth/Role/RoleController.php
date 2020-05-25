<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Auth\Role;

use App\Domains\Auth\Http\Requests\Backend\Auth\Role\StoreRoleRequest;
use App\Domains\Auth\Http\Requests\Backend\Auth\Role\UpdateRoleRequest;
use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Http\Controllers\Controller;
use App\Services\RoleService;

/**
 * Class RoleController.
 */
class RoleController extends Controller
{
    /**
     * @var RoleService
     */
    protected $roleService;

    /**
     * RoleController constructor.
     *
     * @param  RoleService  $roleService
     */
    public function __construct(RoleService $roleService)
    {
        // TODO: Keep these here or no?
        $this->middleware('permission:access.roles.read')->only('index');
        $this->middleware('permission:access.roles.create')->only('create');
        $this->middleware('permission:access.roles.create')->only('store');
        $this->middleware('permission:access.roles.update')->only('edit');
        $this->middleware('permission:access.roles.update')->only('update');
        $this->middleware('permission:access.roles.delete')->only('destroy');

        $this->roleService = $roleService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.auth.role.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.auth.role.create')
            ->withCategories(Permission::isMaster()->with('children')->get())
            ->withGeneral(Permission::singular()->orderBy('sort', 'asc')->get());
    }

    /**
     * @param  StoreRoleRequest  $request
     *
     * @return mixed
     * @throws \App\Domains\Auth\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roleService->store($request->validated());

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('The role was successfully created.'));
    }

    /**
     * @param  Role  $role
     *
     * @return mixed
     */
    public function edit(Role $role)
    {
        return view('backend.auth.role.edit')
            ->withCategories(Permission::isMaster()->with('children')->get())
            ->withGeneral(Permission::singular()->orderBy('sort', 'asc')->get())
            ->withRole($role->load('permissions'));
    }

    /**
     * @param  UpdateRoleRequest  $request
     * @param  Role  $role
     *
     * @return mixed
     * @throws \App\Domains\Auth\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->roleService->update($role, $request->validated());

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('The role was successfully updated.'));
    }

    /**
     * @param  Role  $role
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        if ($role->users()->count()) {
            return redirect()->back()->withFlashDanger(__('You can not delete a role with associated users.'));
        }

        $this->roleService->deleteById($role->id);

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('The role was successfully deleted.'));
    }
}
