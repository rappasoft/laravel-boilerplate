<?php

use App\Domains\Auth\Http\Controllers\Frontend\HomeController;
use App\Domains\Auth\Http\Controllers\Frontend\User\AccountController;
use App\Domains\Auth\Http\Controllers\Frontend\User\DashboardController;
use App\Domains\Auth\Http\Controllers\Frontend\User\ProfileController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\TwoFactorAuthenticationController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */
Route::group(['as' => 'user.', 'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('account', [AccountController::class, 'index'])->name('account');
    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Two-factor Authentication
    Route::group(['prefix' => 'account/2fa', 'as' => 'account.2fa.'], function () {
        Route::group(['middleware' => '2fa:disabled'], function () {
            Route::get('enable', [TwoFactorAuthenticationController::class, 'create'])->name('create');
        });

        Route::group(['middleware' => '2fa:enabled'], function () {
            Route::get('recovery', [TwoFactorAuthenticationController::class, 'show'])->name('show');
            Route::patch('recovery/generate', [TwoFactorAuthenticationController::class, 'update'])->name('update');
            Route::get('disable', [TwoFactorAuthenticationController::class, 'delete'])->name('delete');
            Route::delete('/', [TwoFactorAuthenticationController::class, 'destroy'])->name('destroy');
        });
    });
});
