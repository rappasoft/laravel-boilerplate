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
        'permissions' => [
            'created' => 'Permission créée avec succès.',
            'deleted' => 'Permission successfully supprimée avec succès.',

            'groups'  => [
                'created' => 'Groupe de permissions créé avec succès.',
                'deleted' => 'Groupe de permissions supprimé avec succès.',
                'updated' => 'Groupe de permissions mis à jour avec succès.',
            ],

            'updated' => 'Permission mise à jour avec succès.',
        ],

        'roles' => [
            'created' => 'Le rôle a été créé avec succès.',
            'deleted' => 'Le rôle a été supprimé avec succès.',
            'updated' => 'Le rôle a été mis à jour avec succès.',
        ],

        'users' => [
            'confirmation_email' => "Un e-mail de confirmation a été adressé à l'adresse indiquée",
            'created' => "L'utilisateur a été créé avec succès.",
            'deleted' => "L'utilisateur a été supprimé avec succès.",
            'deleted_permanently' => "L'utilisateur a été supprimé définitivement.",
            'restored' => "L'utilisateur a été ré-activé.",
            'updated' => "L'utilisateur a été mis à jour avec succès.",
            'updated_password' => "Le mot de passe utilisateur a été mis à jour avec succès.",
        ]
    ],
];