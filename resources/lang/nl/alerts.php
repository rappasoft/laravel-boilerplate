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
            'created' => 'De rol is succesvol aangemaakt.',
            'deleted' => 'De rol is succesvol verwijderd.',
            'updated' => 'De rol is succesvol bijgewerkt.',
        ],

        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'  => 'Een nieuwe bevestigings e-mail is verzonden naar het aangegeven adres.',
            'confirmed'              => 'The user was successfully confirmed.',
            'created'             => 'De gebruiker is succesvol aangemaakt.',
            'deleted'             => 'De gebruiker is succesvol verwijderd.',
            'deleted_permanently' => 'De gebruiker is permanent verwijderd.',
            'restored'            => 'De gebruiker is met succes hersteld.',
            'session_cleared'      => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => 'De gebruiker is succesvol bijgewerkt.',
            'updated_password'    => 'Het wachtwoord van de gebruiker is succesvol bijgewerkt',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
