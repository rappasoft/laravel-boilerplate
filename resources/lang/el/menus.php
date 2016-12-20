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
            'title' => 'Access Management',

            'roles' => [
                'all' => 'All Roles',
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',
                'main' => 'Roles',
            ],

            'users' => [
                'all' => 'All Users',
                'change-password' => 'Change Password',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'main' => 'Users',
				'view' => 'View User',
            ],
        ],

        'log-viewer' => [
            'main' => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => 'General',
			'system' => 'System',
        ],
    ],

    'language-picker' => [
        'language' => 'Γλώσσα',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'Αραβικά (Arabic)',
            'da' => 'Δανέζικα (Danish)',
            'de' => 'Γερμανικά (German)',
            'el' => 'Ελληνικά (Greek)',
            'en' => 'Αγγλικά (English)',
            'es' => 'Ισπανικά (Spanish)',
            'fr' => 'Γαλλικά (French)',
            'it' => 'Ιταλικά (Italian)',
			'nl' => 'Ολλανδικά (Dutch)',
            'pt_BR' => '(Brazilian Portuguese)',
            'sv' => 'Σουηδικά (Swedish)',
            'th' => 'Ταιλανδέζικα (Thai)',
        ],
    ],
];
