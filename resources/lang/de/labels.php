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
        'no' => 'Nein',
        'custom' => 'Erweitert', // TODO TRANSLATION
        'actions' => 'Aktionen',
        'active' => 'Aktiv',
        'buttons' => [
            'save' => 'Speichern',
            'update' => 'Aktualisieren',
        ],
        'hide' => 'Verstecken',
        'inactive' => 'Inaktiv',
        'none' => 'Keine',
        'show' => 'Anzeigen',
        'toggle_navigation' => 'Navigation umschalten',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Rolle erstellen',
                'edit' => 'Rolle bearbeiten',
                'management' => 'Rollen verwalten',

                'table' => [
                    'number_of_users' => 'Anzahl Benutzer',
                    'permissions' => 'Berechtigungen',
                    'role' => 'Rolle',
                    'sort' => 'Sortierung',
                    'total' => 'Rolle|Rollen',
                ],
            ],

            'users' => [
                'active' => 'Aktive Benutzer',
                'all_permissions' => 'Alle Berechtigungen',
                'change_password' => 'Kennwort ändern',
                'change_password_for' => 'Kennwort für :user ändern',
                'create' => 'Benutzer erstellen',
                'deactivated' => 'Deaktivierte Benutzer',
                'deleted' => 'Gelöschte Benutzer',
                'edit' => 'Benutzer bearbeiten',
                'management' => 'Benutzer verwalten',
                'no_permissions' => 'Keine Berechtigungen',
                'no_roles' => 'Keine Rollen vorhanden.',
                'permissions' => 'Berechtigungen',

                'table' => [
                    'confirmed' => 'Bestätigt',
                    'created' => 'Erstellt',
                    'email' => 'E-Mail',
                    'id' => 'ID',
                    'last_updated' => 'Letzte Aktualisierung',
                    'name' => 'Name',
                    'first_name' => 'Vorname',
                    'last_name' => 'Nachname',
                    'no_deactivated' => 'Keine deaktivierten Benutzer',
                    'no_deleted' => 'Keine gelöschten Benutzer',
                    'other_permissions' => 'Andere Berechtigungen',
                    'permissions' => 'Berechtigungen',
                    'roles' => 'Rollen',
                    'social' => 'Social',
                    'total' => 'Benutzer|Benutzer',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Übersicht',
                        'history' => 'Verlauf',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Bestätigt',
                            'created_at' => 'Erstellt am',
                            'deleted_at' => 'Gelöscht am',
                            'email' => 'E-mail',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'Zuletzt aktualisiert',
                            'name' => 'Name',
                            'first_name' => 'Vorname',
                            'last_name' => 'Nachname',
                            'status' => 'Status',
                            'timezone' => 'Timezone',
                        ],
                    ],
                ],

                'view' => 'Benutzer anzeigen',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'login_box_title' => 'Anmeldung',
            'login_button' => 'Anmelden',
            'login_with' => 'Anmelden mit :social_media',
            'register_box_title' => 'Registrieren',
            'register_button' => 'Registrieren',
            'remember_me' => 'An mich errinnern',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'forgot_password' => 'Kennwort vergessen?',
            'reset_password_box_title' => 'Kennwort zurücksetzen',
            'reset_password_button' => 'Kennwort zurücksetzen',
            'update_password_button' => 'Kennwort aktualisieren',
            'send_password_reset_link_button' => 'Link zum zurücksetzen des Kennworts senden',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Kennwort ändern',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Erstellt am',
                'edit_information' => 'Informationen bearbeiten',
                'email' => 'E-Mail',
                'last_updated' => 'Letzte Aktualisierung',
                'name' => 'Name',
                'first_name' => 'Vorname',
                'last_name' => 'Nachname',
                'update_information' => 'Informationen aktualisieren',
            ],
        ],
    ],
];
