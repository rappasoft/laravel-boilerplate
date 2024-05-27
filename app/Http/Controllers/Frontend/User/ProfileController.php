<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @param  UpdateProfileRequest  $request
     * @param  UserService  $userService
     * @return mixed
     */
    public function update(UpdateProfileRequest $request, UserService $userService)
    {
        $data = $request->validated();

        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($request->user()->profile_picture) {
                Storage::delete('public/profile_pictures/' . $request->user()->profile_picture);
            }

            // Store the new profile picture
            $fileName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->storeAs('public/profile_pictures', $fileName);

            // Update the profile picture field in the request data
            $data['profile_picture'] = $fileName;
        }

        $userService->updateProfile($request->user(), $data);

        if (session()->has('resent')) {
            return redirect()->route('frontend.auth.verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));
        }

        return redirect()->route('frontend.user.account', ['#information'])->withFlashSuccess(__('Profile successfully updated.'));
    }
}
