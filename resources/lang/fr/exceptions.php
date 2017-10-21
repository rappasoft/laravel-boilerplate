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
                'already_confirmed'    => 'Le compte de cet utilisateur est déjà confirmé.',
                'cant_confirm' => "Un problème est survenu lors de la confirmation du compte de l'utilisateur.",
                'cant_deactivate_self'  => "Vous ne pouvez pas désactiver votre propre compte d'utilisateur.",
                'cant_delete_admin'  => "Vous ne pouvez pas supprimer le compte d'utilisateur du super administrateur.",
                'cant_delete_self'      => "Vous ne pouvez pas supprimer votre propre compte d'utilisateur.",
                'cant_delete_own_session' => 'Vous ne pouvez pas supprimer votre propre session.',
                'cant_restore'          => "Cet utilisateur n'est pas effacé et ne peut être restauré.",
                'cant_unconfirm_admin' => "Vous ne pouvez pas infirmer le compte d'utilisateur du super administrateur.",
                'cant_unconfirm_self' => "Vous ne pouvez pas infirmer votre propre compte d'utilisateur.",
                'create_error'          => "Un problème est survenu lors de la création de l'utilisateur. Veuillez réessayer.",
                'delete_error'          => "Un problème est survenu lors de la suppression de l'utilisateur. Veuillez réessayer.",
                'delete_first'          => "Cet utilisateur doit d'abord être supprimé avant de pouvoir être supprimé de façon permanente.",
                'email_error'           => 'Cette adresse email appartient à un autre utilisateur.',
                'mark_error'            => "Un problème est survenu lors de la mise à jour de l'utilisateur. Veuillez réessayer.",
                'not_confirmed'         => "Le compte de cet utilisateur n'est pas confirmé.",
                'not_found'             => "Cet utilisateur n'existe pas.",
                'restore_error'         => "Un problème est survenu lors de la restauration de l'utilisateur. Veuillez réessayer.",
                'role_needed_create'    => 'Vous devez sélectionner au moins un rôle.',
                'role_needed'           => 'Vous devez sélectionner au moins un rôle.',
                'session_wrong_driver'  => 'Votre pilote de session doit être configuré avec une base de données pour utiliser cette fonctionalité.',
                'social_delete_error' => "Un problème est survenu lors de la suppression du compte de réseau social de l'utilisateur.",
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
                'created_pending'   => 'Votre compte a été créé avec succès et est en attente de validation. Un email vous sera envoyé quand votre compte sera validé.',
                'mismatch'          => 'Votre code de confirmation est invalide.',
                'not_found'         => "Votre code de confirmation n'existe pas.",
                'pending'            => 'Votre compte est actuellement en attente de validation.',
                'resend'            => 'Votre compte n\'est pas confirmé. Veuillez utiliser le lien qui vous a été envoyé par email, ou <a href="'.route('frontend.auth.account.confirm.resend', ':user_uuid').'">cliquez ici </a> pour recevoir un nouvel email.',
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
