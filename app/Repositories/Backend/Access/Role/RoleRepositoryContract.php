<?php

namespace App\Repositories\Backend\Access\Role;

use App\Models\Access\Role\Role;

/**
 * Interface RoleRepositoryContract
 * @package app\Repositories\Role
 */
interface RoleRepositoryContract
{

	/**
     * @return mixed
     */
    public function getCount();

	/**
     * @return mixed
     */
    public function getForDataTable();

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
     * @param  Role $role
     * @param  $input
     * @return mixed
     */
    public function update(Role $role, $input);

    /**
     * @param  Role $role
     * @return mixed
     */
    public function destroy(Role $role);

	/**
     * @return mixed
     */
    public function getDefaultUserRole();
}