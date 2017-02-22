<?php

/**
 * Frontend Access Controllers
 * All route names are prefixed with 'frontend.auth'.
 */
Route::group(['namespace' => 'Auth'], function () {
    Route::as('auth.')->group(function () {

        /*
         * These routes require the user to be logged in
         */
        Route::middleware('auth')->group(function () {
            Route::name('logout')->get('logout', 'LoginController@logout');

            //For when admin is logged in as user from backend
            Route::name('logout-as')->get('logout-as', 'LoginController@logoutAs');

            // Change Password Routes
            Route::name('password.change')->patch('password/change', 'ChangePasswordController@changePassword');
        });

        /*
         * These routes require no user to be logged in
         */
        Route::middleware('guest')->group(function () {
            // Authentication Routes
            Route::name('login')->get('login', 'LoginController@showLoginForm');
            Route::name('login')->post('login', 'LoginController@login');

            // Socialite Routes
            Route::name('social.login')->get('login/{provider}', 'SocialLoginController@login');

            // Registration Routes
            if (config('access.users.registration')) {
                Route::name('register')->get('register', 'RegisterController@showRegistrationForm');
                Route::name('register')->post('register', 'RegisterController@register');
            }

            // Confirm Account Routes
            Route::name('account.confirm')->get('account/confirm/{token}', 'ConfirmAccountController@confirm');
            Route::name('account.confirm.resend')->get('account/confirm/resend/{user}', 'ConfirmAccountController@sendConfirmationEmail');

            // Password Reset Routes
            Route::name('password.email')->get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
            Route::name('password.email')->post('password/email', 'ForgotPasswordController@sendResetLinkEmail');

            Route::name('password.reset.form')->get('password/reset/{token}', 'ResetPasswordController@showResetForm');
            Route::name('password.reset')->post('password/reset', 'ResetPasswordController@reset');
        });
    });
});
