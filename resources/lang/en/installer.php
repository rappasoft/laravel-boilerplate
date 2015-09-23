<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Installer Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in the installer setup upon first upload
    | That takes the user through a series of steps to check requirements than install
    | the necessary dependencies.
    |
    */

    'title' => app_name() . ' Installer',
    'next' => 'Next Step',
    'previous' => 'Previous Step',

    'welcome' => [
        'title'   => 'Welcome To The '. app_name() .' Installer...',
        'message' => 'Welcome to the setup wizard! Please click next to start checking your system requirements.'
    ],

    'requirements' => [
        'title' => 'PHP Modules'
    ],

    'permissions' => [
        'title' => 'Folder Permissions'
    ],

    'database' => [
        'title' => 'Database Installer',
        'success' => 'Congratulations! The script has been installed and ready to be used.',
        'view-frontend' => 'View Frontend',
        'view-backend' => 'View Backend',
    ],
];