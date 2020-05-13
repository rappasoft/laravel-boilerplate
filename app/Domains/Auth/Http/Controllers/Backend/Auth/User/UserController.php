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
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.auth.user.index');
    }
}
