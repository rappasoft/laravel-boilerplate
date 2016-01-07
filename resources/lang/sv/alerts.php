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
            'created' => 'Tillståndet har nu skapats.',
            'deleted' => 'Tillståndet har nu raderats.',

            'groups'  => [
                'created' => 'Tillståndsgruppen har nu skapats.',
                'deleted' => 'Tillståndsgruppen har nu raderats.',
                'updated' => 'Tillståndsgruppen har nu uppdaterats.',
            ],

            'updated' => 'Tillståndet har uppdaterats.',
        ],

        'roles' => [
            'created' => 'Rollen har nu skapats.',
            'deleted' => 'Rollen har nu raderats.',
            'updated' => 'Rollen har nu uppdaterats.',
        ],

        'users' => [
            'confirmation_email' => 'Ett nytt bekräftelsemail har nu skickats till den angivna e-postadressen.',
            'created' => 'Användaren har nu skapats.',
            'deleted' => 'Användaren har nu raderats.',
            'deleted_permanently' => 'Användaren har nu raderats permanent.',
            'restored' => 'Användaren har nu återställts.',
            'updated' => 'Användaren har nu uppdaterats.',
            'updated_password' => "Användarens lösenord har nu uppdaterats.",
        ]
    ],
];
