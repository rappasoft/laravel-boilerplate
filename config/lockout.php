<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Flag to enable/disable read-only mode from the .env file
    |--------------------------------------------------------------------------
    */
    'enabled' => env('APP_READ_ONLY', false),

    /*
    |--------------------------------------------------------------------------
    | Put the app in read-only mode but still allow users to login and view
    | Good if you want to give access to view a secure area but not alter data
    |--------------------------------------------------------------------------
    */
    'allow_login' => env('APP_READ_ONLY_LOGIN', false),

    /*
    |--------------------------------------------------------------------------
    | Path to your login/logout paths from the root, http://mysite.com/login
    | If allow_login = true
    |--------------------------------------------------------------------------
    */
    'login_path' => 'login',
    'logout_path' => 'logout',

    /*
    |--------------------------------------------------------------------------
    | The request types that you want to block
    |--------------------------------------------------------------------------
    */
    'locked_types' => [
        'post',
        'put',
        'patch',
        'delete',
    ],

    /*
    |--------------------------------------------------------------------------
    | The GET request, or paths that you want to prevent access to
    |--------------------------------------------------------------------------
    */
    'pages' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | White list certain request types to certain pages
    |--------------------------------------------------------------------------
    */
    'whitelist' => [
        'post' => 'password/confirm',
    ],
];
