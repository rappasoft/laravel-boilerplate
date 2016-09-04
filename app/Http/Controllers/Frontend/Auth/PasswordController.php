<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Services\Access\Traits\ChangePasswords;
use App\Services\Access\Traits\ResetsPasswords;
use App\Repositories\Frontend\Access\User\UserRepositoryContract;

/**
 * Class PasswordController
 * @package App\Http\Controllers\Frontend\Auth
 */
class PasswordController extends Controller
{

    use ChangePasswords, ResetsPasswords;

    /**
     * @param UserRepositoryContract $user
     */
    public function __construct(UserRepositoryContract $user)
    {
        //Where to redirect the user after their password has been successfully reset
        $this->redirectTo = route('frontend.user.dashboard');
        
        $this->user = $user;
    }
}