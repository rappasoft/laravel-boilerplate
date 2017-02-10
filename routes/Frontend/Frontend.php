<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::name('index')->get('/', 'FrontendController@index');
Route::name('macros')->get('macros', 'FrontendController@macros');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::middleware('auth')->group(function () {
    Route::namespace('User')->as('user.')->group(function () {
        /*
         * User Dashboard Specific
         */
        Route::name('dashboard')->get('dashboard', 'DashboardController@index');

        /*
         * User Account Specific
         */
        Route::name('account')->get('account', 'AccountController@index');

        /*
         * User Profile Specific
         */
        Route::name('profile.update')->patch('profile/update', 'ProfileController@update');
    });
});
