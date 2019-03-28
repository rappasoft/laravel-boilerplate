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
        'all'     => 'Alle',
        'yes'     => 'Ja',
        'no'      => 'Nei',
        'custom'  => 'Brukerdefineret',
        'actions' => 'Handlinger',
        'active'  => 'Aktiv',
        'buttons' => [
            'save'   => 'Lagre',
            'update' => 'Oppdater',
        ],
        'hide'              => 'Skjul',
        'inactive'          => 'Innaktiv',
        'none'              => 'Ingen',
        'show'              => 'Vis',
        'toggle_navigation' => 'Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Opprett Rolle',
                'edit'       => 'Oppdater Rolle',
                'management' => 'Rolleadministration',

                'table' => [
                    'number_of_users' => 'Antall Brukere',
                    'permissions'     => 'Rettigheter',
                    'role'            => 'Rolle',
                    'sort'            => 'Sortér',
                    'total'           => 'rolle i alt|roller i alt',
                ],
            ],

            'users' => [
                'active'              => 'Aktive Brukere',
                'all_permissions'     => 'Alle Rettigheter',
                'change_password'     => 'Endre Passord',
                'change_password_for' => 'Endre Passord for :user',
                'create'              => 'Opprett Bruker',
                'deactivated'         => 'Deaktiver Brukere',
                'deleted'             => 'Slettet Brukere',
                'edit'                => 'Rediger Bruker',
                'management'          => 'Brukeradministration',
                'no_permissions'      => 'Ingen Rettigheter',
                'no_roles'            => 'Ingen Rolle valgt.',
                'permissions'         => 'Rettigheter',

                'table' => [
                    'confirmed'      => 'Bekreftet',
                    'created'        => 'Opprettet',
                    'email'          => 'Email',
                    'id'             => 'Id',
                    'last_updated'   => 'Sist Oppdateret',
                    'first_name'     => 'Brukernavn',
                    'last_name'      => 'Etternavn',
                    'no_deactivated' => 'Ingen Deaktiverede Brukere',
                    'no_deleted'     => 'Ingen Slettede Brukere',
                    'roles'          => 'Roller',
                    'social'         => 'Sosial',
                    'total'          => 'bruker i alt|brukere i alt',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Bekreftet',
                            'created_at'   => 'Opprettet den',
                            'deleted_at'   => 'Slettet den',
                            'email'        => 'E-mail',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'Sist Oppdatert',
                            'first_name'   => 'Brukernavn',
                            'last_name'    => 'Etternavn',
                            'status'       => 'Status',
                            'timezone'     => 'Timezone',
                        ],
                    ],
                ],

                'view' => 'Se på Bruker',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Logg inn',
            'login_button'       => 'Logg inn',
            'login_with'         => 'Logg inn med :social_media',
            'register_box_title' => 'Opprett',
            'register_button'    => 'Opprett',
            'remember_me'        => 'Husk meg',
        ],

        'contact' => [
            'box_title' => 'Kontakt oss',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'forgot_password'                 => 'Glemt passordet?',
            'reset_password_box_title'        => 'tilbakestill passordet',
            'reset_password_button'           => 'tilbakestill passordet',
            'send_password_reset_link_button' => 'Send link til å tilbakestille passordet',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Landkoder',
                'alpha2'  => 'Landkoder (Alfa-2)',
                'alpha3'  => 'Landkode (Alfa-3)',
                'numeric' => 'Landkoder (Numerisk)',
            ],

            'macro_examples' => 'Eksempler på Makroer',

            'state' => [
                'mexico' => 'Mexicos stater',
                'us'     => [
                    'us'       => 'Amerikanske stater',
                    'outlying' => 'Amerikanske oversøiske territorier',
                    'armed'    => 'Amerikanske vepnede styrker',
                ],
            ],

            'territories' => [
                'canada' => 'Canada\'s provinser og territorier',
            ],

            'timezone' => 'Tidssone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Endre passord',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Opprettet den',
                'edit_information'   => 'Rediger information',
                'email'              => 'Email',
                'last_updated'       => 'Sist opdateret',
                'first_name'         => 'Brukernavn',
                'last_name'          => 'Etternavn',
                'update_information' => 'Oppdater information',
            ],
        ],

    ],
];
