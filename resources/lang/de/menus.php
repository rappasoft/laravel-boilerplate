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
            'title' => 'Zugriffsverwaltung',

            'permissions' => [
                'all' => 'Alle Berechtigungen',
                'create' => 'Berechtigung erstellen',
                'edit' => 'Berechtigung bearbeiten',
                'groups' => [
                    'all' => 'Alle Gruppen',
                    'create' => 'Gruppe erstellen',
                    'edit' => 'Gruppe bearbeiten',
                    'main' => 'Gruppen',
                ],
                'main' => 'Berechtigungen',
                'management' => 'Berechtigungen Verwalten',
            ],

            'roles' => [
                'all' => 'Alle Rollen',
                'create' => 'Rolle erstellen',
                'edit' => 'Rolle bearbeiten',
                'management' => 'Rollen Verwalten',
                'main' => 'Rollen',
            ],

            'users' => [
                'all' => 'Alle Benutzer',
                'change-password' => 'Passwort ändern',
                'create' => 'Benutzer erstellen',
                'deactivated' => 'Deaktivierte Benutzer',
                'deleted' => 'Gelöschte Benutzer',
                'edit' => 'Benutzer bearbeiten',
                'main' => 'Benutzer',
            ],
        ],

        'log-viewer' => [
            'main' => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => 'Allgemein',
        ],
    ],

    'language-picker' => [
        'language' => 'Sprache',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'da' => 'Danish (Danish)',
            'de' => 'Deutsch (German)',
            'en' => 'Englisch (English)',
            'es' => 'Spanisch (Spanish)',
            'fr' => 'Französisch (French)',
            'it' => 'Italienisch (Italian)',
            'pt-BR' => 'Brasilianisches Portugiesisch (Brazilian Portuguese)',
            'sv' => 'Schwedisch (Swedish)',
        ],
    ],
];
