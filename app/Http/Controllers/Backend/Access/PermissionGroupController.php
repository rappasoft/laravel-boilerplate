<?php namespace App\Http\Controllers\Backend\Access;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Permission\Group\PermissionGroupRepositoryContract;
use App\Http\Requests\Backend\Access\Permission\Group\CreatePermissionGroupRequest;
use App\Http\Requests\Backend\Access\Permission\Group\UpdatePermissionGroupRequest;

/**
 * Class PermissionGroupController
 * @package App\Http\Controllers\Access
 */
class PermissionGroupController extends Controller {

    /**
     * @var PermissionGroupRepositoryContract
     */
    protected $groups;

    /**
     * @param PermissionGroupRepositoryContract $groups
     */
    public function __construct(PermissionGroupRepositoryContract $groups) {
        $this->groups = $groups;
    }

    /**
     * @return mixed
     */
    public function create() {
        return view('backend.access.roles.permissions.groups.create');
    }

    /**
     * @param CreatePermissionGroupRequest $request
     * @return mixed
     */
    public function store(CreatePermissionGroupRequest $request) {
        $this->groups->store($request->all());
        return redirect()->route('admin.access.roles.permissions.index')->withFlashSuccess(trans("alerts.permissions.groups.created"));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id) {
        return view('backend.access.roles.permissions.groups.edit')
            ->withGroup($this->groups->find($id));
    }

    /**
     * @param $id
     * @param UpdatePermissionGroupRequest $request
     * @return mixed
     */
    public function update($id, UpdatePermissionGroupRequest $request) {
        $this->groups->update($id, $request->all());
        return redirect()->route('admin.access.roles.permissions.index')->withFlashSuccess(trans("alerts.permissions.groups.created"));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id) {
        $this->groups->destroy($id);
        return redirect()->route('admin.access.roles.permissions.index')->withFlashSuccess(trans("alerts.permissions.groups.deleted"));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSort(Request $request) {
        $this->groups->updateSort($request->get('data'));
        return response()->json(['status' => 'OK']);
    }
}