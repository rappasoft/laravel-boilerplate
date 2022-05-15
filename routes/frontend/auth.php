<?php

use App\Domains\Auth\Http\Controllers\Frontend\Auth\ConfirmPasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\DisableTwoFactorAuthenticationController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\ForgotPasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\LoginController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\PasswordExpiredController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\RegisterController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\ResetPasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\SocialController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\TwoFactorAuthenticationController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\UpdatePasswordController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\VerificationController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Access Controllers
 * All route names are prefixed with 'frontend.auth'.
 */
Route::name('auth.')->group(function () {
    Route::middleware('auth')->group(function () {
        // Authentication
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        // Password expired routes
        Route::get('password/expired', [PasswordExpiredController::class, 'expired'])->name('password.expired');
        Route::patch('password/expired', [PasswordExpiredController::class, 'update'])->name('password.expired.update');

        // These routes can not be hit if the password is expired
        Route::middleware('password.expires')->group(function () {
            // E-mail Verification
            Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
            Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
                ->name('verification.verify')
                ->middleware(['signed', 'throttle:6,1']);
            Route::post('email/resend', [VerificationController::class, 'resend'])
                ->name('verification.resend')
                ->middleware('throttle:6,1');

            // These routes require the users email to be verified
            Route::middleware(config('boilerplate.access.middleware.verified'))->group(function () {
                // Passwords
                Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
                Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

                Route::patch('password/update', [UpdatePasswordController::class, 'update'])->name('password.change');

                // Two-factor Authentication
                Route::prefix('account/2fa')->name('account.2fa.')->group(function () {
                    Route::middleware('2fa:disabled')->group(function () {
                        Route::get('enable', [TwoFactorAuthenticationController::class, 'create'])
                            ->name('create')
                            ->breadcrumbs(function (Trail $trail) {
                                $trail->parent('frontend.user.account')
                                    ->push(__('Enable Two Factor Authentication'), route('frontend.auth.account.2fa.create'));
                            });
                    });

                    Route::middleware('2fa:enabled')->group(function () {
                        Route::get('recovery', [TwoFactorAuthenticationController::class, 'show'])
                            ->name('show')
                            ->breadcrumbs(function (Trail $trail) {
                                $trail->parent('frontend.user.account')
                                    ->push(__('Two Factor Recovery Codes'), route('frontend.auth.account.2fa.show'));
                            });

                        Route::patch('recovery/generate', [TwoFactorAuthenticationController::class, 'update'])->name('update');

                        Route::get('disable', [DisableTwoFactorAuthenticationController::class, 'show'])
                            ->name('disable')
                            ->breadcrumbs(function (Trail $trail) {
                                $trail->parent('frontend.user.account')
                                    ->push(__('Disable Two Factor Authentication'), route('frontend.auth.account.2fa.disable'));
                            });

                        Route::delete('/', [DisableTwoFactorAuthenticationController::class, 'destroy'])->name('destroy');
                    });
                });
            });
        });
    });

    Route::middleware('guest')->group(function () {
        // Authentication
        Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class, 'login']);

        // Registration
        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class, 'register']);

        // Password Reset
        Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

        // Socialite Routes
        Route::get('login/{provider}', [SocialController::class, 'redirect'])->name('social.login');
        Route::get('login/{provider}/callback', [SocialController::class, 'callback']);
    });
});
