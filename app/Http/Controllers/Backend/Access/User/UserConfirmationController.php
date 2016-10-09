<?php

namespace App\Http\Controllers\Backend\Access\User;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\ManageUserRequest;
use App\Repositories\Frontend\Access\User\UserRepositoryContract as FrontendUserRepositoryContract;

/**
 * Class UserConfirmationController
 */
class UserConfirmationController extends Controller
{

	/**
	 * @param User $user
	 * @param FrontendUserRepositoryContract $repository
	 * @param ManageUserRequest $request
	 * @return mixed
	 */
	public function resendConfirmationEmail(User $user, FrontendUserRepositoryContract $repository, ManageUserRequest $request)
	{
		$repository->sendConfirmationEmail($user);
		return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.confirmation_email'));
	}
}