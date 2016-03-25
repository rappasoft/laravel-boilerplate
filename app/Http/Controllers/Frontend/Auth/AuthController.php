<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Services\Access\Traits\ConfirmUsers;
use App\Services\Access\Traits\UseSocialite;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Services\Access\Traits\AuthenticatesAndRegistersUsers;
use App\Repositories\Frontend\Access\User\UserRepositoryContract;

/**
 * Class AuthController
 * @package App\Http\Controllers\Frontend\Auth
 */
class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ConfirmUsers, ThrottlesLogins, UseSocialite;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Where to redirect users after they logout
     *
     * @var string
     */
    protected $redirectAfterLogout = '/';

    /**
     * @param UserRepositoryContract $user
     */
    public function __construct(UserRepositoryContract $user)
    {
        $this->user = $user;
    }
}