<?php namespace App\Repositories\User;

/**
 * Interface UserContract
 * @package App\Repositories\User
 */
interface UserContract {

	public function create($data);

	/**
	 * @param $data
	 * @return mixed
	 */
	public function findByUserNameOrCreate($data, $provider);

	/**
	 * @param $data
	 * @param $user
	 * @return mixed
	 */
	public function checkIfUserNeedsUpdating($data, $user);
}