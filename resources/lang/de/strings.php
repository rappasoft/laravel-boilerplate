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
                'no_deactivated' => 'Es gibt keine inaktiven Nutzer.',
                'no_deleted' => 'Es gibt keine gelöschten Nutzer.',
                'restore_user_confirm' => 'Benutzer in den Originalzustand wiederherstellen?',
            ],
        ],

        'dashboard' => [
            'title'   => 'Administratives Dashboard',
            'welcome' => 'Willkommen',
        ],

        'general' => [
            'all_rights_reserved' => 'Alle Rechte vorbehalten.',
            'are_you_sure'        => 'Bist du dir sicher?',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'continue'            => 'Fortsetzen',
            'member_since'        => 'Mitglied seit',
            'minutes'             => ' Minuten',
            'search_placeholder'  => 'Suchen...',
            'timeout'             => 'Du wurdest aus Sicherheitsgründen automatisch abgemeldet weil du inaktiv warst seit ',

            'see_all' => [
                'messages'      => 'Alle Nachrichten anzeigen',
                'notifications' => 'Alle anzeigen',
                'tasks'         => 'Alle Aufgaben anzeigen',
            ],

            'status' => [
                'online'  => 'Angemeldet',
                'offline' => 'Abgemeldet',
            ],

            'you_have' => [
                'messages'      => '{0} Du hast keine Nachrichten|{1} Du hast 1 Nachricht|[2,Inf] Du hast :number Nachrichten',
                'notifications' => '{0} Du hast keine Benachrichtigungen|{1} Du hast 1 Benachrichtigung|[2,Inf] Du hast :number Benachrichtigungen',
                'tasks'         => '{0} Du hast keine Aufgaben|{1} Du hast 1 Aufgabe|[2,Inf] Du hast :number Aufgaben',
            ],
        ],

        'search' => [
            'empty'      => 'Bitte gib einen Suchbegriff ein.',
            'incomplete' => 'Du musst deinen eigenen Such-Algorithmus für dieses System schreiben.',
            'title'      => 'Suchergebnisse',
            'results'    => 'Suchergebnisse für :query',
        ],

        'welcome' => '<p>Dies ist das CoreUI theme von <a href="https://coreui.io/" target="_blank">creativeLabs</a>. Dies ist eine abgestufte Version mit nur den nötigsten Styles und Scripten, damit es läuft. Lade die Vollversion herunter, um Komponenten zum Dashboard hinzufügen zu können.</p>
<p>Alle Funktionen sind statisch mit Ausnahme der <strong>Benutzer Verwaltung</strong> auf der linken Seite. Dieser Boilerplate kommt mit einer voll funktionsfähigen Zugangskontroll-Bibliothek, um Benutzer/Rollen und Berechtigungen zu verwalten.</p>
<p>Denken Sie daran, es ist \'work in progress\' und möglicherweise gibt es Fehler oder andere Probleme die ich noch nicht gesehen habe. Ich werde mein Bestes tun, um sie zu beheben, sowie sie gemeldet werden.</p>
<p>Ich hoffe, du geniesst die Arbeit, die ich hier reingesteckt habe. Bitte besuche die <a href="https://github.com/rappasoft/laravel-5-boilerplate" target="_blank">GitHub</a> Seite für weitere Informationen und meldet alle <a href="https://github.com/rappasoft/Laravel-5-Boilerplate/issues" target="_blank">Fehler hier</a>.</p>
<p><strong>Es bedeutet für dieses Projekt sehr viel Aufwand, mit dem sich schnell ändernden Hauptzweig von Laravel mitzuhalten, deshalb ist jede Hilfe Willkommen.</strong></p>
<p>- Anthony Rappa</p>',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'Your account has been confirmed.',
            'error'                   => 'Hoppla!',
            'greeting'                => 'Hallo!',
            'regards'                 => 'Viele Grüße,',
            'trouble_clicking_button' => 'Wenn du Probleme hast den ":action_text"-Knopf zu drücken, kopiere die URL unten in deinen Web Browser:',
            'thank_you_for_using_app' => 'Danke, dass du diese Anwendung benutzst!',

            'password_reset_subject'    => 'Dein Link zum Zurücksetzen des Kennworts',
            'password_cause_of_email'   => 'Du erhältst diese Email weil wir eine Anforderung erhalten haben, das Kennwort für dieses Konto zurückzusetzen.',
            'password_if_not_requested' => 'Wenn du keine Zurücksetzung deines Kennworts angefordert hast, ist keine weitere Aktion erforderlich.',
            'reset_password'            => 'Klick hier, um dein Passwort zurückzusetzen',

            'click_to_confirm' => 'Klick hier, um dein Konto zu aktivieren:',
        ],

        'contact' => [
            'email_body_title' => 'You have a new contact form request: Below are the details:',
            'subject' => 'A new :app_name contact form submission!',
        ],
    ],

    'frontend' => [
        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Anhand von Berechtigungen - ',
                'role'       => 'Anhand von Rollen - ',
            ],

            'js_injected_from_controller' => 'Javascript von einem Controller eingefügt',

            'using_blade_extensions' => 'Verwenden von Blade-Erweiterungen',

            'using_access_helper' => [
                'array_permissions'     => 'Verwenden von Access Helper mit Array von Berechtigungs-Namen oder ID\'s bei der der Benutzer alle besitzen muss.',
                'array_permissions_not' => 'Verwenden von Access Helper mit Array von Berechtigungs-Namen oder ID\'s bei der der Benutzer nicht alle besitzen muss.',
                'array_roles'           => 'Verwenden von Access Helper mit Array von Rollen-Namen oder ID\'s bei der der Benutzer alle besitzen muss.',
                'array_roles_not'       => 'Verwenden von Access Helper mit Array von Rolen-Namen oder ID\'s bei der der Benutzer nicht alle besitzen muss.',
                'permission_id'         => 'Verwenden von Access Helper mit Berechtigungs-ID',
                'permission_name'       => 'Verwenden von Access Helper mit Berechtigungs-Name',
                'role_id'               => 'Verwenden von Access Helper mit Rollen-ID',
                'role_name'             => 'Verwenden von Access Helper mit Rollen-Name',
            ],

            'view_console_it_works'          => 'Schaue in die Konsole, du solltest \'it works!\' sehen, welches vom FrontendController@index kommt',
            'you_can_see_because'            => 'Du kannst dies sehen, da du folgende Rolle besitzt \':role\'!',
            'you_can_see_because_permission' => 'Du kannst dies sehen, da du folgende Berechtigung besitzt \':permission\'!',
        ],

        'general' => [
            'joined'        => 'Joined',
        ],

        'user' => [
            'change_email_notice' => 'Wenn du deine Email-Adresse änderst, wirst du abgemeldet, bis du deine neue Email-Adresse bestätigt hast.',
            'email_changed_notice' => 'Du musst deine neue Email-Adresse bestätigen, bevor du dich wieder anmelden kannst.',
            'profile_updated'  => 'Profil aktualisiert.',
            'password_updated' => 'Passwort aktualisiert.',
        ],

        'welcome_to' => 'Wilkommen bei :place',
    ],
];
