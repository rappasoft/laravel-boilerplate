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
        'all' => 'Alle',
        'yes' => 'Ja',
        'no' => 'Nej',
        'custom' => 'Brugerdefineret',
        'actions' => 'Handlinger',
        'active' => 'Active',
        'buttons' => [
            'save' => 'Gem',
            'update' => 'Opdater',
        ],
        'hide' => 'Skjul',
        'inactive' => 'Inactive',
        'none' => 'Ingen',
        'show' => 'Vis',
        'toggle_navigation' => 'Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Opret Rolle',
                'edit' => 'Opdater Rolle',
                'management' => 'Rolleadministration',

                'table' => [
                    'number_of_users' => 'Antal Brugere',
                    'permissions' => 'Rettigheder',
                    'role' => 'Rolle',
                    'sort' => 'Sortér',
                    'total' => 'rolle i alt|roller i alt',
                ],
            ],

            'users' => [
                'active' => 'Aktive Brugere',
                'all_permissions' => 'Alle Rettigheder',
                'change_password' => 'Skift Adgangskode',
                'change_password_for' => 'Skift Adgangskode for :user',
                'create' => 'Opret Bruger',
                'deactivated' => 'Deaktiverde Brugere',
                'deleted' => 'Slettede Brugere',
                'edit' => 'Rediger Bruger',
                'management' => 'Brugeradministration',
                'no_permissions' => 'Ingen Rettigheder',
                'no_roles' => 'Ingen Rolle valgt.',
                'permissions' => 'Rettigheder',

                'table' => [
                    'confirmed' => 'Bekræftet',
                    'created' => 'Oprettet',
                    'email' => 'Email',
                    'id' => 'Id',
                    'last_updated' => 'Sidst Opdateret',
                    'name' => 'Navn',
                    'no_deactivated' => 'Ingen Deaktiverede Brugere',
                    'no_deleted' => 'Ingen Slettede Brugere',
                    'roles' => 'Roller',
                    'social' => 'Social',
                    'total' => 'bruger i alt|brugere i alt',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history' => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Confirmed',
                            'created_at' => 'Created At',
                            'deleted_at' => 'Deleted At',
                            'email' => 'E-mail',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'Last Updated',
                            'name' => 'Name',
                            'status' => 'Status',
                            'timezone' => 'Timezone',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'login_box_title' => 'Log ind',
            'login_button' => 'Log ind',
            'login_with' => 'Log ind med :social_media',
            'register_box_title' => 'Opret',
            'register_button' => 'Opret',
            'remember_me' => 'Husk mig',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'forgot_password' => 'Glemt din adgangskode?',
            'reset_password_box_title' => 'Nulstil adgangskode',
            'reset_password_button' => 'Nulstil adgangskode',
            'send_password_reset_link_button' => 'Send link til at nulstille adgangskoden',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Skift adgangskode',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Oprettet den',
                'edit_information' => 'Rediger information',
                'email' => 'Email',
                'last_updated' => 'Sidst opdateret',
                'name' => 'Navn',
                'update_information' => 'Opdater information',
            ],
        ],
    ],
];
