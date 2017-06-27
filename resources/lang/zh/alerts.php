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
            'created' => '角色已成功创建。',
            'deleted' => '角色已成功删除。',
            'updated' => '角色已成功更新。',
        ],

        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'  => '新的确认电子邮件已发送到文件上的地址。',
            'confirmed'              => 'The user was successfully confirmed.',
            'created'             => '用户已成功创建。',
            'deleted'             => '用户已成功删除。',
            'deleted_permanently' => '用户被永久删除。',
            'restored'            => '用户已成功还原。',
            'session_cleared'     => '用户会话已成功清除。',
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => '用户已成功更新。',
            'updated_password'    => '用户密码已成功更新。',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
