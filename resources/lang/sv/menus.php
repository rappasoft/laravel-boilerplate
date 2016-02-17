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
            'title' => 'Användare och rättigheter',

            'permissions' => [
                'all' => 'Alla tillstånd',
                'create' => 'Skapa tillstånd',
                'edit' => 'Redigera tillstånd',
                'groups' => [
                    'all' => 'Alla tillståndsgrupper',
                    'create' => 'Skapa tillståndsgrupp',
                    'edit' => 'Redigera tillståndsgrupp',
                    'main' => 'Tillståndsgrupper',
                ],
                'main' => 'Tillstånd',
                'management' => 'Hantera tillstånd',
            ],

            'roles' => [
                'all' => 'Alla roller',
                'create' => 'Skapa roll',
                'edit' => 'Redigera roll',
                'management' => 'Hantera roller',
                'main' => 'Roller',
            ],

            'users' => [
                'all' => 'Alla användare',
                'change-password' => 'Byt lösenord',
                'create' => 'Skapa användare',
                'deactivated' => 'Inaktiverade användare',
                'deleted' => 'Raderade användare',
                'edit' => 'Redigera användare',
                'main' => 'Användare',
            ],
        ],

        'log-viewer' => [
            'main' => 'Loggöversikt',
            'dashboard' => 'Huvudpanelen',
            'logs' => 'Loggar',
        ],

        'sidebar' => [
            'dashboard' => 'Kontrollpanelen',
            'general' => 'Adminpanelen',
        ],
    ],

    'language-picker' => [
        'language' => 'Språk',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'da' => 'Danska (Danish)',
            'de' => 'Tyska (German)',
            'pt-BR' => 'Brasiliansk portugisiska (Brazilian Portuguese)',
            'en' => 'Engelska (English)',
            'fr' => 'Franska (French)',
            'it' => 'Italienska (Italian)',
            'es' => 'Spanska (Spanish)',
            'sv' => 'Svenska (Swedish)',
        ],
    ],
];
