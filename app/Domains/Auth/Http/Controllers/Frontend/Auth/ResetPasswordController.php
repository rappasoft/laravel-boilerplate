<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Rules\UnusedPassword;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class ResetPasswordController.
 */
class ResetPasswordController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'max:255', 'email'],
            'password' => array_merge(
                [
                    'max:100',
                    new UnusedPassword(request('email')),
                ],
                PasswordRules::changePassword(request('email'))
            ),
        ];
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('frontend.auth.passwords.reset')
            ->withToken($token)
            ->withEmail($request->email);
    }
}
