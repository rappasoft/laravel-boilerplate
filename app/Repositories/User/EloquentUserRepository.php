<?php namespace App\Repositories\User;

use App\User;
use App\UserProvider;

/**
 * Class EloquentUserRepository
 * @package App\Repositories\User
 */
class EloquentUserRepository implements UserContract {

	/**
	 * @param $data
	 * @param bool $provider
	 * @return static
	 */
	public function create($data, $provider = false) {
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => $provider ? null : $data['password'],
		]);
	}

	/**
	 * @param $data
	 * @param $provider
	 * @return static
	 */
	public function findByUserNameOrCreate($data, $provider) {
		$user = User::where('email', $data->email)->first();
		$providerData = [
			'avatar' => $data->avatar,
			'provider' => $provider,
			'provider_id' => $data->id,
		];

		if(! $user) {
			$user = $this->create([
				'name' => $data->name,
				'email' => $data->email,
			], true);
		}

		if ($this->hasProvider($user, $provider))
			$this->checkIfUserNeedsUpdating($provider, $data, $user);
		else
		{
			$user->providers()->save(new UserProvider($providerData));
		}

		return $user;
	}

	/**
	 * @param $user
	 * @param $provider
	 * @return bool
	 */
	public function hasProvider($user, $provider) {
		foreach ($user->providers as $p) {
			if ($p->provider == $provider)
				return true;
		}

		return false;
	}

	/**
	 * @param $provider
	 * @param $providerData
	 * @param $user
	 */
	public function checkIfUserNeedsUpdating($provider, $providerData, $user) {
		//Have to first check to see if name and email have to be updated
		$userData = [
			'email' => $providerData->email,
			'name' => $providerData->name,
		];
		$dbData = [
			'email' => $user->email,
			'name' => $user->name,
		];
		$differences = array_diff($userData, $dbData);
		if (! empty($differences)) {
			$user->email = $providerData->email;
			$user->name = $providerData->name;
			$user->save();
		}

		//Then have to check to see if avatar for specific provider has changed
		$p = $user->providers()->where('provider', $provider)->first();
		if ($p->avatar != $providerData->avatar) {
			$p->avatar = $providerData->avatar;
			$p->save();
		}
	}
}