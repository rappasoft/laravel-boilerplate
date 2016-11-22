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
            'title' => 'Gestione accessi',

            'roles' => [
                'all' => 'Tutti i ruoli',
                'create' => 'Crea ruolo',
                'edit' => 'Modifica ruolo',
                'management' => 'Gestione ruoli',
                'main' => 'Ruoli',
            ],

            'users' => [
                'all' => 'Tutti gli utenti',
                'change-password' => 'Cambia password',
                'create' => 'Crea utente',
                'deactivated' => 'Utenti disattivati',
                'deleted' => 'Utenti eliminati',
                'edit' => 'Modifica utente',
                'main' => 'Utenti',
				'view' => 'View User',
            ],
        ],

        'log-viewer' => [
            'main' => 'Log',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => 'Generale',
			'system' => 'System',
        ],
    ],

    'language-picker' => [
        'language' => 'Lingua',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'العربية (Arabic)',
            'da' => 'Danese (Danish)',
            'de' => 'Tedesco (German)',
            'en' => 'Inglese (English)',
            'es' => 'Spagnol (Spanish)',
            'fr' => 'Francese (French)',
            'it' => 'Italiano (Italian)',
			'nl' => 'Olandese (Dutch)',
            'pt-BR' => 'Portoghese Brasiliano (Brazilian Portuguese)',
            'sv' => 'Svedese (Swedish)',
            'th' => 'Thai',
        ],
    ],
];
