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
            'permissions' => [
                'create_error' => 'Der opstod et problem ved oprettelses af denne tilladelse. Prøv igen.',
                'delete_error' => 'Der opstod et problem ved sletning af denne tilladelse. Prøv igen.',

                'groups' => [
                    'associated_permissions' => 'Du kan ikke slette denne gruppe, fordi det har tilknyttet tilladelser.',
                    'has_children' => 'Du kan ikke slette denne gruppe, fordi det har underordnede grupper.',
                    'name_taken' => 'Der findes allerede en gruppe med dette navn',
                ],

                'not_found' => 'Den rettighede eksistere ikke.',
                'system_delete_error' => 'Du kan ikke slette en system rettighed.',
                'update_error' => 'Der opstod et problem at opdatere denne rettighed. Prøv igen.',
            ],

            'roles' => [
                'already_exists' => 'Findes allerede den rolle. Vælg et andet navn.',
                'cant_delete_admin' => 'Du kan ikke slette Administrator rollen.',
                'create_error' => 'Der opstod et problem at skabe denne rolle. Prøv igen.',
                'delete_error' => 'Der opstod et problem at slette denne rolle. Prøv igen.',
                'has_users' => 'Du kan ikke slette en rolle med tilhørende brugere.',
                'needs_permission' => 'Du skal vælge mindst én tilladelse til denne rolle.',
                'not_found' => 'Denne rolle findes ikke.',
                'update_error' => 'Der opstod et problem at opdatere denne rolle. Prøv igen.',
            ],

            'users' => [
                'cant_deactivate_self' => 'Du kan ikke gøre det for dig selv.',
                'cant_delete_self' => 'Du kan ikke slette dig selv.',
                'create_error' => 'Der opstod et problem at skabe denne bruger. Prøv igen.',
                'delete_error' => 'Der opstod et problem at slette denne bruger. Prøv igen.',
                'email_error' => 'Denne e-mailadresse tilhører en anden bruger.',
                'mark_error' => 'Der opstod et problem at opdatere denne bruger. Prøv igen.',
                'not_found' => 'Denne bruger eksistere ikke.',
                'restore_error' => 'Der opstod et problem at genskabe denne bruger. Prøv igen.',
                'role_needed_create' => 'Du skal vælge mindst én rolle. Bruger er oprettet, men deaktiveret.',
                'role_needed' => 'Du skal vælge mindst én rolle.',
                'update_error' => 'Der opstod et problem at opdatere denne bruger. Prøv igen.',
                'update_password_error' => 'Der opstod et problem at ændre denne brugers adgangskode. Prøv igen.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Din konto er allerede bekræftet.',
                'confirm' => 'Bekræft din konto!',
                'created_confirm' => 'Din konto blev oprettet. Vi har sendt dig en e-mail for at bekræfte din konto.',
                'mismatch' => 'Din bekræftelseskode matcher ikke.',
                'not_found' => 'At bekræftelseskode findes ikke.',
                'resend' => 'Din konto er ikke bekræftet. Klik på linket bekræftelse e-mail eller <a href="' . route('account.confirm.resend', ':user_id') . '">tryk her</a> for at gensende bekræftelses e-mailen.',
                'success' => 'Din konto er blevet succesfuldt bekræftet!',
                'resent' => 'En ny bekræftelses e-mail er blevet sendt til adressen vi kender.',
            ],

            'deactivated' => 'Din konto er blevet deaktiveret.',
            'email_taken' => 'At e-mail-adresse er allerede taget.',

            'password' => [
                'change_mismatch' => 'Det er ikke din gamle adgangskode.',
            ],


        ],
    ],
];
