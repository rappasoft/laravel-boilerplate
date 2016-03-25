<?php

namespace App\Http\Controllers\Backend\Access\Permission;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\Permission\Group\SortPermissionGroupRequest;
use App\Http\Requests\Backend\Access\Permission\Group\EditPermissionGroupRequest;
use App\Http\Requests\Backend\Access\Permission\Group\StorePermissionGroupRequest;
use App\Http\Requests\Backend\Access\Permission\Group\CreatePermissionGroupRequest;
use App\Http\Requests\Backend\Access\Permission\Group\DeletePermissionGroupRequest;
use App\Http\Requests\Backend\Access\Permission\Group\UpdatePermissionGroupRequest;
use App\Repositories\Backend\Access\Permission\Group\PermissionGroupRepositoryContract;

/**
 * Class PermissionGroupController
 * @package App\Http\Controllers\Access
 */
class PermissionGroupController extends Controller
{
    /**
     * @var PermissionGroupRepositoryContract
     */
    protected $groups;

    /**
     * @param PermissionGroupRepositoryContract $groups
     */
    public function __construct(PermissionGroupRepositoryContract $groups)
    {
        $this->groups = $groups;
    }

    /**
     * @param  CreatePermissionGroupRequest $request
     * @return \Illuminate\View\View
     */
    public function create(CreatePermissionGroupRequest $request)
    {
        return view('backend.access.roles.permissions.groups.create');
    }

    /**
     * @param  StorePermissionGroupRequest $request
     * @return mixed
     */
    public function store(StorePermissionGroupRequest $request)
    {
        $this->groups->store($request->all());
        return redirect()->route('admin.access.roles.permissions.index')->withFlashSuccess(trans('alerts.backend.permissions.groups.created'));
    }

    /**
     * @param  $id
     * @param  EditPermissionGroupRequest $request
     * @return mixed
     */
    public function edit($id, EditPermissionGroupRequest $request)
    {
        return view('backend.access.roles.permissions.groups.edit')
            ->withGroup($this->groups->find($id));
    }

    /**
     * @param  $id
     * @param  UpdatePermissionGroupRequest $request
     * @return mixed
     */
    public function update($id, UpdatePermissionGroupRequest $request)
    {
        $this->groups->update($id, $request->all());
        return redirect()->route('admin.access.roles.permissions.index')->withFlashSuccess(trans('alerts.backend.permissions.groups.created'));
    }

    /**
     * @param  $id
     * @param  DeletePermissionGroupRequest $request
     * @return mixed
     */
    public function destroy($id, DeletePermissionGroupRequest $request)
    {
        $this->groups->destroy($id);
        return redirect()->route('admin.access.roles.permissions.index')->withFlashSuccess(trans('alerts.backend.permissions.groups.deleted'));
    }

    /**
     * @param  SortPermissionGroupRequest      $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSort(SortPermissionGroupRequest $request)
    {
        $this->groups->updateSort($request->get('data'));
        return response()->json(['status' => 'OK']);
    }
}
