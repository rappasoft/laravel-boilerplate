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
                'already_exists'    => 'Die rol bestaat al. Kies een andere naam.',
                'cant_delete_admin' => 'De Administrator rol kan niet worden verwijdert.',
                'create_error'      => 'Er is een probleem opgetreden bij het creëren van deze rol. Probeer het nogmaals.',
                'delete_error'      => 'Er is een probleem opgetreden bij het verwijderen van deze rol. Probeer het nogmaals.',
                'has_users'         => 'Een rol met gebruikers kan niet worden verwijdert.',
                'needs_permission'  => 'Kies ten minste één permissie voor deze rol.',
                'not_found'         => 'Die rol bestaat niet.',
                'update_error'      => 'Er is een probleem opgetreden bij het bijwerken van deze rol. Probeer het nogmaals.',
            ],

            'users' => [
                'already_confirmed'    => 'This user is already confirmed.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'cant_deactivate_self'  => 'U kunt uzelf niet deactiveren',
                'cant_delete_admin'  => 'You can not delete the super administrator.',
                'cant_delete_self'      => 'U kunt uzelf niet verwijderen.',
                'cant_delete_own_session' => 'You can not delete your own session.',
                'cant_restore'          => 'This user is not deleted so it can not be restored.',
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'create_error'          => 'Er is een probleem opgetreden bij het creëren van de gebruiker. Probeer het nogmaals.',
                'delete_error'          => 'Er is een probleem opgetreden bij het verwijderen van de gebruiker. Probeer het nogmaals.',
                'delete_first'          => 'This user must be deleted first before it can be destroyed permanently.',
                'email_error'           => 'Dit email-adres is al in gebruik.',
                'mark_error'            => 'Er is een probleem opgetreden bij het bijwerken van de gebruiker. Probeer het nogmaals.',
                'not_confirmed'            => 'This user is not confirmed.',
                'not_found'             => 'Die gebruiker bestaat niet.',
                'restore_error'         => 'Er is een probleem opgetreden bij het herstellen van de gebruiker. Probeer het nogmaals.',
                'role_needed_create'    => 'U moet ten minste één rol kiezen. De gebruiker is aangemaakt maar gedeactiveerd.',
                'role_needed'           => 'U moet ten minste één rol kiezen.',
                'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
                'social_delete_error' => 'There was a problem removing the social account from the user.',
                'update_error'          => 'Er is een probleem opgetreden bij het bijwerken van de gebruiker. Probeer het nogmaals.',
                'update_password_error' => 'Er is een probleem opgetreden bij het aanpassen van het wachtwoord van de gebruiker. Probeer het nogmaals.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Uw account is reeds bevestigd',
                'confirm'           => 'Bevestig uw account!',
                'created_confirm'   => 'Uw account is succesvol aangemaakt. Een bevestigings email is verzonden.',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch'          => 'Uw bevestigingscode komt niet overeen.',
                'not_found'         => 'De bevestigingscode bestaat niet.',
                'pending'            => 'Your account is currently pending approval.',
                'resend'            => 'Uw account kon niet worden bevestigd. Klik op de informatie link in de email die u heeft ontvangen, of <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">klik hier</a> om de bevestigingsemail opnieuw te versturen.',
                'success'           => 'Uw account is succesvol bevestigd!',
                'resent'            => 'Een nieuwe bevestigings email is naar het ingegeven adres verstuurd.',
            ],

            'deactivated' => 'Uw account is gedactiveerd.',
            'email_taken' => 'Dat emailadres is al in gebruik.',

            'password' => [
                'change_mismatch' => 'Dat is niet uw oude wachtwoord',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
