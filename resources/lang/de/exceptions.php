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
                'already_exists' => 'Diese Rolle existert schon. Bitte wähle einen anderen Namen.',
                'cant_delete_admin' => 'Du kannst die Administrator-Rolle nicht löschen.',
                'create_error' => 'Beim Erstellen der Rolle ist ein Fehler aufgetreten. Bitte versuche es erneut.',
                'delete_error' => 'Beim Löschen der Rolle ist ein Fehler aufgetrten. Bitte versuche es erneut.',
                'has_users' => 'Eine Rolle mit zugeordneten Benutzern kann nicht gelöscht werden.',
                'needs_permission' => 'Für diese Rolle muss mind. eine Berechtigung ausgewählt sein.',
                'not_found' => 'Diese Rolle existiert nicht.',
                'update_error' => 'Beim Aktualisieren der Rolle ist ein Fehler aufgetreten. Bitte versuche es erneut.',
            ],

            'users' => [
                'already_confirmed' => 'This user is already confirmed.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'cant_deactivate_self' => 'Du kannst das nicht mit dir selber machen.',
                'cant_delete_admin' => 'Du kannst den Haupt-Administrator nicht löschen.',
                'cant_delete_self' => 'Du kannst dich nicht selbst löschen.',
                'cant_delete_own_session' => 'Du kannst nicht deine eigene Sitzung löschen.',
                'cant_restore' => 'Dieser Benutzer wurde nicht gelöscht und kann daher nicht wiederhergestellt werden.',
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'create_error' => 'Beim Erstellen des Benutzers ist ein Fehler aufgetreten. Bitte versuche es erneut.',
                'delete_error' => 'Beim Löschen des Benutzers ist ein Fehler aufgetreten. Bitte versuche es erneut.',
                'delete_first' => 'Dieser Benutzer muß zuerst gelöscht werden bevor er endgültig entfernt werden kann.',
                'email_error' => 'Diese E-Mailadresse ist einem anderem Benutzer zugeordnet.',
                'mark_error' => 'Beim Aktualisieren des Benutzers ist ein Fehler aufgetreten. Bitte versuche es erneut.',
                'not_confirmed' => 'This user is not confirmed.',
                'not_found' => 'Dieser Benutzer existiert nicht.',
                'restore_error' => 'Beim Wiederherstelen des Benutzers ist ein Fehler aufgetreten. Bitte versuche es erneut.',
                'role_needed_create' => 'Du musst mind. eine Rolle auswählen.',
                'role_needed' => 'Du musst mind. eine Rolle auswählen.',
                'social_delete_error' => 'There was a problem removing the social account from the user.',
                'update_error' => 'Beim Aktualisieren des Benutzers ist ein Fehler aufgetrten. Bitte versuche es erneut.',
                'update_password_error' => 'Das Kennwort den Benutzers konnte nicht geändert werden. Bitte versuche es erneut.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Dein Benutzerkonto wurde schon aktiviert.',
                'confirm' => 'Benutzerkonto aktivieren!',
                'created_confirm' => 'Dein Benutzerkonto wurde erstellt. Wir haben dir eine Aktivierungsmail gesendet.',
                'created_pending' => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch' => 'Der Aktivierungscode ist nicht korrekt.',
                'not_found' => 'Der Aktivierungscode existiert nicht.',
                'pending' => 'Your account is currently pending approval.',
                'resend' => 'Dein Benutzerkonto ist nicht aktiviert. Bitte klicke auf den Link in der Aktivierungsmail, oder <a href=":url">klicke hier</a> um die Aktivierungsmail erneut zu senden.',
                'success' => 'Dein Benutzerkonto wurde aktiviert!',
                'resent' => 'Eine neue Aktivierungsmail wurde an die hinterlegte E-Mailadresse gesendet.',
            ],

            'deactivated' => 'Dein Benutzerkonto wurde deaktiviert.',
            'email_taken' => 'Diese E-Mailadresse wird schon verwendet.',

            'password' => [
                'change_mismatch' => 'Das ist nicht dein altes Kennwort.',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registrierung ist momentan nicht möglich.',
        ],
    ],
];
