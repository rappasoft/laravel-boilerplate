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
            'users' => [
                'delete_user_confirm'  => 'Bist du dir sicher, dass du diesen Benutzer permanent löschen möchtest? Überall wo die Benutzer-ID referenziert ist, wird es höchstwahrscheinlich zu Fehlern kommen. Fortfahren auf eigenes Risiko. Dies kann nicht rückgängig gemacht werden.',
                'if_confirmed_off'     => '(Wenn nicht bestätigt)',
                'restore_user_confirm' => 'Benutzer in den Originalzustand wiederherstellen?',
            ],
        ],

        'dashboard' => [
            'title'   => 'Administratives Dashboard',
            'welcome' => 'Wilkommen',
        ],

        'general' => [
            'all_rights_reserved' => 'Alle Rechte vorbehalten.',
            'are_you_sure'        => 'Bist du dir sicher?',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'continue'            => 'Forsetzen',
            'member_since'        => 'Mitglied seit',
            'minutes'             => ' minutes',
            'search_placeholder'  => 'Suchen...',
            'timeout'             => 'You were automatically logged out for security reasons since you had no activity in ',

            'see_all' => [
                'messages'      => 'Alle Nachrichten anzeigen',
                'notifications' => 'Alle anzeigen',
                'tasks'         => 'Alle Aufgaben anzeigen',
            ],

            'status' => [
                'online'  => 'Online',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages'      => '{0} Du hast keine Nachrichten|{1} Du hast 1 Nachricht|[2,Inf] Du hast :number Nachrichten',
                'notifications' => '{0} Du hast keine Benachrichtigungen|{1} Du hast 1 Benachrichtigung|[2,Inf] Du hast :number Benachrichtigungen',
                'tasks'         => '{0} Du hast keine Aufgaben|{1} Du hast 1 Aufgabe|[2,Inf] Du hast :number Aufgaben',
            ],
        ],

        'search' => [
            'empty'      => 'Please enter a search term.',
            'incomplete' => 'You must write your own search logic for this system.',
            'title'      => 'Search Results',
            'results'    => 'Search Results for :query',
        ],

        'welcome' => '<p>Dies ist das AdminLTE theme von <a href="https://almsaeedstudio.com/" target="_blank">https://almsaeedstudio.com/</a>. Dies ist eine abgestufte version mit nur den nötigsten Styles und Scripten, damit es läuft. Downloade die Vollversion, um Komponenten zum Dashboard hinzufügen zu können.</p>
<p>Alle Funktionen für sind statisch mit Ausnahme der <strong>Benutzer Verwaltung</strong> auf der linken Seite. Dieser Boilerplate kommt mit einer voll funktionsfähigen Zugangskontroll-Bibliothek, um Benutzer/Rollen und Berechtigungen zu verwalten.</p>
<p>Denken Sie daran, es ist \'work in progress\' und möglicherweise gibt es Fehler oder andere Probleme die ich noch nicht gesehen habe. Ich werde mein Bestes tun, um sie zu beheben, wie sie gemeldet werden.</p>
<p>Hoffentlich genießen Sie die Arbeit, die ich hier reingesteckt habe. Bitte besuche die <a href="https://github.com/rappasoft/laravel-5-boilerplate" target="_blank">GitHub</a> Seite für weitere Informationen und meldet alle <a href="https://github.com/rappasoft/Laravel-5-Boilerplate/issues" target="_blank">Fehler hier</a>.</p>
<p><strong>This project is very demanding to keep up with given the rate at which the master Laravel branch changes, so any help is appreciated.</strong></p>
<p>- Anthony Rappa</p>',
    ],

    'emails' => [
        'auth' => [
            'error'                   => 'Whoops!',
            'greeting'                => 'Hello!',
            'regards'                 => 'Regards,',
            'trouble_clicking_button' => 'If you’re having trouble clicking the ":action_text" button, copy and paste the URL below into your web browser:',
            'thank_you_for_using_app' => 'Thank you for using our application!',

            'password_reset_subject'    => 'Dein Link zum zurücksetzen des Passworts',
            'password_cause_of_email'   => 'You are receiving this email because we received a password reset request for your account.',
            'password_if_not_requested' => 'If you did not request a password reset, no further action is required.',
            'reset_password'            => 'klick hier um dein Passwort zurückzusetzen',

            'click_to_confirm' => 'Klick hier um deinen Account zu aktivieren:',
        ],
    ],

    'frontend' => [
        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Anhand von Berechtigungen - ',
                'role'       => 'Anhand von Rollen - ',
            ],

            'js_injected_from_controller' => 'Javascript von einem Controller Eingefügt',

            'using_blade_extensions' => 'Verwenden von Blade-Erweiterungen',

            'using_access_helper' => [
                'array_permissions'     => 'Verwenden von Access Helper mit Array von Berechtigungs-Namen oder ID\'s bei der der Benutzer alle besitzen muss.',
                'array_permissions_not' => 'Verwenden von Access Helper mit Array von Berechtigungs-Namen oder ID\'s bei der der Benutzer nicht alle besitzen muss.',
                'array_roles'           => 'Verwenden von Access Helper mit Array von Rollen-Namen oder ID\'s bei der der Benutzer alle besitzen muss.',
                'array_roles_not'       => 'Verwenden von Access Helper mit Array von Rolen-Namen oder ID\'s bei der der Benutzer nicht alle besitzen muss.',
                'permission_id'         => 'Verwenden von Access Helper mit Berechtigungs-ID',
                'permission_name'       => 'Verwenden von Access Helper mit Berechtigungs-Name',
                'role_id'               => 'Vverwenden von Access Helper mit Rollen-ID',
                'role_name'             => 'Verwenden von Access Helper mit Rollen-Name',
            ],

            'view_console_it_works'          => 'Schaue in die Konsole, du solltest \'it works!\' sehen, welches vom FrontendController@index kommt',
            'you_can_see_because'            => 'Du kannst dies sehen, da du folgende Rolle besitzt \':role\'!',
            'you_can_see_because_permission' => 'Du kannst dies sehen, da du folgende Berechtigung besitzt \':permission\'!',
        ],

        'user' => [
            'profile_updated'  => 'Profil aktualisiert.',
            'password_updated' => 'Passwort aktualisiert.',
        ],

        'welcome_to' => 'Wilkommen bei :place',
    ],
];
