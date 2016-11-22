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
            'title' => 'Administración de acceso',

            'roles' => [
                'all' => 'Todos los Roles',
                'create' => 'Nuevo Rol',
                'edit' => 'Modificar Rol',
                'management' => 'Administración de Roles',
                'main' => 'Roles',
            ],

            'users' => [
                'all' => 'Todos los Usuarios',
                'change-password' => 'Cambiar la contraseña',
                'create' => 'Nuevo Usuario',
                'deactivated' => 'Usuarios Desactivados',
                'deleted' => 'Usuarios Eliminados',
                'edit' => 'Modificar Usuario',
                'main' => 'Usuario',
				'view' => 'Ver Usuario',
            ],
        ],

        'log-viewer' => [
            'main' => 'Gestór de Logs',
            'dashboard' => 'Principal',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Principal',
            'general' => 'General',
			'system' => 'Sistema',
        ],
    ],

    'language-picker' => [
        'language' => 'Idioma',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'العربية (Arabic)',
            'da' => 'Danés (Danish)',
            'de' => 'Alemán (German)',
            'en' => 'Inglés (English)',
            'es' => 'Español (Spanish)',
            'fr' => 'Francés (French)',
            'it' => 'Italiano (Italian)',
			'nl' => 'Holandés (Dutch)',
            'pt-BR' => 'Portugués Brasileño',
            'sv' => 'Sueco (Swedish)',
            'th' => 'Thai',
        ],
    ],
];