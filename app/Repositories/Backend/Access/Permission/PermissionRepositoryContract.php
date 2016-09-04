<?php

namespace App\Repositories\Backend\Access\Permission;

/**
 * Interface PermissionRepositoryContract
 * @package App\Repositories\Permission
 */
interface PermissionRepositoryContract
{

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @return mixed
     */
    public function getAllPermissions($order_by = 'sort', $sort = 'asc');
}