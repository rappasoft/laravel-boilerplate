<?php

namespace App\Http\Controllers\Backend\Access\User;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Http\Requests\Backend\Access\User\ManageUserRequest;

/**
 * Class UserConfirmationController.
 */
class UserConfirmationController extends Controller
{
    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function sendConfirmationEmail(User $user, ManageUserRequest $request)
    {
    	// Shouldn't allow users to confirm their own accounts when the application is set to manual confirmation
    	if (config('access.users.requires_approval')) {
    		return redirect()->back()->withFlashDanger(trans('alerts.backend.users.cant_resend_confirmation'));
		}

        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.confirmation_email'));
    }
}