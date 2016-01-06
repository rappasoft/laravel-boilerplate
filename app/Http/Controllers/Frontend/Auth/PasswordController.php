<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Services\Access\Traits\ChangePasswords;
use App\Services\Access\Traits\ResetsPasswords;
use App\Repositories\Frontend\User\UserContract;

/**
 * Class PasswordController
 * @package App\Http\Controllers\Frontend\Auth
 */
class PasswordController extends Controller
{

    use ChangePasswords, ResetsPasswords;

    /**
     * Where to redirect the user after their password has been successfully reset
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * @param UserContract $user
     */
    public function __construct(UserContract $user)
    {
        $this->user = $user;
    }
}