<?php

/**
 * Frontend Access Controllers
 */
$router->group(['namespace' => 'Auth'], function () use ($router) {
    /**
     * These routes require the user to be logged in
     */
    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->get('auth/logout', 'AuthController@getLogout');
        $router->get('auth/password/change', 'PasswordController@getChangePassword');
        $router->post('auth/password/change', 'PasswordController@postChangePassword')->name('password.change');
    });

    /**
     * These routes require the user NOT be logged in
     */
    $router->group(['middleware' => 'guest'], function () use ($router) {
        $router->get('auth/login/{provider}', 'AuthController@loginThirdParty')->name('auth.provider');

        $router->get('account/confirm/{token}', 'AuthController@confirmAccount')->name('account.confirm');
        $router->get('account/confirm/resend/{user_id}', 'AuthController@resendConfirmationEmail')->name('account.confirm.resend');

        $router->controller('auth', 'AuthController');
        $router->controller('password', 'PasswordController');
    });
});
