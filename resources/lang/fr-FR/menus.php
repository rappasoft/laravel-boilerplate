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
            'title' => 'Gestion des accès',

            'permissions' => [
                'all' => 'Toutes les Permissions',
                'create' => 'Créer Permission',
                'edit' => 'Éditer Permissions',
                'groups' => [
                    'all' => 'All Groups',
                    'create' => 'Create Group',
                    'edit' => 'Edit Group',
                    'main' => 'Groups',
                ],
                'main' => 'Permissions',
                'management' => 'Permission Management',
            ],

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
            ],
        ],

        'log-viewer' => [
            'main' => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Tableau de bord',
            'general' => 'Général',
        ],
    ],

    'language-picker' => [
        'language' => 'Langue',
        'langs' => [
            'en' => 'English',
            'fr-FR' => 'Français (France)',
        ],
    ],
];
