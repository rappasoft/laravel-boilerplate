<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Auth\User;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        // TODO: Keep these here or no?
        $this->middleware('permission:access.users.read')->only('index');
        $this->middleware('permission:access.users.create')->only('create');
        $this->middleware('permission:access.users.create')->only('store');
        $this->middleware('permission:access.users.update')->only('edit');
        $this->middleware('permission:access.users.update')->only('update');
        $this->middleware('permission:access.users.delete')->only('destroy');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.auth.user.index');
    }

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
}
