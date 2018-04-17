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
                'already_exists'    => 'Det finns redan en roll med detta namn. Välj ett annat namn.',
                'cant_delete_admin' => 'Du kan inte radera en administratörsroll.',
                'create_error'      => 'Det uppstod ett fel då rollen skulle skapas. Försök igen.',
                'delete_error'      => 'Det uppstod ett fel då rollen skulle raderas. Försök igen.',
                'has_users'         => 'Du kan inte radera en roll som har tilldelade användare.',
                'needs_permission'  => 'Du måste välja minst ett tillstånd för en roll.',
                'not_found'         => 'Det finns inte en sådan roll i systemet.',
                'update_error'      => 'Det uppstod ett fel då rollen skulle uppdateras. Försök igen.',
            ],

            'users' => [
                'already_confirmed'    => 'This user is already confirmed.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'cant_deactivate_self'  => 'Du har inte rättighet att utföra denna handling mot ditt eget konto.',
                'cant_delete_admin'  => 'You can not delete the super administrator.',
                'cant_delete_self'      => 'Du kan inte radera ditt eget konto.',
                'cant_delete_own_session' => 'You can not delete your own session.',
                'cant_restore'          => 'This user is not deleted so it can not be restored.',
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'create_error'          => 'Det uppstod ett fel då användaren skulle skapas. Försök igen.',
                'delete_error'          => 'Det uppstod ett fel då användaren skulle raderas. Försök igen.',
                'delete_first'          => 'This user must be deleted first before it can be destroyed permanently.',
                'email_error'           => 'Den e-post du angav finns redan angiven för en annan användare.',
                'mark_error'            => 'Det uppstod ett fel då användaren skulle uppdateras. Försök igen.',
                'not_confirmed'            => 'This user is not confirmed.',
                'not_found'             => 'Det finns inte någon sådan användare.',
                'restore_error'         => 'Det uppstod ett fel då användaren skulle återställas. Försök igen.',
                'role_needed_create'    => 'Du måste välja minst en roll.',
                'role_needed'           => 'Du måste välja minst en roll.',
                'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
                'social_delete_error' => 'There was a problem removing the social account from the user.',
                'update_error'          => 'Det uppstod ett fel då användaren skulle uppdateras. Försök igen.',
                'update_password_error' => 'Det uppstod ett fel då användarens lösenord skulle ändras. Försök igen.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Ditt konto är redan bekräftat och aktiverat.',
                'confirm'           => 'Bekräfta och aktivera ditt konto!',
                'created_confirm'   => 'Ditt konto är nu skapat. Vi har skickat ett mail till dig där du kan bekräfta och aktivera ditt konto.',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch'          => 'Din bekräftelsekod för aktivering stämmer inte.',
                'not_found'         => 'Din bekräftelsekod för aktivering stämmer inte.',
                'pending'            => 'Your account is currently pending approval.',
                'resend'            => 'Du måste bekräfta och aktivera ditt konto för att fortsätta. Bekräfta och aktivera ditt konto genom länken i mailet vi skickade till dig. <a href=":url">Klicka här</a> för att skicka mailet en gång till.',
                'success'           => 'Ditt konto har nu bekräftats och aktiverats.',
                'resent'            => 'Ett nytt mail med länk för bekräftelse och aktivering har nu skickats till den angivna e-posten.',
            ],

            'deactivated' => 'Ditt konto har inaktiverats.',
            'email_taken' => 'Det finns redan ett konto registrerat med den e-postadressen.',

            'password' => [
                'change_mismatch' => 'Det där var inte ditt gamla lösenord.',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
