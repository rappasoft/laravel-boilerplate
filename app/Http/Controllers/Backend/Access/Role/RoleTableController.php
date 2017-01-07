<?php

namespace App\Http\Controllers\Backend\Access\Role;

use App\Http\Controllers\Controller;
use Yajra\Datatables\Facades\Datatables;
use App\Repositories\Backend\Access\Role\RoleRepository;
use App\Http\Requests\Backend\Access\Role\ManageRoleRequest;

/**
 * Class RoleTableController.
 */
class RoleTableController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roles;

    /**
     * @param RoleRepository $roles
     */
    public function __construct(RoleRepository $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageRoleRequest $request)
    {
        return Datatables::of($this->roles->getForDataTable())
            ->addColumn('permissions', function ($role) {
                if ($role->all) {
                    return '<span class="label label-success">'.trans('labels.general.all').'</span>';
                }

                return $role->permissions->count() ?
                    implode('<br/>', $role->permissions->pluck('display_name')->toArray()) :
                    '<span class="label label-danger">'.trans('labels.general.none').'</span>';
            })
            ->addColumn('users', function ($role) {
                return $role->users->count();
            })
            ->addColumn('actions', function ($role) {
                return $role->action_buttons;
            })
            ->make(true);
    }
}
