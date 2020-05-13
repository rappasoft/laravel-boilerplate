<?php

use App\Domains\Auth\Http\Controllers\Frontend\HomeController;
use App\Domains\Auth\Http\Controllers\Frontend\User\AccountController;
use App\Domains\Auth\Http\Controllers\Frontend\User\DashboardController;
use App\Domains\Auth\Http\Controllers\Frontend\User\ProfileController;

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
Route::group(['as' => 'user.', 'middleware' => ['auth', 'verified:frontend.auth.verification.notice']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('account', [AccountController::class, 'index'])->name('account');
    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
