<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Models\Auth\User;
use App\Helpers\Auth\Auth;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;

/**
 * Class UserAccessController.
 */
class UserAccessController extends Controller
{
    /**
     * @param User              $user
     * @param ManageUserRequest $request
     *
     * @throws GeneralException
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginAs(User $user, ManageUserRequest $request)
    {
        // Overwrite who we're logging in as, if we're already logged in as someone else.
        if (session()->has('admin_user_id') && session()->has('temp_user_id')) {
            // Let's not try to login as ourselves.
            if ($request->user()->id == $user->id || session()->get('admin_user_id') == $user->id) {
                throw new GeneralException('Do not try to login as yourself.');
            }

            // Overwrite temp user ID.
            session(['temp_user_id' => $user->id]);

            // Login.
            auth()->loginUsingId($user->id);

            // Redirect.
            return redirect()->route(home_route());
        }

        app()->make(Auth::class)->flushTempSession();

        // Won't break, but don't let them "Login As" themselves
        if ($request->user()->id == $user->id) {
            throw new GeneralException('Do not try to login as yourself.');
        }

        // Add new session variables
        session(['admin_user_id' => $request->user()->id]);
        session(['admin_user_name' => $request->user()->full_name]);
        session(['temp_user_id' => $user->id]);

        // Login user
        auth()->loginUsingId($user->id);

        // Redirect to frontend
        return redirect()->route(home_route());
    }
}
