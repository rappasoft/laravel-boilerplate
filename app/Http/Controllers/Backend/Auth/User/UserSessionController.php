<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Models\Auth\User;
use App\Repositories\Backend\Auth\SessionRepository;

/**
 * Class UserSessionController.
 */
class UserSessionController extends Controller
{

	/**
	 * @param User              $user
	 * @param ManageUserRequest $request
	 * @param SessionRepository $sessionRepository
	 *
	 * @return mixed
	 */
	public function clearSession(User $user, ManageUserRequest $request, SessionRepository $sessionRepository)
	{
		$sessionRepository->clearSession($user);

		return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.session_cleared'));
	}
}