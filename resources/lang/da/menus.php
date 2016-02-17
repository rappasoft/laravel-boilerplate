<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Vedligehold adgangsrettigheder',

            'permissions' => [
                'all' => 'Alle rettigheder',
                'create' => 'Opret rettogheder',
                'edit' => 'rediger rettigheder',
                'groups' => [
                    'all' => 'Alle grupper',
                    'create' => 'Opret gruppe',
                    'edit' => 'Rediger gruppe',
                    'main' => 'Groupper',
                ],
                'main' => 'Rettigheder',
                'management' => 'Vedligehold rettigheder',
            ],

            'roles' => [
                'all' => 'Alle roller',
                'create' => 'Opret rolle',
                'edit' => 'rediger rolle',
                'management' => 'Vedligehold roller',
                'main' => 'Roller',
            ],

            'users' => [
                'all' => 'Alle brugere',
                'change-password' => 'Ændre kodeord',
                'create' => 'opret bruger',
                'deactivated' => 'Deaktiver bruger',
                'deleted' => 'Slet bruger',
                'edit' => 'Rediger bruger',
                'main' => 'Brugere',
            ],
        ],

        'log-viewer' => [
            'main' => 'Log viser',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => 'Generelt',
        ],
    ],

    'language-picker' => [
        'language' => 'Sprog',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'da' => 'Dansk',
            'de' => 'Tysk',
            'en' => 'Engelsk',
            'es' => 'Spansk',
            'fr' => 'Fransk',
            'it' => 'Italiensk',
            'pt-BR' => 'Brasiliansk portugisisk',
            'sv' => 'Svensk',
        ],
    ],
];
