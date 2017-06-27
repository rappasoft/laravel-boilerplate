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
            'created' => 'Rollen har nu skapats.',
            'deleted' => 'Rollen har nu raderats.',
            'updated' => 'Rollen har nu uppdaterats.',
        ],

        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'  => 'Ett nytt bekräftelsemail har nu skickats till den angivna e-postadressen.',
            'confirmed'              => 'The user was successfully confirmed.',
            'created'             => 'Användaren har nu skapats.',
            'deleted'             => 'Användaren har nu raderats.',
            'deleted_permanently' => 'Användaren har nu raderats permanent.',
            'restored'            => 'Användaren har nu återställts.',
            'session_cleared'      => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => 'Användaren har nu uppdaterats.',
            'updated_password'    => 'Användarens lösenord har nu uppdaterats.',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
