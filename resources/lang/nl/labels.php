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
        'no'      => 'Nee',
        'custom'  => 'Aangepast',
        'actions' => 'Acties',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Bewaar',
            'update' => 'Bijwerken',
        ],
        'hide'              => 'Verberg',
        'inactive'          => 'Inactive',
        'none'              => 'Geen',
        'show'              => 'Toon',
        'toggle_navigation' => 'Navigatie omschakelen',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Rol Creëren',
                'edit'       => 'Rol Aanpassen',
                'management' => 'Rol Beheer',

                'table' => [
                    'number_of_users' => 'Aantal Gebruikers',
                    'permissions'     => 'Permissies',
                    'role'            => 'Rol',
                    'sort'            => 'Sorteer',
                    'total'           => 'rol|rollen',
                ],
            ],

            'users' => [
                'active'              => 'Actieve Gebruikers',
                'all_permissions'     => 'Alle Permissies',
                'change_password'     => 'Wachtwoord veranderen',
                'change_password_for' => 'Wachtwoord veranderen voor :user',
                'create'              => 'Gebruiker Aanmaken',
                'deactivated'         => 'Gedeactiveerde Gebruikers',
                'deleted'             => 'Verwijderde Gebruikers',
                'edit'                => 'Gebruiker aanpassen',
                'management'          => 'Gebruikers Beheer',
                'no_permissions'      => 'Geen Permissie',
                'no_roles'            => 'Geen rollen beschikbaar.',
                'permissions'         => 'Permissies',

                'table' => [
                    'confirmed'      => 'Bevestigd',
                    'created'        => 'Gecreëerd',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Laatst Bijgewerkt',
                    'name'           => 'Naam',
                    'no_deactivated' => 'Geen gedeactiveerde Gebruikers',
                    'no_deleted'     => 'Geen Verwijderde Gebruikers',
                    'roles'          => 'Rollen',
                    'total'          => 'gebruiker|gebruikers',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overzicht',
                        'history'  => 'Geschiedenis',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Bevesstigd',
                            'created_at'   => 'Gecreëerd',
                            'deleted_at'   => 'Verwijdert',
                            'email'        => 'E-mail',
                            'last_updated' => 'Laatst bijgewerkt',
                            'name'         => 'Naam',
                            'status'       => 'Status',
                        ],
                    ],
                ],

                'view' => 'Bekijk gebruiker',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Inloggen',
            'login_button'       => 'Inloggen',
            'login_with'         => 'Inloggen via :social_media',
            'register_box_title' => 'Registreer',
            'register_button'    => 'Registreer',
            'remember_me'        => 'Onthoud Mij',
        ],

        'passwords' => [
            'forgot_password'                 => 'Wachtwoord Vergeten?',
            'reset_password_box_title'        => 'Wachtwoord Resetten',
            'reset_password_button'           => 'Reset Wachtwoord',
            'send_password_reset_link_button' => 'Stuur Wachtwoord Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Land Alpha Codes',
                'alpha2'  => 'Land Alpha 2 Codes',
                'alpha3'  => 'Land Alpha 3 Codes',
                'numeric' => 'Land Numerieke Codes',
            ],

            'macro_examples' => 'Macro Voorbeelden',

            'state' => [
                'mexico' => 'Mexico Staten Lijst',
                'us'     => [
                    'us'       => 'Verenigde Staten',
                    'outlying' => 'VS afgelegen gebieden',
                    'armed'    => 'VS Krijgsmacht',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Provincies & Territories Lijst',
            ],

            'timezone' => 'Tijdzone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Wachtwoord veranderen',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Gecreëerd',
                'edit_information'   => 'Informatie aanpassen',
                'email'              => 'E-mail',
                'last_updated'       => 'Voor het laatst aangepast',
                'name'               => 'Naam',
                'update_information' => 'Informatie bijwerken',
            ],
        ],

    ],
];
