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


    public function updateProfilePic(Request $request)
{
        // Validate the request data, ensuring 'profile_picture' is an image of extensions jpeg png jpg
     $request->validate([
        'profile_picture' => 'image|mimes:jpeg,jpg,png',
    ]);
    if ($request->hasFile('profile_picture')) {
        
        $user = $request->user();
        $profilePicture = $request->file('profile_picture');

        $this->deleteOldProfilePicture($user->image); // Delete old profile image

        $fileName = $request->user()->name . '_' . time() . '_' . $profilePicture->getClientOriginalName();
        $profilePicture->move(public_path('profile_pictures'), $fileName); //store image
        
        // Update the user's image attribute with the saved filename
        $user->image = $fileName;
        $user->save();

        return redirect()->route('frontend.user.account', ['#my-profile'])->withFlashSuccess(__('Profile successfully updated.'));
    }
    return redirect()->route('frontend.user.account', ['#my-profile'])->withFlashInfo(__('No profile picture was uploaded.'));
}


private function deleteOldProfilePicture(string $oldImagePath): void
{
    if ($oldImagePath && file_exists(public_path('profile_pictures/' . $oldImagePath))) {
        unlink(public_path('profile_pictures/' . $oldImagePath)); // Delete the file
    }
}

    
}
