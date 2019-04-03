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
                'already_exists' => 'Die rol bestaat al. Kies een andere naam.',
                'cant_delete_admin' => 'De Administrator rol kan niet worden verwijderd.',
                'create_error' => 'Er is een probleem opgetreden bij het creëren van deze rol. Probeer het nogmaals.',
                'delete_error' => 'Er is een probleem opgetreden bij het verwijderen van deze rol. Probeer het nogmaals.',
                'has_users' => 'Een rol met gebruikers kan niet worden verwijdert.',
                'needs_permission' => 'Kies ten minste één permissie voor deze rol.',
                'not_found' => 'Die rol bestaat niet.',
                'update_error' => 'Er is een probleem opgetreden bij het bijwerken van deze rol. Probeer het nogmaals.',
            ],

            'users' => [
                'already_confirmed' => 'Dit account is reeds bevestigd.',
                'cant_confirm' => 'Er is een fout opgedreden tijdens het bevestigen.',
                'cant_deactivate_self' => 'Je kan jezelf niet deactiveren',
                'cant_delete_admin' => 'Je kan de super-admin niet verwijderen.',
                'cant_delete_self' => 'Je kan jezelf niet verwijderen.',
                'cant_delete_own_session' => 'Je kan je eigen sessies niet verwijderen.',
                'cant_restore' => 'Deze gebruiker werd niet verwijderd en kan daardoor niet hersteld worden.',
                'cant_unconfirm_admin' => 'Je kan een super-admin niet deactiveren.',
                'cant_unconfirm_self' => 'Je kan jezelf niet deactiveren.',
                'create_error' => 'Er is een probleem opgetreden bij het creëren van de gebruiker. Probeer het nogmaals.',
                'delete_error' => 'Er is een probleem opgetreden bij het verwijderen van de gebruiker. Probeer het nogmaals.',
                'delete_first' => 'De gebruiker moet eerst verwijderd worden voordat het permanent verwijderd kan worden.',
                'email_error' => 'Dit e-mailadres is al in gebruik.',
                'mark_error' => 'Er is een probleem opgetreden bij het bijwerken van de gebruiker. Probeer het nogmaals.',
                'not_confirmed' => 'Deze gebruiker is niet geactiveerd.',
                'not_found' => 'Deze gebruiker bestaat niet.',
                'restore_error' => 'Er is een probleem opgetreden bij het herstellen van de gebruiker. Probeer het nogmaals.',
                'role_needed_create' => 'U moet ten minste één rol kiezen. De gebruiker is aangemaakt maar gedeactiveerd.',
                'role_needed' => 'U moet ten minste één rol kiezen.',
                'social_delete_error' => 'Er is een fout opgetreden met het verwijderen van het social account.',
                'update_error' => 'Er is een probleem opgetreden bij het bijwerken van de gebruiker. Probeer het nogmaals.',
                'update_password_error' => 'Er is een probleem opgetreden bij het aanpassen van het wachtwoord van de gebruiker. Probeer het nogmaals.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Uw account is reeds bevestigd',
                'confirm' => 'Bevestig uw account!',
                'created_confirm' => 'Uw account is succesvol aangemaakt. Een bevestigings email is verzonden.',
                'created_pending' => 'Uw account is succesvol aangemaakt en wacht nu op bevestiging. Wij sturen een mail naar u zoda uw account is bevestigd.',
                'mismatch' => 'Uw bevestigingscode komt niet overeen.',
                'not_found' => 'De bevestigingscode bestaat niet.',
                'pending' => 'Uw account moet nog bevestigd worden door ons.',
                'resend' => 'Uw account kon niet worden bevestigd. Klik op de informatie link in de email die u heeft ontvangen, of <a href=":url">klik hier</a> om de bevestigingsemail opnieuw te versturen.',
                'success' => 'Uw account is succesvol bevestigd!',
                'resent' => 'Een nieuwe bevestigings email is naar het ingegeven adres verstuurd.',
            ],

            'deactivated' => 'Uw account is gedactiveerd.',
            'email_taken' => 'Dat emailadres is al in gebruik.',

            'password' => [
                'change_mismatch' => 'Dat is niet uw oude wachtwoord',
                'reset_problem' => 'Er is een fout opgetreden. Stuur de reset-link opnieuw.',
            ],

            'registration_disabled' => 'Registratie is momenteel uitgeschakeld.',
        ],
    ],
];
