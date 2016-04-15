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
                'create_error' => 'Det uppstod ett fel då tillståndet skulle skapas. Försök igen.',
                'delete_error' => 'Det uppstod ett fel då tillståndet skulle raderas. Försök igen.',

                'groups' => [
                    'associated_permissions' => 'Du kan inte radera denna tillståndsgrupp eftersom den har överliggande tillstånd.',
                    'has_children' => 'Du kan inte radera denna tillståndsgrupp eftersom den har underliggande tillstånd.',
                    'name_taken' => 'Det finns redan en tillståndsgrupp skapad med samma namn. Välj ett annat namn.',
                ],

                'not_found' => 'Det tillståndet du försöker använda finns inte.',
                'system_delete_error' => 'Du kan inte radera ett tillstånd med system-status.',
                'update_error' => 'Det uppstod ett fel då tillståndet skulle uppdateras. Försök igen.',
            ],

            'roles' => [
                'already_exists' => 'Det finns redan en roll med detta namn. Välj ett annat namn.',
                'cant_delete_admin' => 'Du kan inte radera en administratörsroll.',
                'create_error' => 'Det uppstod ett fel då rollen skulle skapas. Försök igen.',
                'delete_error' => 'Det uppstod ett fel då rollen skulle raderas. Försök igen.',
                'has_users' => 'Du kan inte radera en roll som har tilldelade användare.',
                'needs_permission' => 'Du måste välja minst ett tillstånd för en roll.',
                'not_found' => 'Det finns inte en sådan roll i systemet.',
                'update_error' => 'Det uppstod ett fel då rollen skulle uppdateras. Försök igen.',
            ],

            'users' => [
                'cant_deactivate_self' => 'Du har inte rättighet att utföra denna handling mot ditt eget konto.',
                'cant_delete_self' => 'Du kan inte radera ditt eget konto.',
                'create_error' => 'Det uppstod ett fel då användaren skulle skapas. Försök igen.',
                'delete_error' => 'Det uppstod ett fel då användaren skulle raderas. Försök igen.',
                'email_error' => 'Den e-post du angav finns redan angiven för en annan användare.',
                'mark_error' => 'Det uppstod ett fel då användaren skulle uppdateras. Försök igen.',
                'not_found' => 'Det finns inte någon sådan användare.',
                'restore_error' => 'Det uppstod ett fel då användaren skulle återställas. Försök igen.',
                'role_needed_create' => 'Du måste välja minst en roll. Användaren har skapats men är inaktiverad.',
                'role_needed' => 'Du måste välja minst en roll.',
                'update_error' => 'Det uppstod ett fel då användaren skulle uppdateras. Försök igen.',
                'update_password_error' => 'Det uppstod ett fel då användarens lösenord skulle ändras. Försök igen.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Ditt konto är redan bekräftat och aktiverat.',
                'confirm' => 'Bekräfta och aktivera ditt konto!',
                'created_confirm' => 'Ditt konto är nu skapat. Vi har skickat ett mail till dig där du kan bekräfta och aktivera ditt konto.',
                'mismatch' => 'Din bekräftelsekod för aktivering stämmer inte.',
                'not_found' => 'Din bekräftelsekod för aktivering stämmer inte.',
                'resend' => 'Du måste bekräfta och aktivera ditt konto för att fortsätta. Bekräfta och aktivera ditt konto genom länken i mailet vi skickade till dig. <a href="' . route('account.confirm.resend', ':user_id') . '">Klicka här</a> för att skicka mailet en gång till.',
                'success' => 'Ditt konto har nu bekräftats och aktiverats.',
                'resent' => 'Ett nytt mail med länk för bekräftelse och aktivering har nu skickats till den angivna e-posten.',
            ],

            'deactivated' => 'Ditt konto har inaktiverats.',
            'email_taken' => 'Det finns redan ett konto registrerat med den e-postadressen.',

            'password' => [
                'change_mismatch' => 'Det där var inte ditt gamla lösenord.',
            ],


        ],
    ],
];
