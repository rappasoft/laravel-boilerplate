<?php

namespace App\Http\Controllers\Backend\Access\User;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Access\User\UserRepository;
use App\Http\Requests\Backend\Access\User\ManageUserRequest;

/**
 * Class UserAccessController
 */
class UserAccessController extends Controller
{
	/**
	 * @var UserRepository
	 */
	protected $users;

	/**
	 * @param UserRepository $users
	 */
	public function __construct(UserRepository $users)
	{
		$this->users = $users;
	}

	/**
	 * @param User $user
	 * @param ManageUserRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function loginAs(User $user, ManageUserRequest $request) {
		return $this->users->loginAs($user);
	}

	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function logoutAs() {
		return $this->users->logoutAs();
	}
}