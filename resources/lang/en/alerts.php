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
            'created' => 'Permission successfully created.',
            'deleted' => 'Permission successfully deleted.',

            'groups'  => [
                'created' => 'Permission group successfully created.',
                'deleted' => 'Permission group successfully deleted.',
                'updated' => 'Permission group successfully updated.',
            ],

            'updated' => 'Permission successfully updated.',
        ],

        'roles' => [
            'created' => 'The role was successfully created.',
            'deleted' => 'The role was successfully deleted.',
            'updated' => 'The role was successfully updated.',
        ],

        'users' => [
            'confirmation_email' => 'A new confirmation e-mail has been sent to the address on file.',
            'created' => 'The user was successfully created.',
            'deleted' => 'The user was successfully deleted.',
            'deleted_permanently' => 'The user was deleted permanently.',
            'restored' => 'The user was successfully restored.',
            'updated' => 'The user was successfully updated.',
            'updated_password' => "The user's password was successfully updated.",
        ]
    ],
];