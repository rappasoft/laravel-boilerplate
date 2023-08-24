<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use Illuminate\Support\Str; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        $user = $request->user();
        $validatedData = $request->validated();
        // dd($validatedData);
    
        // Check if a new avatar is provided
        if (isset($validatedData['avatar'])) {
            // Get the current profile picture path
            $currentProfilePicture = $user->profile_picture;
    
            // Delete the existing profile picture if it exists
            if ($currentProfilePicture && file_exists(public_path($currentProfilePicture))) {
                unlink(public_path($currentProfilePicture));
                $oldFolder = dirname(public_path($currentProfilePicture));
                rmdir($oldFolder);
            }
    
            // Update the profile picture
            $name = Str::slug($user->name);
            $uniqueFolderName = $name . '_' . time();
            $folderPath = 'img/profile-pictures/' . $uniqueFolderName;
            $profilePicturePath = $folderPath . '/profile-picture.jpg';
    
            // Create the directory if it doesn't exist
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0777, true);
            }
    
            // Move the uploaded file to the target location
            $validatedData['avatar']->move($folderPath, 'profile-picture.jpg');
    
            // Update the user's profile picture attribute
            $user->profile_picture = $profilePicturePath;
        }
    
        $userService->updateProfile($request->user(), $request->validated());
    
        if (session()->has('resent')) {
            return redirect()->route('frontend.auth.verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));
        }
    
        return redirect()->route('frontend.user.account', ['#information'])->withFlashSuccess(__('Profile successfully updated.'));
    }
    
}