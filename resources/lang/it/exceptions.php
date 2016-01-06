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
                'create_error' => 'Si è verificato un problema durante la creazione del permesso. Si prega di riprovare più tardi.',
                'delete_error' => "Si è verificato un problema durante l'eliminazione del permesso. Si prega di riprovare più tardi.",

                'groups' => [
                    'associated_permissions' => 'Non è possibile cancellare questo gruppo perché è associato a dei permessi.',
                    'has_children' => 'Non è possibile cancellare questo gruppo perché ha dei sottogruppi.',
                    'name_taken' => "Esiste già un gruppo con questo nome.",
                ],

                'not_found' => 'Questo permesso non esiste.',
                'system_delete_error' => 'Non è possibile eliminare un permesso di sistema.',
                'update_error' => "Si è verificato un problema durante l'aggiornamento del permesso. Si prega di riprovare più tardi.",
            ],

            'roles' => [
                'already_exists' => 'Questo ruolo esiste già. Si prega di scegliere un nome diverso.',
                'cant_delete_admin' => 'Non è possibile eliminare il ruolo di Amministratore.',
                'create_error' => 'Si è verificato un problema durante la creazione di questo ruolo. Si prega di riprovare più tardi.',
                'delete_error' => "Si è verificato un problema durante l'eliminazione di questo ruolo. Si prega di riprovare più tardi.",
                'has_users' => 'You can not delete a role with associated users.',
                'needs_permission' => 'You must select at least one permission for this role.',
                'not_found' => 'That role does not exist.',
                'update_error' => 'There was a problem updating this role. Please try again.',
            ],

            'users' => [
                'cant_deactivate_self' => 'You can not do that to yourself.',
                'cant_delete_self' => 'You can not delete yourself.',
                'create_error' => 'There was a problem creating this user. Please try again.',
                'delete_error' => 'There was a problem deleting this user. Please try again.',
                'email_error' => 'That email address belongs to a different user.',
                'mark_error' => 'There was a problem updating this user. Please try again.',
                'not_found' => 'That user does not exist.',
                'restore_error' => 'There was a problem restoring this user. Please try again.',
                'role_needed_create' => 'You must choose at lease one role. User has been created but deactivated.',
                'role_needed' => 'You must choose at least one role.',
                'update_error' => 'There was a problem updating this user. Please try again.',
                'update_password_error' => 'There was a problem changing this users password. Please try again.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Your account is already confirmed.',
                'confirm' => 'Confirm your account!',
                'created_confirm' => 'Your account was successfully created. We have sent you an e-mail to confirm your account.',
                'mismatch' => 'Your confirmation code does not match.',
                'not_found' => 'That confirmation code does not exist.',
                'resend' => 'Your account is not confirmed. Please click the confirmation link in your e-mail, or <a href="' . route('account.confirm.resend', ':token') . '">click here</a> to resend the confirmation e-mail.',
                'success' => 'Your account has been successfully confirmed!',
                'resent' => 'A new confirmation e-mail has been sent to the address on file.',
            ],

            'deactivated' => 'Your account has been deactivated.',
            'email_taken' => 'That e-mail address is already taken.',

            'password' => [
                'change_mismatch' => 'That is not your old password.',
            ],


        ],
    ],
];
