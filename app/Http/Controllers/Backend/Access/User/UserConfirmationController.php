<?php

namespace App\Http\Controllers\Backend\Access\User;

use App\Helpers\Auth\Auth;
use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\ManageUserRequest;

/**
 * Class UserConfirmationController
 */
class UserConfirmationController extends Controller
{

	/**
	 * @param User $user
	 * @param ManageUserRequest $request
	 * @return mixed
	 */
	public function sendConfirmationEmail(User $user, ManageUserRequest $request)
	{
		app()->make(Auth::class)->sendConfirmationEmail($user);
		return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.confirmation_email'));
	}
}