<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;

/**
 * Class ProfileController.
 */
class ProfileController
{
    /**
     * @param  UpdateProfileRequest  $request
     * @param  UserService  $userService
     * @return mixed
     */
    public function update(UpdateProfileRequest $request, UserService $userService)
    {
        $userService->updateProfile($request->user(), $request->validated());

        if (session()->has('resent')) {
            return redirect()->route('frontend.auth.verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));
        }

        return redirect()->route('frontend.user.account', ['#information'])->withFlashSuccess(__('Profile successfully updated.'));
    }

    /**
     * Upload the avatar for the user registering
     *
     * @param  array  $data
     * @return \App\Domains\Auth\Models\User|mixed
     *
     * @throws \App\Domains\Auth\Exceptions\RegisterException
     */
    protected function uploadAvatar( $file,UserService $userService)
    {
       return $userService->uploadAvatar($file);
    }
}
