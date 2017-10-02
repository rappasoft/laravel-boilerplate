<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Models\Auth\User;
use App\Models\Auth\SocialAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Repositories\Backend\Access\User\SocialRepository;

/**
 * Class UserSocialController.
 */
class UserSocialController extends Controller
{
    /**
     * @param User                 $user
     * @param SocialAccount          $social
     * @param ManageUserRequest    $request
     * @param SocialRepository $socialRepository
     *
     * @return mixed
     */
    public function unlink(User $user, SocialAccount $social, ManageUserRequest $request, SocialRepository $socialRepository)
    {
        $socialRepository->delete($user, $social);

        return redirect()->back()->withFlashSuccess(__('alerts.backend.users.social_deleted'));
    }
}
