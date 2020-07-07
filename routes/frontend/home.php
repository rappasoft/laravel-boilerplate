<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use App\Domains\Auth\Http\Controllers\Frontend\User\AccountController;
use App\Domains\Auth\Http\Controllers\Frontend\User\DashboardController;
use App\Domains\Auth\Http\Controllers\Frontend\User\ProfileController;
use App\Domains\Auth\Models\User;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('terms', [TermsController::class, 'index'])->name('pages.terms');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */
Route::group(['as' => 'user.', 'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->middleware('type:'.User::TYPE_USER)
        ->name('dashboard');

    Route::get('account', [AccountController::class, 'index'])->name('account');
    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
