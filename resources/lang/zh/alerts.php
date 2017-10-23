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
            'cant_resend_confirmation' => '系统已经设置为手动审核用户模式。',
            'confirmation_email'  => '新的确认电子邮件已发送到文件上的地址。',
            'confirmed'              => '用户已成功确认。',
            'created'             => '用户已成功创建。',
            'deleted'             => '用户已成功删除。',
            'deleted_permanently' => '用户被永久删除。',
            'restored'            => '用户已成功还原。',
            'session_cleared'     => '用户会话已成功清除。',
            'social_deleted' => '成功移除社交账号。',
            'unconfirmed' => '用户已被取消确认。',
            'updated'             => '用户已成功更新。',
            'updated_password'    => '用户密码已成功更新。',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => '您的信息已经成功提交！ 我们会尽快回复到您提供的电子邮箱。',
        ],
    ],
];
