<?php namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserContract;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Frontend
 */
class ProfileController extends Controller {

	/**
	 * @param $id
	 * @return mixed
	 */
	public function edit($id) {
		return view('frontend.user.profile.edit')
			->withUser(auth()->user($id));
	}

	/**
	 * @param $id
	 * @param UserContract $user
	 * @param UpdateProfileRequest $request
	 * @return mixed
	 */
	public function update($id, UserContract $user, UpdateProfileRequest $request) {
		$user->updateProfile($id, $request->all());
		return redirect()->route('frontend.dashboard')->withFlashSuccess("Profile successfully updated.");
	}
}