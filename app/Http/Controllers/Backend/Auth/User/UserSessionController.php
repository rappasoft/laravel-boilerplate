<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Models\Auth\User;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Auth\SessionRepository;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;

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

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.session_cleared'));
    }
}
