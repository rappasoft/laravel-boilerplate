<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Flash messages
    |--------------------------------------------------------------------------
    |
    | Here you may configure if to use the laracasts/flash package for flash
    | notifications when a users timezone is set.
    | options [laravel, laracasts, mercuryseries, spatie, mckenziearts]
    |
    */

    'flash' => 'off',

    /*
    |--------------------------------------------------------------------------
    | Overwrite Existing Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may configure if you would like to overwrite existing
    | timezones if they have been already set in the database.
    | options [true, false]
    |
    */

    'overwrite' => true,

    /*
    |--------------------------------------------------------------------------
    | Display Format
    |--------------------------------------------------------------------------
    |
    | Here you may configure the default format for displaying dates
    | in the user's timezone using the @displayDate directive.
    |
    */

    'format' => 'l, F jS Y, g:i A T',

    /*
    |--------------------------------------------------------------------------
    | Short Format
    |--------------------------------------------------------------------------
    |
    | A shorter format for when space is limited
    |
    */

    'short_format' => 'M j, Y g:i A',

    /*
    |--------------------------------------------------------------------------
    | Date Only Format
    |--------------------------------------------------------------------------
    |
    | Format for displaying just dates without time
    |
    */

    'date_format' => 'F jS, Y',

    /*
    |--------------------------------------------------------------------------
    | Time Only Format
    |--------------------------------------------------------------------------
    |
    | Format for displaying just time without date
    |
    */

    'time_format' => 'g:i A T',

    /*
    |--------------------------------------------------------------------------
    | Lookup Array
    |--------------------------------------------------------------------------
    |
    | Here you may configure the lookup array whom it will be used to fetch the user remote address.
    | When a key is found inside the lookup array that key it will be used.
    |
    */

    'lookup' => [
        'server' => [
            'REMOTE_ADDR',
        ],
        'headers' => [

        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Common Business Timezones
    |--------------------------------------------------------------------------
    |
    | List of commonly used business timezones for quick selection
    |
    */

    'common_timezones' => [
        'America/New_York' => 'Eastern Time (US & Canada)',
        'America/Chicago' => 'Central Time (US & Canada)',
        'America/Denver' => 'Mountain Time (US & Canada)',
        'America/Los_Angeles' => 'Pacific Time (US & Canada)',
        'Europe/London' => 'London',
        'Europe/Paris' => 'Paris, Berlin, Amsterdam',
        'Asia/Tokyo' => 'Tokyo',
        'Asia/Shanghai' => 'Beijing, Shanghai',
        'Australia/Sydney' => 'Sydney',
        'UTC' => 'Coordinated Universal Time',
    ],

];
