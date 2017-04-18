<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Repositories\Frontend\Access\User\UserRepository;

/**
 * Class ResetPasswordController.
 */
class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * @var UserRepository
     */
    protected $user;

    /**
     * ChangePasswordController constructor.
     *
     * @param UserRepository $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Where to redirect users after resetting password.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route('frontend.index');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param string|null $token
     *
     * @return \Illuminate\Http\Response
     */
    public function showResetForm($token = null)
    {
        $route = 'frontend.auth.password.reset';
        if (!$token)
            return redirect()->route($route);

        $email = null;
        try {
            $email = $this->user->getEmailForPasswordToken($token);
        } catch (\Exception $e) {
        }

        if (!$email)
            return redirect()->route($route)->withFlashWarning('There was a problem resetting your password. Please resend the password reset email.'); // (invalid token)

        $user = $this->user->findByEmail($email);

        $exists = app()->make('auth.password.broker')->tokenExists($user, $token);
        if (!$exists)
            return redirect()->route($route)->withFlashWarning('There was a problem resetting your password. Please resend the password reset email.'); // (most likely token expired)

        return view('frontend.auth.passwords.reset')
            ->withToken($token)
            ->withEmail($this->user->getEmailForPasswordToken($token));

    }
}
