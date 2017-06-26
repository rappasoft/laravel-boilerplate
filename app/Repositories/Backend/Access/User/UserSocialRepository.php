<?php

namespace App\Repositories\Backend\Access\User;

use App\Exceptions\GeneralException;
use App\Models\Access\User\SocialLogin;
use App\Models\Access\User\User;

/**
 * Class UserSocialRepository.
 */
class UserSocialRepository
{

	/**
	 * @param User        $user
	 * @param SocialLogin $social
	 *
	 * @return bool
	 * @throws GeneralException
	 */
	public function delete(User $user, SocialLogin $social) {
		if ($user->providers()->whereId($social->id)->delete()) {
			return true;
		}

		throw new GeneralException(trans('exceptions.backend.access.users.social_delete_error'));
	}
}
