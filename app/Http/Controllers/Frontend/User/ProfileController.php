<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Repositories\Frontend\Access\User\UserRepository;

/**
 * Class ProfileController
 * @package App\Http\Controllers\Frontend
 */
class ProfileController extends Controller
{
	/**
	 * ProfileController constructor.
	 * @param UserRepository $user
	 */
	public function __construct(UserRepository $user) {
		$this->user = $user;
	}

    /**
     * @return mixed
     */
    public function edit()
    {
        return view('frontend.user.profile.edit');
    }

	/**
	 * @param UpdateProfileRequest $request
	 * @return mixed
	 */
	public function update(UpdateProfileRequest $request)
    {
        $this->user->updateProfile(access()->id(), $request->all());
        return redirect()->route('frontend.user.dashboard')->withFlashSuccess(trans('strings.frontend.user.profile_updated'));
    }
}