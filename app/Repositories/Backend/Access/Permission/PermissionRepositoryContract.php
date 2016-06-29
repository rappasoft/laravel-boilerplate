<?php

namespace App\Repositories\Backend\Access\Permission;

/**
 * Interface PermissionRepositoryContract
 * @package App\Repositories\Permission
 */
interface PermissionRepositoryContract
{

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getPermissionsPaginated($per_page, $order_by = 'sort', $sort = 'asc');

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withRoles
     * @return mixed
     */
    public function getAllPermissions($order_by = 'sort', $sort = 'asc', $withRoles = true);
}
