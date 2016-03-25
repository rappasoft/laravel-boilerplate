<?php

namespace App\Repositories\Backend\Access\Role;

/**
 * Interface RoleRepositoryContract
 * @package App\Repositories\Role
 */
interface RoleRepositoryContract
{
    /**
     * @param  $id
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function findOrThrowException($id, $withPermissions = false);

    /**
     * @param  $per_page
     * @param  string      $order_by
     * @param  string      $sort
     * @return mixed
     */
    public function getRolesPaginated($per_page, $order_by = 'id', $sort = 'asc');

    /**
     * @param  string  $order_by
     * @param  string  $sort
     * @param  bool    $withPermissions
     * @return mixed
     */
    public function getAllRoles($order_by = 'id', $sort = 'asc', $withPermissions = false);

    /**
     * @param  $input
     * @return mixed
     */
    public function create($input);

    /**
     * @param  $id
     * @param  $input
     * @return mixed
     */
    public function update($id, $input);

    /**
     * @param  $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @return mixed
     */
    public function getDefaultUserRole();
}
