<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Auth\User;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;

/**
 * Class UserSessionController.
 */
class UserSessionController extends Controller
{
    /**
     * @param  User  $user
     *
     * @return mixed
     */
    public function update(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->back()->withFlashDanger(__('You can not delete your own session.'));
        }

        $user->update(['to_be_logged_out' => true]);

        return redirect()->back()->withFlashSuccess(__('The user\'s session was successfully cleared.'));
    }
}
