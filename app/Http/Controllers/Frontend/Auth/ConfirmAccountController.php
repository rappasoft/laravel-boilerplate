<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Models\Access\User\User;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Access\User\UserRepository;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;

/**
 * Class ConfirmAccountController.
 */
class ConfirmAccountController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ConfirmAccountController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * @param $token
     *
     * @return mixed
     */
    public function confirm($token)
    {
        $this->user->confirmAccount($token);

        return redirect()->route('frontend.auth.login')->withFlashSuccess(__('Your account has been successfully confirmed!'));
    }

    /**
     * @param $user
     *
     * @return mixed
     */
    public function sendConfirmationEmail(User $user)
    {
        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->route('frontend.auth.login')->withFlashSuccess(__('A new confirmation e-mail has been sent to the address on file.'));
    }
}
