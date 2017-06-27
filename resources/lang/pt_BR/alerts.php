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
    |--------------------------------------------------------------------------
    */

    'backend' => [
        'roles' => [
            'created' => 'O papel foi criado com sucesso.',
            'updated' => 'O papel foi atualizado com sucesso.',
            'deleted' => 'O papel foi excluído com sucesso.',
        ],

        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'  => 'Uma nova confirmação de e-mail será enviada.',
            'confirmed'              => 'The user was successfully confirmed.',
            'created'             => 'O usuário foi criado com sucesso.',
            'deleted'             => 'O usuário foi excluído com sucesso.',
            'deleted_permanently' => 'O usuário foi excluídodo permanentemente.',
            'restored'            => 'O usuário foi restaurado com sucesso.',
            'session_cleared'      => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => 'O usuário foi atualizado com sucesso.',
            'updated_password'    => 'A senha do usuário foi atualizada com sucesso.',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
