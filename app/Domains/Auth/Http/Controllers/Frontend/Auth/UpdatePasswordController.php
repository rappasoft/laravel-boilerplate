<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Http\Requests\Frontend\Auth\UpdatePasswordRequest;
use App\Http\Controllers\Controller;
use App\Services\UserService;

/**
 * Class UpdatePasswordController.
 */
class UpdatePasswordController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * ChangePasswordController constructor.
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param  UpdatePasswordRequest  $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function update(UpdatePasswordRequest $request)
    {
        // TODO: Make sure can only update own password
        $this->userService->updatePassword($request->user(), $request->validated());

        return redirect()->route('frontend.user.account', ['#password'])->withFlashSuccess(__('Password successfully updated.'));
    }
}
