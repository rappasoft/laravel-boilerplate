<?php

/**
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'prefix'     => 'auth',
    'as'         => 'auth.',
    'namespace'  => 'Auth',
], function () {
    Route::group([
        'middleware' => 'role:administrator',
    ], function () {
        /*
         * User Management
         */
        Route::group(['namespace' => 'User'], function () {
        	Route::get('user', 'UserController@index')->name('user.index');
			Route::get('user/create', 'UserController@create')->name('user.create');
        });

        /*
         * Role Management
         */
        Route::group(['namespace' => 'Role'], function () {
        });
    });
});