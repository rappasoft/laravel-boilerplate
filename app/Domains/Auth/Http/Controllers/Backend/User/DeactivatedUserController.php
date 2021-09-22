<?php

namespace App\Domains\Auth\Http\Controllers\Backend\User;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use Illuminate\Http\Request;

/**
 * Class UserStatusController.
 */
class DeactivatedUserController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * DeactivatedUserController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.auth.user.deactivated');
    }

    /**
     * @param  Request  $request
     * @param  User  $user
     * @param $status
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Request $request, User $user, $status)
    {
        $this->userService->mark($user, (int) $status);

        return redirect()->route(
            (int) $status === 1 || ! $request->user()->can('admin.access.user.reactivate') ?
                'admin.auth.user.index' :
                'admin.auth.user.deactivated'
        )->withFlashSuccess(__('The user was successfully updated.'));
    }
}
