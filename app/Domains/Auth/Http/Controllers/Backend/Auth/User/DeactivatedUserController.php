<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Auth\User;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Services\UserService;

/**
 * Class UserStatusController.
 */
class DeactivatedUserController extends Controller
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
     * @param  User  $user
     * @param $status
     *
     * @return mixed
     * @throws \App\Domains\Auth\Exceptions\GeneralException
     */
    public function update(User $user, $status)
    {
        $this->userService->mark($user, (int)$status);

        return redirect()->route(
            (int)$status === 1 ?
                'admin.auth.user.index' :
                'admin.auth.user.deactivated'
        )->withFlashSuccess(__('The user was successfully updated.'));
    }
}
