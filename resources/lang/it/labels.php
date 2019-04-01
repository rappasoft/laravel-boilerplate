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
        'all' => 'Tutti',
        'yes' => 'Sì',
        'no' => 'No',
        'custom' => 'Custom', // TODO TRANSLATION
        'actions' => 'Azioni',
        'active' => 'Active',
        'buttons' => [
            'save' => 'Salva',
            'update' => 'Aggiorna',
        ],
        'hide' => 'Nascondi',
        'inactive' => 'Inactive',
        'none' => 'Nessuno',
        'show' => 'Visualizza',
        'toggle_navigation' => 'Menu Navigazione',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Crea ruolo',
                'edit' => 'Modifica ruolo',
                'management' => 'Gestione ruolo',

                'table' => [
                    'number_of_users' => 'Numero di utenti',
                    'permissions' => 'Permessi',
                    'role' => 'Ruolo',
                    'sort' => 'Ordina',
                    'total' => 'Ruolo|Totale ruoli',
                ],
            ],

            'users' => [
                'active' => 'Utenti attivi',
                'all_permissions' => 'Tutti i permessi',
                'change_password' => 'Cambia password',
                'change_password_for' => 'Cambia password per :user',
                'create' => 'Crea utente',
                'deactivated' => 'Utenti disattivati',
                'deleted' => 'Utenti eliminati',
                'edit' => 'Modifica utente',
                'management' => 'Gestione utente',
                'no_permissions' => 'Nessun permesso',
                'no_roles' => 'Nessuno ruolo da assegnare.',
                'permissions' => 'Permessi',

                'table' => [
                    'confirmed' => 'Confermato',
                    'created' => 'Creato',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Ultimo aggiornamento',
                    'name' => 'Nome',
                    'no_deactivated' => 'Nessun utente disattivato',
                    'no_deleted' => 'Nessun utente eliminato',
                    'roles' => 'Ruoli',
                    'social' => 'Social',
                    'total' => 'utente(i) totali', // TODO: pluralization
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
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login tramite :social_media',
            'register_box_title' => 'Registrazione',
            'register_button' => 'Registrati',
            'remember_me' => 'Ricordami',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'forgot_password' => 'Password dimenticata?',
            'reset_password_box_title' => 'Reset password',
            'reset_password_button' => 'Reset password',
            'send_password_reset_link_button' => 'Invia link per il reset della password',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Data di creazione',
                'edit_information' => 'Modifica informazioni',
                'email' => 'E-mail',
                'last_updated' => 'Ultimo aggiornamento',
                'name' => 'Nome',
                'update_information' => 'Aggiorna informazioni',
            ],
        ],
    ],
];
