<?php namespace App\Repositories\Frontend\User;

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