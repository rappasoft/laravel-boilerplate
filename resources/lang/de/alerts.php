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
            'created' => 'Rolle erstellt.',
            'deleted' => 'Rolle gelöscht.',
            'updated' => 'Rolle aktualisiert.',
        ],

        'users' => [
			'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'  => 'Eine Aktivierungsmail wurde an die angegebene E-Mailadresse gesendet.',
			'confirmed'			  => 'The user was successfully confirmed.',
            'created'             => 'Benutzer erstellt.',
            'deleted'             => 'Benutzer gelöscht.',
            'deleted_permanently' => 'Benutzer permanent gelöscht.',
            'restored'            => 'Benutzer wiederhergestellt.',
            'session_cleared'      => "The user's session was successfully cleared.",
			'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => 'Benutzer aktualisiert.',
            'updated_password'    => 'Kennwort des Benutzers aktualisiert.',
        ],
    ],
];
