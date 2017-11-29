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
            'cant_resend_confirmation' => 'La aplicación esta actualmente configurada para aprobación manual de usuarios.',
            'confirmation_email'  => 'Un nuevo mensaje de confirmación ha sido enviado a tu correo.',
            'confirmed'              => 'El usuario fue confirmado exitosamente.',
            'created'             => 'Usuario creado satisfactoriamente.',
            'deleted'             => 'Usuario eliminado satisfactoriamente.',
            'deleted_permanently' => 'Usuario eliminado de forma permanente.',
            'restored'            => 'Usuario restaurado satisfactoriamente.',
            'session_cleared'     => 'La sesión del usuario se borró exitosamente.',
            'social_deleted' => 'Cuenta social removida exitosamente.',
            'unconfirmed' => 'El usuario fue desconfirmado exitosamente',
            'updated'             => 'Usuario actualizado satisfactoriamente.',
            'updated_password'    => 'Contraseña actualizada satisfactoriamente.',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Tu información fue enviada exitosamente. Responderemos tan pronto sea posible al e-mail que proporcionaste.',
        ],
    ],
];
