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
                'already_exists'    => 'Rollen finnes allerede. Velg et annet navn.',
                'cant_delete_admin' => 'Du kan ikke slette rollen "Administrator".',
                'create_error'      => 'Det oppstod et problem ved opprettelsen av denne rollen. Prøv igjen.',
                'delete_error'      => 'Det oppstod et problem ved slettning av denne rollen. Prøv igjen.',
                'has_users'         => 'Du kan ikke slette en rolle med tilhørende brukere.',
                'needs_permission'  => 'Du skal velge mindst én tillatelse til denne rollen.',
                'not_found'         => 'Denne rollen finnes ikke.',
                'update_error'      => 'Det oppstod et problem ved oppdatering av denne rollen. Prøv igjen.',
            ],

            'users' => [
                'already_confirmed'    => 'Brukeren er allerede bekreftet.',
                'cant_deactivate_self'  => 'Du kan ikke utføre denne handlingen på deg selv.',
                'cant_delete_admin'  => 'Du kan ikke slette super administrator.',
                'cant_delete_self'      => 'Du kan ikke slette deg selv.',
                'cant_delete_own_session' => 'Du kan ikke slette din egen sessjon.',
                'create_error'          => 'Det oppstod et problem ved opprettelsen av denne brukeren. Prøv igjen.',
                'delete_error'          => 'Det oppstod et problem ved slettning av denne brukeren. Prøv igjen.',
                'delete_first'          => 'Denne brukeren må slettes først, før den kan bli fjernet permanent.',
                'email_error'           => 'Denne e-mailadressen tilhører en annen bruker.',
                'mark_error'            => 'Det oppstod et problem ved oppdatering av denne brukeren. Prøv igjen.',
                'not_confirmed'            => 'Denne brukeren er ikke bekreftet.',
                'not_found'             => 'Denne brukeren eksisterer ikke.',
                'restore_error'         => 'Det oppstod et problem ved gjennoprettelsen av denne brukeren. Prøv igjen.',
                'role_needed_create'    => 'Du må velge mindst én rolle.',
                'role_needed'           => 'Du må velge mindst én rolle.',
                'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
                'social_delete_error' => 'Det oppstod et problem med fjerningen av de sosiale kontoene til denne brukeren.',
                'update_error'          => 'Det oppstod et problem ved oppdatering av denne brukeren. Prøv igjen.',
                'update_password_error' => 'Det oppstod et problem ved endring av brukerens passord. Prøv igjen.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Din konto er allerede bekreftet.',
                'confirm'           => 'Bekreft din konto!',
                'created_confirm'   => 'Din konto ble opprettet. Vi har sendt deg en email for å bekrefte din adresse.',
                'created_pending'   => 'Din konto ble opprettet og venter på å bli godkjent. Du får en email når den er godkjent.',
                'mismatch'          => 'Din bekreftelseskode matcher ikke.',
                'not_found'         => 'Denne bekreftelseskode finnes ikke.',
                'pending'            => 'Din konto venter på å bli godkjent.',
                'resend'            => 'Din konto er ikke bekreftet. Klikk på linket i bekreftelsesmailen eller <a href=":url">klikk her</a> for å sende den på nytt.',
                'success'           => 'Din konto er blitt godkjent!',
                'resent'            => 'En ny bekreftelsesmail er blitt sendt til din e-mailadresse.',
            ],

            'deactivated' => 'Din konto er blitt deaktiveret.',
            'email_taken' => 'Denne e-mailadressen er allerede i bruk.',

            'password' => [
                'change_mismatch' => 'Dette er ikke ditt gamle passord.',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registrering av nye kontoer er fortiden stengt.',
        ],
    ],
];
