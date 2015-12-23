<?php

$router->group([
    'prefix'     => 'access',
    'namespace'  => 'Access',
    'middleware' => 'access.routeNeedsPermission:view-access-management',
], function () use ($router) {
    /**
     * User Management
     */
    $router->group(['namespace' => 'User'], function () use ($router) {
        $router->resource('users', 'UserController', ['except' => ['show']]);

        $router->get('users/deactivated', 'UserController@deactivated')->name('admin.access.users.deactivated');
        $router->get('users/banned', 'UserController@banned')->name('admin.access.users.banned');
        $router->get('users/deleted', 'UserController@deleted')->name('admin.access.users.deleted');
        $router->get('account/confirm/resend/{user_id}', 'UserController@resendConfirmationEmail')->name('admin.account.confirm.resend');

        /**
         * Specific User
         */
        $router->group(['prefix' => 'user/{id}', 'where' => ['id' => '[0-9]+']], function () use ($router) {
            $router->get('delete', 'UserController@delete')->name('admin.access.user.delete-permanently');
            $router->get('restore', 'UserController@restore')->name('admin.access.user.restore');
            $router->get('mark/{status}', 'UserController@mark')->name('admin.access.user.mark')->where(['status' => '[0,1,2]']);
            $router->get('password/change', 'UserController@changePassword')->name('admin.access.user.change-password');
            $router->post('password/change', 'UserController@updatePassword')->name('admin.access.user.change-password');
        });
    });

    /**
     * Role Management
     */
    $router->group(['namespace' => 'Role'], function () use ($router) {
        $router->resource('roles', 'RoleController', ['except' => ['show']]);
    });

    /**
     * Permission Management
     */
    $router->group(['prefix' => 'roles', 'namespace' => 'Permission'], function () use ($router) {
        $router->resource('permission-group', 'PermissionGroupController', ['except' => ['index', 'show']]);
        $router->resource('permissions', 'PermissionController', ['except' => ['show']]);

        $router->group(['prefix' => 'groups'], function () use ($router) {
            $router->post('update-sort', 'PermissionGroupController@updateSort')->name('admin.access.roles.groups.update-sort');
        });
    });
});
