<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use Illuminate\Support\Str;


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

        if ($request->hasFile('image')) {
        
            $user = $request->user();
            $profilePicture = $request->file('image');
    
            $this->deleteOldProfilePicture($user->image); // Delete old profile image
    
            $fileName = Str::uuid() . '.' . $profilePicture->getClientOriginalExtension(); //use uuid for file name to be unique

            $profilePicture->move(public_path('profile_pictures'), $fileName); //store image
            
            // Update the user's image attribute with the saved filename
            $user->image = $fileName;
            $user->save();

        }

        $userService->updateProfile($request->user(), $request->validated());


        if (session()->has('resent')) {
            return redirect()->route('frontend.auth.verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));
        }

        return redirect()->route('frontend.user.account', ['#information'])->withFlashSuccess(__('Profile successfully updated.'));
    }





private function deleteOldProfilePicture(string $oldImagePath): void
{
    if ($oldImagePath && file_exists(public_path('profile_pictures/' . $oldImagePath))) {
        unlink(public_path('profile_pictures/' . $oldImagePath)); // Delete the file
    }
}

    
}
