<?php

/**
 * All configuration options for Laravel Boilerplate
 * http://laravel-boilerplate.com.
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Access
    |--------------------------------------------------------------------------
    |
    | Configurations related to the boilerplate's access/authorization options
    */
    'access' => [
        'users' => [
            /*
             * Whether or not a user can change their email address after
             * their account has already been created
             */
            'change_email' => env('CHANGE_EMAIL', false),

            /*
            * How many days before users have to change their passwords
            * false is off
            */
            'password_expires_days' => env('PASSWORD_EXPIRES_DAYS', 120),

            /*
             * The number of most recent previous passwords to check against when changing/resetting a password
             * false is off which doesn't log password changes or check against them
             *
             * Note: Enabling single_login will have an effect on this as it force changes the users password on login,
             * which will force a record into the password_histories table. I currently do not have a fix in mind.
             */
            'password_history' => env('PASSWORD_HISTORY', 3),

            /*
             * Whether or not a user can be permanently deleted from the system via the backend
             * The regular delete button will still exist, and will soft delete the user
             * but the permanently deleted button on the 'deleted users' screen will be hidden.
             */
            'permanently_delete' => false,

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
            'single_login' => env('SINGLE_LOGIN', false),
        ],

        'roles' => [

            /*
             * The name of the administrator role
             * Should be Administrator by design and unable to change from the backend
             * It is not recommended to change
             */
            'admin' => 'Administrator',

            /*
             * The ID of the default role to give newly registered users
             * Use ID because the name can be changed from the backend
             */
            'default' => 2,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Google Analytics
    |--------------------------------------------------------------------------
    |
    | Found in views/includes/partials/ga.blade.php
    */
    'google_analytics' => env('GOOGLE_ANALYTICS', 'UA-XXXXX-X'),

    /*
    |--------------------------------------------------------------------------
    | Avatar
    |--------------------------------------------------------------------------
    |
    | Configurations related to the boilerplate's avatar system
    */
    'avatar' => [

        /*
         * Default size of the avatar if none is supplied
         */
        'size' => 80,
    ],

    /*
    |--------------------------------------------------------------------------
    | Locale
    |--------------------------------------------------------------------------
    |
    | Configurations related to the boilerplate's locale system
    */
    'locale' => [
        /*
         * Whether or not to show the language picker, or just default to the default
         * locale specified in the app config file
         */
        'status' => true,

        /*
         * Available languages
         *
         * Add your language code to this array.
         * The code must have the same name as the language folder.
         * Be sure to add the new language in an alphabetical order.
         *
         * The language picker will not be available if there is only one language option
         * Commenting out languages will make them unavailable to the user
         */
        'languages' => [
            'ar' => ['name' => __('Arabic'), 'rtl' => true],
            'az' => ['name' => __('Azerbaijan'), 'rtl' => false],
            'zh' => ['name' => __('Chinese Simplified'), 'rtl' => false],
            'zh-TW' => ['name' => __('Chinese Traditional'), 'rtl' => false],
            'da' => ['name' => __('Danish'), 'rtl' => false],
            'de' => ['name' => __('German'), 'rtl' => false],
            'el' => ['name' => __('Greek'), 'rtl' => false],
            'en' => ['name' => __('English'), 'rtl' => false],
            'es' => ['name' => __('Spanish'), 'rtl' => false],
            'fa' => ['name' => __('Persian'), 'rtl' => true],
            'fr' => ['name' => __('French'), 'rtl' => false],
            'he' => ['name' => __('Hebrew'), 'rtl' => true],
            'id' => ['name' => __('Indonesian'), 'rtl' => false],
            'it' => ['name' => __('Italian'), 'rtl' => false],
            'ja' => ['name' => __('Japanese'), 'rtl' => false],
            'nl' => ['name' => __('Dutch'), 'rtl' => false],
            'no' => ['name' => __('Norwegian'), 'rtl' => false],
            'pt_BR' => ['name' => __('Brazilian Portuguese'), 'rtl' => false],
            'ru' => ['name' => __('Russian'), 'rtl' => false],
            'sv' => ['name' => __('Swedish'), 'rtl' => false],
            'th' => ['name' => __('Thai'), 'rtl' => false],
            'tr' => ['name' => __('Turkish'), 'rtl' => false],
            'uk' => ['name' => __('Ukrainian'), 'rtl' => false],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Testing Mode
    |--------------------------------------------------------------------------
    |
    | When your application is currently running tests
    |
    */
    'testing' => env('APP_TESTING', false),
];
