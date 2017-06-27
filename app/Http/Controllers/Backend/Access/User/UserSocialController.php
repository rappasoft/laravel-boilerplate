<?php

namespace App\Http\Controllers\Backend\Access\User;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use App\Models\Access\User\SocialLogin;
use App\Http\Requests\Backend\Access\User\ManageUserRequest;
use App\Repositories\Backend\Access\User\UserSocialRepository;

/**
 * Class UserSocialController.
 */
class UserSocialController extends Controller
{
    /**
     * @param User                 $user
     * @param SocialLogin          $social
     * @param ManageUserRequest    $request
     * @param UserSocialRepository $userSocialRepository
     *
     * @return mixed
     */
    public function unlink(User $user, SocialLogin $social, ManageUserRequest $request, UserSocialRepository $userSocialRepository)
    {
        $userSocialRepository->delete($user, $social);

        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.social_deleted'));
    }
}
