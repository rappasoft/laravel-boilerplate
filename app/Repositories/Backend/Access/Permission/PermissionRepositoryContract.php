<?php

namespace App\Repositories\Backend\Access\Permission;

/**
 * Interface PermissionRepositoryContract
 * @package App\Repositories\Permission
 */
interface PermissionRepositoryContract
{
    /**
     * @param  $id
     * @param  bool    $withRoles
     * @return mixed
     */
    public function findOrThrowException($id, $withRoles = false);

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getPermissionsPaginated($per_page, $order_by = 'display_name', $sort = 'asc');

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withRoles
     * @return mixed
     */
    public function getAllPermissions($order_by = 'display_name', $sort = 'asc', $withRoles = true);

    /**
     * @return mixed
     */
    public function getUngroupedPermissions();

    /**
     * @param  $input
     * @param  $roles
     * @return mixed
     */
    public function create($input, $roles);

    /**
     * @param  $id
     * @param  $input
     * @param  $roles
     * @return mixed
     */
    public function update($id, $input, $roles);

    /**
     * @param  $id
     * @return mixed
     */
    public function destroy($id);
}
