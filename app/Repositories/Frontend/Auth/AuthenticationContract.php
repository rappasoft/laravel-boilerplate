<?php namespace App\Repositories\Frontend\Auth;

/**
 * Interface AuthenticationContract
 * @package App\Repositories\Frontend\Auth
 */
interface AuthenticationContract {

	/**
	 * @param array $data
	 * @return mixed
	 */
	public function create(array $data);

	/**
	 * @param $request
	 * @return mixed
	 */
	public function login($request);

	/**
	 * @return mixed
	 */
	public function logout();

	/**
	 * @param $request
	 * @param $provider
	 * @return mixed
	 */
	public function loginThirdParty($request, $provider);

	/**
	 * @param $provider
	 * @return mixed
	 */
	public function getAuthorizationFirst($provider);

	/**
	 * @param $provider
	 * @return mixed
	 */
	public function getSocialUser($provider);

	/**
	 * @param $token
	 * @return mixed
	 */
	public function confirmAccount($token);

	/**
	 * @param $user_id
	 * @return mixed
	 */
	public function resendConfirmationEmail($user_id);

	/**
	 * @param $user
	 * @return mixed
     */
	public function isBannedOrDeactivated($user);
}