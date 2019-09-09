<?php

return [
    // Application captcha specific settings
    'captcha' => [
        // Whether the registration captcha is on or off
        'contact' => env('CONTACT_CAPTCHA_STATUS', false),
        'registration' => env('REGISTRATION_CAPTCHA_STATUS', false),
        'login' => env('LOGIN_CAPTCHA_STATUS', false),
    ],

    // Whether or not registration is enabled
    'registration' => env('ENABLE_REGISTRATION', true),

    // Configurations for the user
    'users' => [
        // Whether or not the user has to confirm their email when signing up
        'confirm_email' => env('CONFIRM_EMAIL', false),

        // Whether or not the users email can be changed on the edit profile screen
        'change_email' => env('CHANGE_EMAIL', false),

        // The name of the super administrator role
        'admin_role' => 'administrator',

        // The default role all new registered users get added to
        'default_role' => 'user',

        /*
         * Whether or not new users need to be approved by an administrator before logging in
         * If this is set to true, then confirm_email is not in effect
         */
        'requires_approval' => env('REQUIRES_APPROVAL', false),

        // Login username to be used by the controller.
        'username' => 'email',

        /*
         * When active, a user can only have one session active at a time
         * That is all other sessions for that user will be deleted when they log in
         * (They can only be logged into one place at a time, all others will be logged out)
         * AuthenticateSession middleware must be enabled
         */
        'single_login' => env('SINGLE_LOGIN', true),

        /*
         * How many days before users have to change their passwords
         * false is off
         */
        'password_expires_days' => env('PASSWORD_EXPIRES_DAYS', 30),

        /*
         * The number of most recent previous passwords to check against when changing/resetting a password
         * false is off which doesn't log password changes or check against them
         */
        'password_history' => env('PASSWORD_HISTORY', 3),
    ],

    // Configuration for roles
    'roles' => [
        // Whether a role must contain a permission or can be used standalone as a label
        'role_must_contain_permission' => true,
    ],

    /*
     * Socialite session variable name
     * Contains the name of the currently logged in provider in the users session
     * Makes it so social logins can not change passwords, etc.
     */
    'socialite_session_name' => 'socialite_provider',
];
