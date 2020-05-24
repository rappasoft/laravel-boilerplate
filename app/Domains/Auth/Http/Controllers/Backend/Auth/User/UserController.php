<?php

namespace App\Domains\Auth\Http\Controllers\Backend\Auth\User;

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
        $this->middleware('permission:access.users.read')->only('index');
        $this->middleware('permission:access.users.create')->only('create');
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
}
