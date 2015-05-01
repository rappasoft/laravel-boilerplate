<?php namespace App\Repositories\User;

use Exception;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserProvider;
use App\Services\Validators\Rules\Auth\User\Create as RegisterUser;
use App\Services\Validators\Rules\Auth\User\Update as UpdateUser;
use App\Services\Validators\Rules\Auth\User\ChangePassword as ChangePassword;
use App\Exceptions\EntityNotValidException;
use App\Exceptions\Access\UserNeedsRolesException;

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

	/**
	 * @param $id
	 * @param bool $withRoles
	 * @return mixed
	 * @throws Exception
	 */
	public function findOrThrowException($id, $withRoles = false) {
		if ($withRoles)
			$user = User::with('roles')->withTrashed()->find($id);
		else
			$user = User::withTrashed()->find($id);

		if (! is_null($user)) return $user;

		throw new Exception('That user does not exist.');
	}

	/**
	 * @param $per_page
	 * @param string $order_by
	 * @param string $sort
	 * @param int $status
	 * @return mixed
	 */
	public function getUsersPaginated($per_page, $status = 1, $order_by = 'id', $sort = 'asc') {
		return User::where('status', $status)->orderBy($order_by, $sort)->paginate($per_page);
	}

	/**
	 * @param $per_page
	 * @return \Illuminate\Pagination\Paginator
	 */
	public function getDeletedUsersPaginated($per_page) {
		return User::onlyTrashed()->paginate($per_page);
	}

	/**
	 * @param string $order_by
	 * @param string $sort
	 * @return mixed
	 */
	public function getAllUsers($order_by = 'id', $sort = 'asc') {
		return User::orderBy($order_by, $sort)->get();
	}

	/**
	 * @param $input
	 * @param $roles
	 * @param $permissions
	 * @return bool
	 * @throws EntityNotValidException
	 * @throws Exception
	 * @throws UserNeedsRolesException
	 */
	public function createWithRoles($input, $roles, $permissions) {
		//Validate user
		$this->validateUser("register", $input);

		$user = $this->createUserStub($input);

		if ($user->save()) {
			//User Created, Validate Roles
			$this->validateRoleAmount($user, $roles['assignees_roles']);

			//Attach new roles
			$user->attachRoles($roles['assignees_roles']);

			//Attach other permissions
			$user->attachPermissions($permissions['permission_user']);

			return true;
		}

		throw new Exception('There was a problem creating this user. Please try again.');
	}

	/**
	 * @param $id
	 * @param $input
	 * @param $roles
	 * @return bool
	 * @throws EntityNotValidException
	 * @throws Exception
	 */
	public function update($id, $input, $roles, $permissions) {
		$user = $this->findOrThrowException($id);
		$this->checkUserByEmail($input, $user);
		$this->validateUser("update", $input);

		if ($user->update($input)) {
			//For whatever reason this just wont work in the above call, so a second is needed for now
			$user->status = isset($input['status']) ? 1 : 0;
			$user->save();

			$this->checkUserRolesCount($roles);
			$this->flushRoles($roles, $user);
			$this->flushPermissions($permissions, $user);

			return true;
		}

		throw new Exception('There was a problem updating this user. Please try again.');
	}

	/**
	 * @param $id
	 * @param $input
	 * @return bool
	 * @throws EntityNotValidException
	 * @throws Exception
	 */
	public function updatePassword($id, $input) {
		$user = $this->findOrThrowException($id);

		//Validate password
		$changePassword = new ChangePassword($input);
		$changePassword->init(); //Initializes the rules into the array from the config file
		if(! $changePassword->passes()) {
			$exception = new EntityNotValidException();
			$exception->setValidationErrors($changePassword->errors);
			throw $exception;
		}

		//Passwords are hashed using UserObserver
		$user->password = $input['password'];
		if ($user->save())
			return true;

		throw new Exception('There was a problem changing this users password. Please try again.');
	}

	/**
	 * @param $id
	 * @return bool
	 * @throws Exception
	 */
	public function destroy($id) {
		if (Auth::id() == $id)
			throw new Exception("You can not delete yourself.");

		$user = $this->findOrThrowException($id);
		if ($user->delete())
			return true;

		throw new Exception("There was a problem deleting this user. Please try again.");
	}

	/**
	 * @param $id
	 * @return boolean|null
	 * @throws Exception
	 */
	public function delete($id) {
		$user = $this->findOrThrowException($id, true);

		//Detach all roles & permissions
		$user->detachRoles($user->roles);
		$user->detachPermissions($user->permissions);

		try {
			$user->forceDelete();
		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	/**
	 * @param $id
	 * @return bool
	 * @throws Exception
	 */
	public function restore($id) {
		$user = $this->findOrThrowException($id);

		if ($user->restore())
			return true;

		throw new Exception("There was a problem restoring this user. Please try again.");
	}

	/*
	 * Mark the user
	 */
	/**
	 * @param $id
	 * @param $status
	 * @return bool
	 * @throws Exception
	 */
	public function mark($id, $status) {
		if (Auth::id() == $id && $status == 0)
			throw new Exception("You can not deactivate yourself.");

		$user = $this->findOrThrowException($id);
		$user->status = $status;

		if ($user->save())
			return true;

		throw new Exception("There was a problem updating this user. Please try again.");
	}

	/**
	 * @param $type
	 * @param array $userDetails
	 * @return bool
	 * @throws EntityNotValidException
	 */
	private function validateUser($type, array $userDetails = array()) {
		if ($type == "register")
			$validateUser = new RegisterUser($userDetails);
		else
			$validateUser = new UpdateUser($userDetails);

		$validateUser->init(); //Initializes the rules into the array from the config file
		if(! $validateUser->passes()) {
			$exception = new EntityNotValidException();
			$exception->setValidationErrors($validateUser->errors);
			throw $exception;
		}

		return true;
	}

	/**
	 * Check to make sure at lease one role is being applied or deactivate user
	 * @param $user
	 * @param $roles
	 * @throws UserNeedsRolesException
	 */
	private function validateRoleAmount($user, $roles) {
		//Validate that there's at least one role chosen, placing this here so
		//at lease the user can be updated first, if this fails the roles will be
		//kept the same as before the user was updated
		if (count($roles) == 0) {
			//Deactivate user
			$user->status = 0;
			$user->save();

			$exception = new UserNeedsRolesException();
			$exception->setValidationErrors('You must choose at lease one role. User has been created but deactivated.');

			//Grab the user id in the controller
			$exception->setUserID($user->id);
			throw $exception;
		}
	}

	/**
	 * @param $input
	 * @param $user
	 * @throws Exception
	 */
	private function checkUserByEmail($input, $user)
	{
		//Figure out if email is not the same
		if ($user->email != $input['email'])
		{
			//Check to see if email exists
			if (User::where('email', '=', $input['email'])->first())
				throw new Exception('That email address belongs to a different user.');
		}
	}

	/**
	 * @param $roles
	 * @param $user
	 */
	private function flushRoles($roles, $user)
	{
		//Flush roles out, then add array of new ones
		$user->detachRoles($user->roles);
		$user->attachRoles($roles['assignees_roles']);
	}

	/**
	 * @param $permissions
	 * @param $user
	 */
	private function flushPermissions($permissions, $user)
	{
		//Flush permissions out, then add array of new ones if any
		$user->detachPermissions($user->permissions);
		if (count($permissions['permission_user']) > 0)
		{
			$user->attachPermissions($permissions['permission_user']);
		}
	}

	/**
	 * @param $roles
	 * @throws Exception
	 */
	private function checkUserRolesCount($roles)
	{
		//User Updated, Update Roles
		//Validate that there's at least one role chosen
		if (count($roles['assignees_roles']) == 0)
			throw new Exception('You must choose at least one role.');
	}

	/**
	 * @param $input
	 * @return mixed
	 */
	private function createUserStub($input)
	{
		$user = new User;
		$user->name = $input['name'];
		$user->email = $input['email'];
		$user->password = $input['password'];
		$user->status = isset($input['status']) ? 1 : 0;

		return $user;
	}
}