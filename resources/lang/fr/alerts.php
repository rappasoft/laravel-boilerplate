<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'roles' => [
            'created' => 'Rôle créé avec succès.',
            'deleted' => 'Rôle supprimé avec succès.',
            'updated' => 'Rôle mis à jour avec succès.',
        ],

        'users' => [
            'cant_resend_confirmation' => "L'application est actuellement paramétrée avec une validation manuelle des utilisateurs.",
            'confirmation_email'  => "Un email de confirmation a été adressé à l'adresse indiquée.",
            'confirmed'              => "Le compte de l'utilisateur a été confirmé avec succès.",
            'created'             => 'Utilisateur créé avec succès.',
            'deleted'             => 'Utilisateur supprimé avec succès.',
            'deleted_permanently' => "L'utilisateur a été supprimé définitivement.",
            'restored'            => "L'utilisateur a été ré-activé.",
            'session_cleared'      => "La session de l'utilisateur a été effacé avec succès.",
            'social_deleted' => 'Le compte de réseau social a été effacé avec succès.',
            'unconfirmed' => "Le compte de l'utilisateur a été infirmé avec succès.",
            'updated'             => 'Utilisateur mis à jour avec succès.',
            'updated_password'    => 'Le mot de passe utilisateur a été mis à jour avec succès.',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => "Votre message a été envoyé avec succès. Nous répondrons à l'adresse email que vous nous avez fourni dès que nous le pourrons.",
        ],
    ],
];
