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
        'actions' => 'Handlinger',
        'buttons' => [
            'save' => 'Gem',
            'update' => 'Opdater',
        ],
        'hide' => 'Gem',
        'none' => 'Ingen',
        'show' => 'Vis',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Opret rolle',
                'edit' => 'Opdater rolle',
                'management' => 'Vedligehold roller',

                'table' => [
                    'number_of_users' => 'Antal brugere',
                    'permissions' => 'Rettogheder',
                    'role' => 'Rolle',
                    'sort' => 'Sorter',
                    'total' => 'role|roller',
                ],
            ],

            'users' => [
                'active' => 'Aktive brugere',
                'all_permissions' => 'Alle rettigheder',
                'change_password' => 'Ændre kodeord',
                'change_password_for' => 'Ændre kodeord :user',
                'create' => 'Opret bruger',
                'deactivated' => 'Deaktiver bruger',
                'deleted' => 'Slettede brugere',
                'edit' => 'Rediger bruger',
                'management' => 'Bruger vedligeholdelse',
                'no_permissions' => 'Ingen rettigheder',
                'no_roles' => 'Ingen rolle valgt.',
                'permissions' => 'Rettigheder',

                'table' => [
                    'confirmed' => 'Bekræftet',
                    'created' => 'Oprettet',
                    'email' => 'E-mail',
                    'id' => 'Id',
                    'last_updated' => 'Sidst opdateret',
                    'name' => 'Navn',
                    'no_deactivated' => 'Ingen deaktiverede brugere',
                    'no_deleted' => 'Ingen slettede brugere',
                    'roles' => 'Roller',
                    'total' => 'bruger|brugere',
                ],
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'Log ind',
            'login_button' => 'Log ind',
            'login_with' => 'Log ind med :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Husk mig',
        ],

        'passwords' => [
            'forgot_password' => 'Glemt dit kodeord?',
            'reset_password_box_title' => 'Nulstil kodeord',
            'reset_password_button' => 'nulstil kodeord',
            'send_password_reset_link_button' => 'Send link til at nulstille kodeord',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Landes tegn koder',
                'alpha2' => 'Landes 2 tegns koder',
                'alpha3' => 'Landes 3 tegns koder',
                'numeric' => 'Landes tal kode',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico\'s list af stater',
                'us' => [
                    'us' => 'US\'s stater',
                    'outlying' => 'Amerikanske oversøiske territorier',
                    'armed' => 'Amerikanske væbnede styrker',
                ],
            ],

            'territories' => [
                'canada' => 'Canada provinsn & territorier liste',
            ],

            'timezone' => 'Tidszone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Ændre kodeord',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Oprettet den',
                'edit_information' => 'Rediger information',
                'email' => 'E-mail',
                'last_updated' => 'Sidste opdatert',
                'name' => 'Navn',
                'update_information' => 'Opdater information',
            ],
        ],

    ],
];
