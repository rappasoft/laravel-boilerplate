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
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'  => "Un email de confirmation a été adressé à l'adresse indiquée",
            'confirmed'              => 'The user was successfully confirmed.',
            'created'             => 'Utilisateur créé avec succès.',
            'deleted'             => 'Utilisateur supprimé avec succès.',
            'deleted_permanently' => "L'utilisateur a été supprimé définitivement.",
            'restored'            => "L'utilisateur a été ré-activé.",
            'session_cleared'      => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => 'Utilisateur mis à jour avec succès.',
            'updated_password'    => 'Le mot de passe utilisateur a été mis à jour avec succès.',
        ],
    ],
];
