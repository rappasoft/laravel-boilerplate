<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'roles' => [
                'already_exists' => 'Diese Rolle existert schon. Bitte wähle einen anderen namen.',
                'cant_delete_admin' => 'Du kannst die Administrator Rolle nicht löschen.',
                'create_error' => 'Beim erstellen der Rolle ist ein Fehler aufgetreten. Bitte versuche es erneut.',
                'delete_error' => 'Beim löschen der Rolle ist ein Fehler aufgetrten. Bitte versuche es erneut.',
                'has_users' => 'Eine Rolle mit zugeordnerten Benutzern kann nicht gelöscht werden.',
                'needs_permission' => 'Für diese Rolle muss mind. eine Berechtigung ausgewählt sein.',
                'not_found' => 'Diese Rolle existiert nicht.',
                'update_error' => 'Beim aktualisieren der Rolle ist ein Fehler aufgetreten. Bitte versuche es erneut.',
            ],

            'users' => [
                'cant_deactivate_self' => 'Du kannst das nicht mit dir selber machen.',
                'cant_delete_self' => 'Du kannst dich nciht selber löschen.',
                'create_error' => 'Beim erstellen des Benutzers ist ein Fehler aufgetreten. Bitte versuche es erneut.',
                'delete_error' => 'Beim löschen des Benutzers ist ein Fehler aufgetreten. Bitte versuche es erneut.',
                'email_error' => 'Diese E-Mailadresse ist einem anderem Benutzer zugeordnet.',
                'mark_error' => 'Beim Aktualisieren des benutzers ist ein fehlöer aufgetreten. Bitte versuche es erneut.',
                'not_found' => 'Dieser benutzer existiert nicht.',
                'restore_error' => 'Beim Wiederherstelen des Benutzers ist ein Fehler aufgetreten. Bitte versuche es erneut.',
                'role_needed_create' => 'Du musst mind. eine Rolle auswählen. Der Benutzer wurde erstellt, jedoch deaktiviert.',
                'role_needed' => 'Du musst mind. eine Rolle auswählen.',
                'update_error' => 'Beim aktualisieren des Benutzers ist ein Fehler aufgetrten. Bitte versuche es erneut.',
                'update_password_error' => 'Das Passwort den Benutzers konnte nicht geändert werden. Bitte versuche es erneut.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Dein Account wurde schon aktiviert.',
                'confirm' => 'Account aktivieren!',
                'created_confirm' => 'Dein Account wurde erstellt. Wir haben dir eiene Aktivierungsmail gesendet.',
                'mismatch' => 'Der Aktivierungscode ist nicht korrekt.',
                'not_found' => 'Der Aktivierungscode existiert nicht.',
                'resend' => 'Dein Account ist nicht aktiviert. Bitte klicke auf den Link in der Aktivierungsmail, oder <a href="' . route('account.confirm.resend', ':user_id') . '">klicke hier</a> um die aktivierungsmail erneut zu senden.',
                'success' => 'Dein Account wurde aktiviert!',
                'resent' => 'Eine neue aktivierungsmail wurde an die hinterlegte E-Mailadresse gesendet.',
            ],

            'deactivated' => 'Dein Account wurde deaktiviert.',
            'email_taken' => 'Diese E-Mailadresse wird schon verwendet.',

            'password' => [
                'change_mismatch' => 'Das ist nicht dein altes Passwort.',
            ],


        ],
    ],
];
