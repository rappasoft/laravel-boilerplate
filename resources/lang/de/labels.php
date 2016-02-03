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
        'custom' => 'Custom', // TODO TRANSLATION
        'actions' => 'Aktionen',
        'buttons' => [
            'save' => 'Speichern',
            'update' => 'Aktualisieren',
        ],
        'hide' => 'Verstecken',
        'none' => 'Keine',
        'show' => 'Anzeigen',
        'toggle_navigation' => 'Navigation umschalten',
    ],

    'backend' => [
        'access' => [
            'permissions' => [
                'create' => 'Berechtigung erstellen',
                'dependencies' => 'Abhägigkeiten',
                'edit' => 'Berechtigung bearbeiten',

                'groups' => [
                    'create' => 'Gruppe erstellen',
                    'edit' => 'Gruppe bearbeiten',

                    'table' => [
                        'name' => 'Name',
                    ],
                ],

                'grouped_permissions' => 'Grupperte Berechtigungen',
                'label' => 'berechtigungen',
                'management' => 'Berechtigungen Verwalten',
                'no_groups' => 'Keine Berechtigungsgruppen vorhanden.',
                'no_permissions' => 'Keine Berechtigungen vorhanden.',
                'no_roles' => 'Keine Rollen vorhanden',
                'no_ungrouped' => 'Keine nicht grupperten Berechtigungen vorhanden.',

                'table' => [
                    'dependencies' => 'Abhängikeiten',
                    'group' => 'Gruppe',
                    'group-sort' => 'Gruppen Sortierung',
                    'name' => 'Name',
                    'permission' => 'Berechtigung',
                    'roles' => 'Rollen',
                    'system' => 'System',
                    'total' => 'Berechtigung|Berechtigungen',
                    'users' => 'Benutzer',
                ],

                'tabs' => [
                    'general' => 'Allgemein',
                    'groups' => 'Alle Gruppen',
                    'dependencies' => 'Abhängigkeiten',
                    'permissions' => 'Alle Berechtigungen',
                ],

                'ungrouped_permissions' => 'Nicht grupperte Berechtigungen',
            ],

            'roles' => [
                'create' => 'Rolle erstellen',
                'edit' => 'rolle bearbeiten',
                'management' => 'Rollen Vervalten',

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
                'change_password' => 'Passwort ändern',
                'change_password_for' => 'Passwort für :user ändern',
                'create' => 'Benutzer erstellen',
                'deactivated' => 'Deaktivierte Benutzer',
                'deleted' => 'Gelöschte Benutzer',
                'dependencies' => 'Abhängigkeiten',
                'edit' => 'Benutzer bearbeiten',
                'management' => 'Benutzer Verwalten',
                'no_other_permissions' => 'Keine anderen Berechtigungen',
                'no_permissions' => 'Keine Berechtigungen',
                'no_roles' => 'Keine Rollen vorhanden.',
                'permissions' => 'Berechtigungen',
                'permission_check' => 'Beim Auswählen einer Berechtigung werden deren Abhängigkeiten auch ausgewählt, sofern vorhanden.',

                'table' => [
                    'confirmed' => 'Bestätigt',
                    'created' => 'Erstellt',
                    'email' => 'E-Mail',
                    'id' => 'ID',
                    'last_updated' => 'Letzte Aktualisierung',
                    'name' => 'Name',
                    'no_deactivated' => 'Keine deaktivierten Benutzer',
                    'no_deleted' => 'Keine gelöschten Benutzer',
                    'other_permissions' => 'Andere Berechtigungen',
                    'roles' => 'Rollen',
                    'total' => 'Benutzer|Benutzer',
                ],
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login mit :social_media',
            'register_box_title' => 'Registrieren',
            'register_button' => 'Registrieren',
            'remember_me' => 'An mich errinnern',
        ],

        'passwords' => [
            'forgot_password' => 'Passwort vergessen?',
            'reset_password_box_title' => 'Passwort zurücksetzen',
            'reset_password_button' => 'Passwort zurücksetzen',
            'send_password_reset_link_button' => 'Link zum zurücksetzen des Passworts senden',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'ISO Länder-Code',
                'alpha2' => 'ISO Länder-Code (2 Stellig)',
                'alpha3' => 'ISO Länder-Code (3 Stellig)',
                'numeric' => 'Länder Nummern-Code',
            ],

            'macro_examples' => 'Makro Beispiele',

            'state' => [
                'mexico' => 'Mexico Staaten Liste',
                'us' => [
                    'us' => 'US Staaten',
                    'outlying' => 'US Überseeterritorien',
                    'armed' => 'US-Streitkräfte',
                ],
            ],

            'territories' => [
                'canada' => 'Kanada Provinz & Territorien Liste',
            ],

            'timezone' => 'Zeitzone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Passwort ändern',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Erstellt am',
                'edit_information' => 'Informationen bearbeiten',
                'email' => 'E-Mail',
                'last_updated' => 'Letzte Aktualisierung',
                'name' => 'Name',
                'update_information' => 'Informationen aktualisieren',
            ],
        ],

    ],
];
