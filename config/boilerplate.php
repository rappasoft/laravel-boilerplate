<?php

/**
 * All configuration options for Laravel Boilerplate
 * http://laravel-boilerplate.com
 */

return [
    'access' => [
        'options' => [

            /*
             * Whether or not a user can change their email address after
             * their account has already been created
             */
            'change_email' => env('CHANGE_EMAIL', false),

            /*
             * Use the homeRoute() helper to determine where to send the user after login based on their status
             * If false the frontend.index route will be used
             */
            'redirect' => true,

            /*
             * Whether or not the register route and view are active
             */
            'registration' => env('ENABLE_REGISTRATION', true),

            /*
             * When active, a user can only have one session active at a time
             * That is all other sessions for that user will be deleted when they log in
             * (They can only be logged into one place at a time, all others will be logged out)
             * AuthenticateSession middleware must be enabled
             */
            'single_login' => env('SINGLE_LOGIN', true),
        ],

        'roles' => [

            /*
             * The ID of the administrator role
             * Should be 1 by design
             * It is not recommended to change
             */
            'admin' => 1,

            /*
             * The ID of the default role to give newly registered users
             */
            'default' => 2,
        ],
    ],

    'avatar' => [

        // Default size of the avatar if none is supplied
        'size' => 80,
    ],
];
