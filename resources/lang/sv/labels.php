<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => 'Alla',
        'actions' => 'Hantera',
        'buttons' => [
            'save' => 'Spara',
            'update' => 'Uppdatera',
        ],
        'hide' => 'Dölj',
        'none' => 'Inga',
        'show' => 'Visa',
        'toggle_navigation' => 'Växla navigering',
    ],

    'backend' => [
        'access' => [
            'permissions' => [
                'create' => 'Skapa tillstånd',
                'dependencies' => 'Beroende filer',
                'edit' => 'Redigera tillstånd',

                'groups' => [
                    'create' => 'Skapa tillståndsgrupp',
                    'edit' => 'Redigera tillståndsgrupp',

                    'table' => [
                        'name' => 'Namn',
                    ],
                ],

                'grouped_permissions' => 'Tillståndsgrupper',
                'label' => 'tillstånd',
                'management' => 'Hantera tillstånd',
                'no_groups' => 'Det finns inga Tillståndsgrupper.',
                'no_permissions' => 'Det finns inga tillstånd att välja bland.',
                'no_roles' => 'Det finns inga roller att sätta.',
                'no_ungrouped' => 'Det finns inga ogrupperade tillstånd.',

                'table' => [
                    'dependencies' => 'Krävda tillstånd',
                    'group' => 'Grupp',
                    'group-sort' => 'Ordning',
                    'name' => 'Namn',
                    'permission' => 'Tillstånd',
                    'roles' => 'Roller',
                    'system' => 'System status',
                    'total' => 'permissions(s) total',
                    'users' => 'Användare',
                ],

                'tabs' => [
                    'general' => 'General',
                    'groups' => 'Tillståndsgrupper',
                    'dependencies' => 'Dependencies',
                    'permissions' => 'Permissions',
                ],

                'ungrouped_permissions' => 'Ungrouped Permissions',
            ],

            'roles' => [
                'create' => 'Skapa Role',
                'edit' => 'Redigera Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions' => 'Permissions',
                    'role' => 'Role',
                    'sort' => 'Sort',
                    'total' => 'roles(s) total',
                ],
            ],

            'users' => [
                'active' => 'Active Users',
                'all_permissions' => 'Alla Permissions',
                'change_password' => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create' => 'Skapa User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'dependencies' => 'Dependencies',
                'edit' => 'Redigera User',
                'management' => 'User Management',
                'no_other_permissions' => 'No Other Permissions',
                'no_permissions' => 'No Permissions',
                'no_roles' => 'No Roles to set.',
                'permissions' => 'Permissions',
                'permission_check' => 'Checking a permission will also check its dependencies, if any.',

                'table' => [
                    'confirmed' => 'Confirmed',
                    'created' => 'Skapad',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Last Updated',
                    'name' => 'Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted' => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'roles' => 'Roles',
                    'total' => 'user(s) total',
                ],
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me',
        ],

        'passwords' => [
            'forgot_password' => 'Forgot Your Password?',
            'reset_password_box_title' => 'Reset Password',
            'reset_password_button' => 'Reset Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Country Alpha Codes',
                'alpha2' => 'Country Alpha 2 Codes',
                'alpha3' => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us' => [
                    'us' => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed' => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Skapad At',
                'edit_information' => 'Redigera Information',
                'email' => 'E-mail',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];
