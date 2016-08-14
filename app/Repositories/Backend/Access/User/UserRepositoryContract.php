<?php

namespace App\Repositories\Backend\Access\User;

use App\Models\Access\User\User;

/**
 * Interface UserRepositoryContract
 * @package App\Repositories\User
 */
interface UserRepositoryContract
{

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
     * @param User $user
     * @param $input
     * @param $roles
     * @return mixed
     */
    public function update(User $user, $input, $roles);

    /**
     * @param  User $user
     * @return mixed
     */
    public function destroy(User $user);

    /**
     * @param  User $user
     * @return mixed
     */
    public function delete(User $user);

    /**
     * @param  User $user
     * @return mixed
     */
    public function restore(User $user);

    /**
     * @param  User $user
     * @param  $status
     * @return mixed
     */
    public function mark(User $user, $status);

    /**
     * @param  User $user
     * @param  $input
     * @return mixed
     */
    public function updatePassword(User $user, $input);

	/**
     * @param User $user
     * @return mixed
     */
    public function loginAs(User $user);

	/**
     * @return mixed
     */
    public function logoutAs();

	/**
	 * @return mixed
	 */
	public function flushTempSession();
}