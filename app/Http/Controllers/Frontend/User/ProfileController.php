<?php

namespace App\Http\Controllers\Frontend\User;

use App\Domains\Auth\Services\UserService;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use Illuminate\Http\Request;

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
     $request->validate([
        'profile_picture' => 'image|mimes:jpeg,png,jpg',
    ]);
    if ($request->hasFile('profile_picture')) {
        $user = $request->user();
        $profilePicture = $request->file('profile_picture');
        $fileName = $request->user()->name . '_' . time() . '_' . $profilePicture->getClientOriginalName();
        $profilePicture->move(public_path('profile_pictures'), $fileName);

        $user->image = $fileName;
        $user->save();
    
        return redirect()->route('frontend.user.account', ['#my-profile'])->withFlashSuccess(__('Profile successfully updated.'));
    }
    return redirect()->route('frontend.user.account', ['#my-profile'])->withFlashInfo(__('No profile picture was uploaded.'));
}


}
