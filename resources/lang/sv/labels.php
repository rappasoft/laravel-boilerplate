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
        'all'     => 'Alla',
        'yes'     => 'Ja',
        'no'      => 'Nej',
        'custom'  => 'Specifika',
        'actions' => 'Hantera',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Spara',
            'update' => 'Uppdatera',
        ],
        'hide'              => 'Dölj',
        'inactive'          => 'Inactive',
        'none'              => 'Inga',
        'show'              => 'Visa',
        'toggle_navigation' => 'Växla navigering',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Skapa roll',
                'edit'       => 'Redigera roll',
                'management' => 'Hantera roller',

                'table' => [
                    'number_of_users' => 'Antal användare',
                    'permissions'     => 'Tillstånd',
                    'role'            => 'Roll',
                    'sort'            => 'Ordning',
                    'total'           => 'roll totalt|roller totalt',
                ],
            ],

            'users' => [
                'active'              => 'Aktiverade användare',
                'all_permissions'     => 'Alla tillstånd',
                'change_password'     => 'Byt lösenord',
                'change_password_for' => 'Byt lösenord för :user',
                'create'              => 'Skapa användare',
                'deactivated'         => 'Inaktiverade användare',
                'deleted'             => 'Raderade användare',
                'edit'                => 'Redigera användare',
                'management'          => 'Hantera användare',
                'no_permissions'      => 'Inga tillstånd',
                'no_roles'            => 'Inga roller att anta.',
                'permissions'         => 'Tillstånd',

                'table' => [
                    'confirmed'      => 'Bekräftad',
                    'created'        => 'Skapad',
                    'email'          => 'E-post',
                    'id'             => 'ID',
                    'last_updated'   => 'Senast uppdaterad',
                    'name'           => 'Namn',
                    'no_deactivated' => 'Inga inaktiverade användare',
                    'no_deleted'     => 'Inga raderade användare',
                    'roles'          => 'Roller',
                    'social' => 'Social',
                    'total'          => 'användare totalt|användare totalt',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmed',
                            'created_at'   => 'Created At',
                            'deleted_at'   => 'Deleted At',
                            'email'        => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name'         => 'Name',
                            'status'       => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Logga in',
            'login_button'       => 'Logga in',
            'login_with'         => 'Logga in med :social_media',
            'register_box_title' => 'Registrera',
            'register_button'    => 'Registrera',
            'remember_me'        => 'Kom ihåg mig',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'forgot_password'                 => 'Glömt lösenordet?',
            'reset_password_box_title'        => 'Återställ lösenord',
            'reset_password_button'           => 'Återställ lösenord',
            'send_password_reset_link_button' => 'Skicka länk för att återställa lösenordet.',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Land Alpha koder',
                'alpha2'  => 'Land Alpha 2 koder',
                'alpha3'  => 'Land Alpha 3 koder',
                'numeric' => 'Land sifferkod',
            ],

            'macro_examples' => 'Macro exempel',

            'state' => [
                'mexico' => 'Mexicos stater',
                'us'     => [
                    'us'       => 'USA:s stater',
                    'outlying' => 'USA:s avlägsna territorier',
                    'armed'    => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Kanadas provinser och områden',
            ],

            'timezone' => 'Tidszoner',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Byt lösenord',
            ],

            'profile' => [
                'avatar'             => 'Profilbild',
                'created_at'         => 'Skapad',
                'edit_information'   => 'Redigera profil',
                'email'              => 'E-post',
                'last_updated'       => 'Senast uppdaterad',
                'name'               => 'Namn',
                'update_information' => 'Uppdatera profil',
            ],
        ],

    ],
];
