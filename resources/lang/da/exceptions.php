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
                'already_exists'    => 'Rolle findes allerede. Vælg et andet navn.',
                'cant_delete_admin' => 'Du kan ikke slette rollen "Administrator".',
                'create_error'      => 'Der opstod et problem ved oprettelse af denne rolle. Prøv venligst igen.',
                'delete_error'      => 'Der opstod et problem ved sletning af denne rolle. Prøv venligst igen.',
                'has_users'         => 'Du kan ikke slette en rolle med tilhørende brugere.',
                'needs_permission'  => 'Du skal vælge mindst én tilladelse til denne rolle.',
                'not_found'         => 'Denne rolle findes ikke.',
                'update_error'      => 'Der opstod et problem ved opdatering af denne rolle. Prøv venligst igen.',
            ],

            'users' => [
                'cant_deactivate_self'  => 'Du kan ikke udføre denne handling på dig selv.',
                'cant_delete_self'      => 'Du kan ikke slette dig selv.',
                'create_error'          => 'Der opstod et problem ved oprettelsen af denne bruger. Prøv venligst igen.',
                'delete_error'          => 'Der opstod et problem ved sletning af denne bruger. Prøv venligst igen.',
                'delete_first'          => 'This user must be deleted first before it can be destroyed permanently.',
                'email_error'           => 'Denne e-mailadresse tilhører en anden bruger.',
                'mark_error'            => 'Der opstod et problem ved opdatering af denne bruger. Prøv venligst igen.',
                'not_found'             => 'Denne bruger eksisterer ikke.',
                'restore_error'         => 'Der opstod et problem ved genskabelse af denne bruger. Prøv venligst igen.',
                'role_needed_create'    => 'Du skal vælge mindst én rolle.',
                'role_needed'           => 'Du skal vælge mindst én rolle.',
                'update_error'          => 'Der opstod et problem ved opdatering af denne bruger. Prøv venligst igen.',
                'update_password_error' => 'Der opstod et problem ved ændring af brugerens adgangskode. Prøv venligst igen.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Din konto er allerede bekræftet.',
                'confirm'           => 'Bekræft din konto!',
                'created_confirm'   => 'Din konto blev oprettet. Vi har sendt dig en email for at bekræfte din konto.',
                'mismatch'          => 'Din bekræftelseskode matcher ikke.',
                'not_found'         => 'Denne bekræftelseskode findes ikke.',
                'resend'            => 'Din konto er ikke bekræftet. Klik på linket i bekræftelsesmailen eller <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">klik her</a> for at gensende bekræftelsesmailen.',
                'success'           => 'Din konto er blevet bekræftet!',
                'resent'            => 'En ny bekræftelsesmail er blevet sendt til den kendte e-mailadresse.',
            ],

            'deactivated' => 'Din konto er blevet deaktiveret.',
            'email_taken' => 'Denne e-mailadresse er allerede i brug.',

            'password' => [
                'change_mismatch' => 'Dette er ikke din gamle adgangskode.',
            ],

        ],
    ],
];
