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
            'created' => 'Ruolo creato con successo.',
            'deleted' => 'Ruolo cancellato con successo.',
            'updated' => 'Ruolo aggiornato con successo.',
        ],

        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email' => "Una nuova e-mail di conferma è stata inviata all'indirizzo registrato.",
            'confirmed' => 'The user was successfully confirmed.',
            'created' => "L'utente è stato creato con successo",
            'deleted' => "L'utente è stato eliminato con successo.",
            'deleted_permanently' => "L'utente è stato eliminato definitivamente.",
            'restored' => "L'utente è stato ripristinato con successo.",
            'session_cleared' => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated' => "L'utente è stato aggiornato con successo.",
            'updated_password' => "La password dell'utente è stata aggiornata con successo.",
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
