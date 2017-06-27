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
            'created' => 'Rol creado satisfactoriamente.',
            'deleted' => 'Rol eliminado satisfactoriamente.',
            'updated' => 'Rol actualizado satisfactoriamente.',
        ],

        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'  => 'Un nuevo mensaje de confirmación ha sido enviado a tu correo.',
            'confirmed'              => 'The user was successfully confirmed.',
            'created'             => 'Usuario creado satisfactoriamente.',
            'deleted'             => 'Usuario eliminado satisfactoriamente.',
            'deleted_permanently' => 'Usuario eliminado de forma permanente.',
            'restored'            => 'Usuario restaurado satisfactoriamente.',
            'session_cleared'      => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => 'Usuario actualizado satisfactoriamente.',
            'updated_password'    => 'Contraseña actualizada satisfactoriamente.',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
