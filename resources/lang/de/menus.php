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

            'roles' => [
                'all' => 'Alle Rollen',
                'create' => 'Rolle erstellen',
                'edit' => 'Rolle bearbeiten',
                'management' => 'Rollen verwalten',
                'main' => 'Rollen',
            ],

            'users' => [
                'all' => 'Alle Benutzer',
                'change-password' => 'Kennwort ändern',
                'create' => 'Benutzer erstellen',
                'deactivated' => 'Deaktivierte Benutzer',
                'deleted' => 'Gelöschte Benutzer',
                'edit' => 'Benutzer bearbeiten',
                'main' => 'Benutzer',
                'view' => 'Benutzer anzeigen',
            ],
        ],

        'log-viewer' => [
            'main' => 'Logbuch',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => 'Allgemein',
            'history' => 'History',
            'system' => 'System',
        ],
    ],

    'language-picker' => [
        'language' => 'Sprache',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'العربية (Arabic)',
            'zh' => '(Chinese Simplified)',
            'zh-TW' => '(Chinese Traditional)',
            'da' => 'Dänisch (Danish)',
            'de' => 'Deutsch (German)',
            'el' => '(Greek)',
            'en' => 'Englisch (English)',
            'es' => 'Spanisch (Spanish)',
            'fa' => 'Persisch (Persian)',
            'fr' => 'Französisch (French)',
            'he' => 'Hebräisch (Hebrew)',
            'id' => 'Indonesisch (Indonesian)',
            'it' => 'Italienisch (Italian)',
            'ja' => 'Japanisch (Japanese)',
            'nl' => 'Niederländisch (Dutch)',
            'no' => 'Norwegisch (Norwegian)',
            'pt_BR' => 'Brasilianisches Portugiesisch (Brazilian Portuguese)',
            'ru' => 'Russisch (Russian)',
            'sv' => 'Schwedisch (Swedish)',
            'th' => '(Thai)',
            'tr' => '(Turkish)',
            'uk' => 'Ukrainisch (Ukrainian)',
        ],
    ],
];
