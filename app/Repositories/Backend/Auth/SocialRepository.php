<?php

namespace App\Repositories\Backend\Access\User;

use App\Models\Auth\User;
use App\Models\Auth\SocialAccount;
use App\Exceptions\GeneralException;
use App\Events\Backend\Auth\User\UserSocialDeleted;

/**
 * Class SocialRepository.
 */
class SocialRepository
{
    /**
     * @param User        $user
     * @param SocialAccount $social
     *
     * @throws GeneralException
     * @return bool
     */
    public function delete(User $user, SocialAccount $social)
    {
        if ($user->providers()->whereId($social->id)->delete()) {
            event(new UserSocialDeleted($user, $social));

            return true;
        }

        throw new GeneralException(__('exceptions.backend.access.users.social_delete_error'));
    }
}
