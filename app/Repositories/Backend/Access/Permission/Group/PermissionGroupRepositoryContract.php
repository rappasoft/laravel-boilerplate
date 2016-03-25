<?php

namespace App\Repositories\Backend\Access\Permission\Group;

/**
 * Interface PermissionGroupRepositoryContract
 * @package App\Repositories\Backend\Permission\Group
 */
interface PermissionGroupRepositoryContract
{
    /**
     * @param  $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param  int     $limit
     * @return mixed
     */
    public function getGroupsPaginated($limit = 50);

    /**
     * @param  bool    $withChildren
     * @return mixed
     */
    public function getAllGroups($withChildren = false);

    /**
     * @param  $input
     * @return mixed
     */
    public function store($input);

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
     * @param  $input
     * @return mixed
     */
    public function updateSort($input);
}
