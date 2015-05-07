<?php namespace App\Repositories\User;

/**
 * Interface UserContract
 * @package App\Repositories\User
 */
interface UserContract {

	/**
	 * @param $data
	 * @return mixed
	 */
	public function create($data);

	/**
	 * @param $data
	 * @return mixed
	 */
	public function findByUserNameOrCreate($data, $provider);

	/**
	 * @param $provider
	 * @param $providerData
	 * @param $user
	 * @return mixed
	 */
	public function checkIfUserNeedsUpdating($provider, $providerData, $user);

	/**
	 * @param $id
	 * @param bool $withRoles
	 * @return mixed
	 */
	public function findOrThrowException($id, $withRoles = false);

	/**
	 * @param $per_page
	 * @param string $order_by
	 * @param string $sort
	 * @param $status
	 * @return mixed
	 */
	public function getUsersPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc');

	/**
	 * @param $per_page
	 * @return \Illuminate\Pagination\Paginator
	 */
	public function getDeletedUsersPaginated($per_page);

	/**
	 * @param string $order_by
	 * @param string $sort
	 * @return mixed
	 */
	public function getAllUsers($order_by = 'id', $sort = 'asc');

	/**
	 * @param $input
	 * @param $roles
	 * @return mixed
	 */
	public function createWithRoles($input, $roles, $permissions);

	/**
	 * @param $id
	 * @param $input
	 * @param $roles
	 * @return mixed
	 */
	public function update($id, $input, $roles, $permissions);

	/**
	 * @param $id
	 * @return mixed
	 */
	public function destroy($id);

	/**
	 * @param $id
	 * @return mixed
	 */
	public function delete($id);

	/**
	 * @param $id
	 * @return mixed
	 */
	public function restore($id);

	/**
	 * @param $id
	 * @param $status
	 * @return mixed
	 */
	public function mark($id, $status);

	/**
	 * @param $id
	 * @param $input
	 * @return mixed
	 */
	public function updatePassword($id, $input);

	/**
	 * @param $id
	 * @param $input
	 * @return mixed
	 */
	public function updateProfile($id, $input);

	/**
	 * @param $input
	 * @return mixed
	 */
	public function changePassword($input);
}