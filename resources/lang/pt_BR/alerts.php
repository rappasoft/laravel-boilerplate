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
            'cant_resend_confirmation' => 'A aplicação está configurada para aprovar usuários manualmente.',
            'confirmation_email'  => 'Uma nova confirmação de e-mail será enviada.',
            'confirmed'              => 'O usuário foi confirmado com sucesso.',
            'created'             => 'O usuário foi criado com sucesso.',
            'deleted'             => 'O usuário foi excluído com sucesso.',
            'deleted_permanently' => 'O usuário foi excluído permanentemente.',
            'restored'            => 'O usuário foi restaurado com sucesso.',
            'session_cleared'      => 'Sessão do usuário foi removida com sucesso.',
            'social_deleted' => 'Mídia Social removida com sucesso.',
            'unconfirmed' => 'Confirmação do usuário foi removida com sucesso.',
            'updated'             => 'O usuário foi atualizado com sucesso.',
            'updated_password'    => 'A senha do usuário foi atualizada com sucesso.',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
            'sent' => 'Suas informações foram enviadas com sucesso. Nós responderemos ao e-mail fornecido assim que possível.',
        ],
    ],
];
