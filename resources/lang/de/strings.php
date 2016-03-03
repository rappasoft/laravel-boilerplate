<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Strings Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in strings throughout the system.
    | Regardless where it is placed, a string can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'permissions' => [
                'edit_explanation' => 'Wenn Sie im Hierarchie-Abschnitt änderungen ohne Aktualisierung der Seite durchführen, muss diese Seite aktualisiert werden damit die Änderungen angezeigt werden.',

                'groups' => [
                    'hierarchy_saved' => 'Hierarchie gespeichert.',
                ],

                'sort_explanation' => 'Dieser Abschnitt ermöglicht es Ihnen, die Berechtigungen in Gruppen zu organisieren. Unabhängig von der Gruppe, sind die Berechtigungen immer noch individuell jeder Rolle zugewiesen.',
            ],

            'users' => [
                'delete_user_confirm' => 'Bist du dir sicher, dass du diesen Benutzer permanent löschen möchtest? Überall wo die Benutzer-ID referenziert ist, wird es höchstwahrscheinlich zu Fehlern kommen. Fortfahren auf eigenes Risiko. Dies kann nicht rückgängig gemacht werden.',
                'if_confirmed_off' => '(Wenn nicht bestätigt)',
                'restore_user_confirm' => 'Benutzer in den Originalzustand wiederherstellen?',
            ],
        ],

        'dashboard' => [
            'title' => 'Administratives Dashboard',
            'welcome' => 'Wilkommen',
        ],

        'general' => [
            'all_rights_reserved' => 'Alle Rechte vorbehalten.',
            'are_you_sure' => 'Bist du dir sicher?',
            'boilerplate_link' => 'Laravel 5 Boilerplate',
            'continue' => 'Forsetzen',
            'member_since' => 'Mitglied seit',
            'search_placeholder' => 'Suchen...',

            'see_all' => [
                'messages' => 'Alle Nachrichten anzeigen',
                'notifications' => 'Alle anzeigen',
                'tasks' => 'Alle Aufgaben anzeigen',
            ],

            'status' => [
                'online' => 'Online',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages' => '{0} Du hast keine Nachrichten|{1} Du hast 1 Nachricht|[2,Inf] Du hast :number Nachrichten',
                'notifications' => '{0} Du hast keine Benachrichtigungen|{1} Du hast 1 Benachrichtigung|[2,Inf] Du hast :number Benachrichtigungen',
                'tasks' => '{0} Du hast keine Aufgaben|{1} Du hast 1 Aufgabe|[2,Inf] Du hast :number Aufgaben',
            ],
        ],
    ],

    'emails' => [
        'auth' => [
            'password_reset_subject' => 'Dein Link zum zurücksetzen des Passworts',
            'reset_password' => 'klick hier um dein Passwort zurückzusetzen',
        ],
    ],

    'frontend' => [
        'email' => [
            'confirm_account' => 'Klick hier um deinen Account zu aktivieren:',
        ],

        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Anhand von Berechtigungen - ',
                'role' => 'Anhand von Rollen - ',
            ],

            'js_injected_from_controller' => 'Javascript von einem Controller Eingefügt',

            'using_blade_extensions' => 'Verwenden von Blade-Erweiterungen',

            'using_access_helper' => [
                'array_permissions' => 'Verwenden von Access Helper mit Array von Berechtigungs-Namen oder ID\'s bei der der Benutzer alle besitzen muss.',
                'array_permissions_not' => 'Verwenden von Access Helper mit Array von Berechtigungs-Namen oder ID\'s bei der der Benutzer nicht alle besitzen muss.',
                'array_roles' => 'Verwenden von Access Helper mit Array von Rollen-Namen oder ID\'s bei der der Benutzer alle besitzen muss.',
                'array_roles_not' => 'Verwenden von Access Helper mit Array von Rolen-Namen oder ID\'s bei der der Benutzer nicht alle besitzen muss.',
                'permission_id' => 'Verwenden von Access Helper mit Berechtigungs-ID',
                'permission_name' => 'Verwenden von Access Helper mit Berechtigungs-Name',
                'role_id' => 'Vverwenden von Access Helper mit Rollen-ID',
                'role_name' => 'Verwenden von Access Helper mit Rollen-Name',
            ],

            'view_console_it_works' => 'Schaue in die Konsole, du solltest \'it works!\' sehen, welches vom FrontendController@index kommt',
            'you_can_see_because' => 'Du kannst dies sehen, da du folgende Rolle besitzt \':role\'!',
            'you_can_see_because_permission' => 'Du annst dies sehen, da du folgende Berechtigung besitzt \':permission\'!',
        ],

        'user' => [
            'profile_updated' => 'Profil aktualisiert.',
            'password_updated' => 'Passwort aktualisiert.',
        ],

        'welcome_to' => 'Wilkommen bei :place',
    ],
];