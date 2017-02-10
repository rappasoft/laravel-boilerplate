<?php

/**
 * All route names are prefixed with 'admin.access'.
 */
Route::namespace('Access')->prefix('access')->as('access.')->group(function () {

    /*
     * User Management
     */
    Route::middleware('access.routeNeedsPermission:manage-users')->group(function () {
        Route::namespace('User')->group(function () {

            /*
             * For DataTables
             */
            Route::name('user.get')->post('user/get', 'UserTableController');

            /*
             * User Status'
             */
            Route::name('user.deactivated')->get('user/deactivated', 'UserStatusController@getDeactivated');
            Route::name('user.deleted')->get('user/deleted', 'UserStatusController@getDeleted');

            /*
             * User CRUD
             */
            Route::resource('user', 'UserController');

            /*
             * Specific User
             */
            Route::prefix('user/{user}')->group(function () {

                // Account
                Route::name('user.account.confirm.resend')->get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail');

                // Status
                Route::name('user.mark')->get('mark/{status}', 'UserStatusController@mark')->where(['status' => '[0,1]']);

                // Password
                Route::name('user.change-password')->get('password/change', 'UserPasswordController@edit');
                Route::name('user.change-password')->patch('password/change', 'UserPasswordController@update');

                // Access
                Route::name('user.login-as')->get('login-as', 'UserAccessController@loginAs');
            });

            /*
             * Deleted User
             */
            Route::prefix('user/{deletedUser}')->group(function () {
                Route::name('user.delete-permanently')->get('delete', 'UserStatusController@delete');
                Route::name('user.restore')->get('restore', 'UserStatusController@restore');
            });
        });
    });

    /*
     * Role Management
     */
    Route::middleware('access.routeNeedsPermission:manage-roles')->group(function () {
        Route::namespace('Role')->group(function () {
            Route::resource('role', 'RoleController', ['except' => ['show']]);

            //For DataTables
            Route::name('role.get')->post('role/get', 'RoleTableController');
        });
    });
});
