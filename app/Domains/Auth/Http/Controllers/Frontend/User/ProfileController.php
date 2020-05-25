<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\User;

use App\Domains\Auth\Http\Requests\Frontend\User\UpdateProfileRequest;
use App\Http\Controllers\Controller;
use App\Services\UserService;

/**
 * Class ProfileController.
 */
class ProfileController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * ProfileController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param  UpdateProfileRequest  $request
     *
     * @return mixed
     */
    public function update(UpdateProfileRequest $request)
    {
        // TODO: Gate for user to only be able to update themselves

        $this->userService->updateProfile($request->user(), $request->validated());

        if (session()->has('resent')) {
            return redirect()->route('verification.notice')->withFlashInfo(__('You must confirm your new e-mail address before you can go any further.'));
        }

        return redirect()->route('frontend.user.account', ['#information'])->withFlashSuccess(__('Profile successfully updated.'));
    }
}
