<?php

namespace App\Repositories\Backend\Access\User;

use App\Models\Access\User\User;
use App\Exceptions\GeneralException;

/**
 * Class UserSessionRepository.
 */
class UserSessionRepository
{
    /**
     * @param User $user
     *
     * @return mixed
     * @throws GeneralException
     */
    public function clearSession(User $user)
    {
        if ($user->id === access()->id()) {
            throw new GeneralException(trans('exceptions.backend.access.users.cant_delete_own_session'));
        }

        if (config('session.driver') != 'database') {
            throw new GeneralException(trans('exceptions.backend.access.users.session_wrong_driver'));
        }

        return $user->sessions()->delete();
    }

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function clearSessionExceptCurrent(User $user)
    {
        if (config('session.driver') == 'database') {
            return $user->sessions()
                ->whereNot('id', session()->getId())
                ->delete();
        }

        // If session driver not database, do nothing
        return false;
    }
}
