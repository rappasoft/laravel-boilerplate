<?php

namespace App\Repositories\Backend\Access\User;

/**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface UserRepositoryContract
{
    /**
     * @param  $id
     * @param  bool    $withRoles
     * @return mixed
     */
    public function findOrThrowException($id, $withRoles = false);

	/**
     * @param int $status
     * @param bool $trashed
     * @return mixed
     */
    public function getForDataTable($status = 1, $trashed = false);

    /**
     * @param $input
     * @param $roles
     * @return mixed
     */
    public function create($input, $roles);

    /**
     * @param $id
     * @param $input
     * @param $roles
     * @return mixed
     */
    public function update($id, $input, $roles);

    /**
     * @param  $id
     * @return mixed
     */
    public function destroy($id);

    /**
     * @param  $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param  $id
     * @return mixed
     */
    public function restore($id);

    /**
     * @param  $id
     * @param  $status
     * @return mixed
     */
    public function mark($id, $status);

    /**
     * @param  $id
     * @param  $input
     * @return mixed
     */
    public function updatePassword($id, $input);
}
