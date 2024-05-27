<?php

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\Frontend\User\ProfileController;

use App\Http\Controllers\Admin\DashboardController;

use App\Domains\Auth\Models\User;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});


Route::put('/profile', [ProfileController::class, 'update'])->name('frontend.user.profile.update');

Route::get('/bar', [ChartController::class, 'userChart']);
/*
 * Global Routes
 *
 * Routes that are used between both frontend and backend.
 */

// Switch between the included languages
Route::get('lang/{lang}', [LocaleController::class, 'change'])->name('locale.change');

/*
 * Frontend Routes
 */
Route::group(['as' => 'frontend.'], function () {
    includeRouteFiles(__DIR__.'/frontend/');
});

/*
 * Backend Routes
 *
 * These routes can only be accessed by users with type `admin`
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    includeRouteFiles(__DIR__.'/backend/');
});
