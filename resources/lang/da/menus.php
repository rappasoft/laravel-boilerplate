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
            'title' => 'Adgangsadministration',

            'roles' => [
                'all' => 'Alle Roller',
                'create' => 'Opret Rolle',
                'edit' => 'Rediger Rolle',
                'management' => 'Rolleadministration',
                'main' => 'Roller',
            ],

            'users' => [
                'all' => 'Alle Brugere',
                'change-password' => 'Skift Adgangskode',
                'create' => 'Opret Bruger',
                'deactivated' => 'Deaktiverede Brugere',
                'deleted' => 'Slet Bruger',
                'edit' => 'Rediger Bruger',
                'main' => 'Brugere',
            ],
        ],

        'log-viewer' => [
            'main' => 'Logbog',
            'dashboard' => 'Dashboard',
            'logs' => 'Logbog',
        ],

        'sidebar' => [
            'dashboard' => 'Betjeningspanel',
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
            'ar' => 'Arabisk',
            'da' => 'Dansk',
            'de' => 'Tysk',
            'en' => 'Engelsk',
            'es' => 'Spansk',
            'fr' => 'Fransk',
            'it' => 'Italiensk',
            'pt-BR' => 'Brasiliansk portugisisk',
            'sv' => 'Svensk',
            'th' => 'Thai',
        ],
    ],
];
