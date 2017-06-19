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
                'already_exists'    => 'Un rôle portant ce nom existe déjà.',
                'cant_delete_admin' => 'Le rôle Administrator ne peut être supprimé.',
                'create_error'      => 'Un problème est survenu lors de la création du rôle. Veuillez réessayer.',
                'delete_error'      => 'Un problème est survenu lors de la suppression du rôle. Veuillez réessayer.',
                'has_users'         => 'Ce rôle est associé à des utilisateurs et ne peut être supprimé.',
                'needs_permission'  => 'Vous devez sélectionner au moins une permission pour ce rôle.',
                'not_found'         => "Ce rôle n'existe pas.",
                'update_error'      => 'Un problème est survenu lors de la mise à jour du rôle. Veuillez réessayer.',
            ],

            'users' => [
                'already_confirmed'    => 'This user is already confirmed.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'cant_deactivate_self'  => 'Vous ne pouvez pas vous désactiver vous-même.',
                'cant_delete_admin'  => 'You can not delete the super administrator.',
                'cant_delete_self'      => 'Vous ne pouvez pas vous supprimer vous-même.',
                'cant_delete_own_session' => 'You can not delete your own session.',
                'cant_restore'          => "Cet utilisateur n'est pas effacé et ne peut être restauré.",
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'create_error'          => "Un problème est survenu lors de la création de l'utilisateur. Veuillez réessayer.",
                'delete_error'          => "Un problème est survenu lors de la suppression de l'utilisateur. Veuillez réessayer.",
                'delete_first'          => "Cet utilisateur doit d'abord être supprimé avant de pouvoir être supprimé de façon permanente.",
                'email_error'           => 'Cette adresse email appartient à un autre utilisateur.',
                'mark_error'            => "Un problème est survenu lors de la mise à jour de l'utilisateur. Veuillez réessayer.",
                'not_confirmed'            => 'This user is not confirmed.',
                'not_found'             => "Cet utilisateur n'existe pas.",
                'restore_error'         => "Un problème est survenu lors de la restauration de l'utilisateur. Veuillez réessayer.",
                'role_needed_create'    => 'Vous devez sélectionner au moins un rôle.',
                'role_needed'           => 'Vous devez sélectionner au moins un rôle.',
                'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
                'update_error'          => "Un problème est survenu lors de la mise à jour de l'utilisateur. Veuillez réessayer.",
                'update_password_error' => "Un problème est survenu lors du changement du mot de passe de l'utilisateur. Veuillez réessayer.",
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Votre compte est déjà confirmé.',
                'confirm'           => 'Confirmez votre compte !',
                'created_confirm'   => 'Votre compte a été créé avec succès.  Un email de confirmation vous a été envoyé.',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch'          => 'Votre code de confirmation est invalide.',
                'not_found'         => "Votre code de confirmation n'existe pas.",
                'pending'            => 'Your account is currently pending approval.',
                'resend'            => 'Votre compte n\'est pas confirmé. Veuillez utiliser le lien qui vous a été envoyé par email, ou <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">cliquez ici </a> pour recevoir un nouvel email.',
                'success'           => 'Votre compte est maintenant confirmé !',
                'resent'            => "Un nouvel email a été envoyé à l'adresse enregistrée.",
            ],

            'deactivated' => 'Votre compte a été désactivé.',
            'email_taken' => 'Cet email est déjà utilisé par un compte existant.',

            'password' => [
                'change_mismatch' => "L'ancien mot de passe est incorrect.",
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
