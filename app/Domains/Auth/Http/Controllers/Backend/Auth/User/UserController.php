<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Auth\User;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Services\UserService;

/**
 * Class UserController.
 */
class UserController extends Controller
{

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * UserController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        // TODO: Keep these here or no?
        $this->middleware('permission:access.users.read')->only('index');
        $this->middleware('permission:access.users.create')->only('create');
        $this->middleware('permission:access.users.create')->only('store');
//        $this->middleware('permission:access.users.update')->only('edit');
//        $this->middleware('permission:access.users.update')->only('update');
        $this->middleware('permission:access.users.delete')->only('destroy');

        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.auth.user.index');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('backend.auth.user.create');
    }

    /**
     * @param  User  $user
     *
     * @return mixed
     */
    public function show(User $user)
    {
        return view('backend.auth.user.show')
            ->withUser($user);
    }

    /**
     * @param  User  $user
     *
     * @return mixed
     * @throws \App\Domains\Auth\Exceptions\GeneralException
     */
    public function destroy(User $user)
    {
        $this->userService->delete($user);

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('The user was successfully deleted.'));
    }
}
