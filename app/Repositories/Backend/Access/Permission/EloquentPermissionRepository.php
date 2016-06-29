<?php

namespace App\Repositories\Backend\Access\Permission;

use App\Models\Access\Permission\Permission;
use App\Repositories\Backend\Access\Role\RoleRepositoryContract;

/**
 * Class EloquentPermissionRepository
 * @package App\Repositories\Permission
 */
class EloquentPermissionRepository implements PermissionRepositoryContract
{
    /**
     * @var RoleRepositoryContract
     */
    protected $roles;
    
    public function __construct(RoleRepositoryContract $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getPermissionsPaginated($per_page, $order_by = 'display_name', $sort = 'asc')
    {
        return Permission::with('roles')->orderBy($order_by, $sort)->paginate($per_page);
    }

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withRoles
     * @return mixed
     */
    public function getAllPermissions($order_by = 'display_name', $sort = 'asc', $withRoles = true)
    {
        if ($withRoles) {
            return Permission::with('roles')->orderBy($order_by, $sort)->get();
        }

        return Permission::orderBy($order_by, $sort)->get();
    }
}
