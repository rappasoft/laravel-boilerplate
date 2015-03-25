<?php namespace App\Repositories\User;

use App\User;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentUserRepository implements UserContract {

	/**
	 * @param $data
	 * @return static
	 */
	public function create($data) {
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => $data['password'],
		]);
	}

	/**
	 * @param $data
	 * @param $provider
	 * @return static
	 */
	public function findByUserNameOrCreate($data, $provider) {
		$user = User::where('provider_id', '=', $data->id)->first();
		if(! $user) {
			$user = User::create([
				'name' => $data->name,
				'username' => $data->nickname,
				'email' => $data->email,
				'avatar' => $data->avatar,
				'provider' => $provider,
				'provider_id' => $data->id,
			]);
		}

		$this->checkIfUserNeedsUpdating($data, $user);
		return $user;
	}

	/**
	 * @param $data
	 * @param $user
	 */
	public function checkIfUserNeedsUpdating($data, $user) {
		$socialData = [
			'avatar' => $data->avatar,
			'email' => $data->email,
			'name' => $data->name,
			'username' => $data->nickname,
		];
		$dbData = [
			'avatar' => $user->avatar,
			'email' => $user->email,
			'name' => $user->name,
			'username' => $user->username,
		];

		$differences = array_diff($socialData, $dbData);
		if (! empty($differences)) {
			$user->avatar = $data->avatar;
			$user->email = $data->email;
			$user->name = $data->name;
			$user->username = $data->nickname;
			$user->save();
		}
	}

}