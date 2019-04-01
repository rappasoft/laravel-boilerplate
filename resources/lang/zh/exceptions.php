<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'roles' => [
                'already_exists' => '该角色已存在。请选择其他名称。',
                'cant_delete_admin' => '您无法删除管理员角色。',
                'create_error' => '创建此角色时出现问题。请再试一次。',
                'delete_error' => '删除此角色时出现问题。请再试一次。',
                'has_users' => '您无法删除已关联用户的角色。',
                'needs_permission' => '您必须为此角色至少选择一个权限。',
                'not_found' => '该角色不存在。',
                'update_error' => '更新此角色时出现问题。请再试一次。',
            ],

            'users' => [
                'already_confirmed' => '用户已经确认过了。',
                'cant_confirm' => '确认用户过程中出现问题。',
                'cant_deactivate_self' => '你不能停用自己。',
                'cant_delete_admin' => '你不能删除超级管理员。',
                'cant_delete_self' => '你不能删除自己',
                'cant_delete_own_session' => '你不能删除自己的会话',
                'cant_restore' => '此用户未删除，因此无法恢复。',
                'cant_unconfirm_admin' => '你不能取消超级用户的确认。',
                'cant_unconfirm_self' => '你不能取消自己的确认。',
                'create_error' => '创建此用户时出现问题。请再试一次。',
                'delete_error' => '删除此用户时出现问题。请再试一次。',
                'delete_first' => '此用户必须先删除，才能永久销毁。',
                'email_error' => '该电子邮件地址已被其它用户使用。',
                'mark_error' => '更新此用户时出现问题。请再试一次。',
                'not_confirmed' => '用户未确认。',
                'not_found' => '该用户不存在。',
                'restore_error' => '还原此用户时出现问题。请再试一次。',
                'role_needed_create' => '你必须选择至少一个角色。',
                'role_needed' => '你必须选择至少一个角色。',
                'social_delete_error' => '删除社交网络用户时出现问题。',
                'update_error' => '更新此用户时出现问题。请再试一次。',
                'update_password_error' => '更改此用户密码时出现问题。请再试一次。',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => '您的帐户已确认。',
                'confirm' => '确认您的帐户！',
                'created_confirm' => '您的帐户已成功创建。我们已向您发送电子邮件以确认您的帐户。',
                'created_pending' => '你的账户已经成功创建，并等待处理。 账户成功处理后会发送电子邮件确认。',
                'mismatch' => '您的确认码不匹配。',
                'not_found' => '该确认码不存在。',
                'pending' => '您的账户正在等待处理',
                'resend' => '您的帐户未确认。请点击您的电子邮件中的确认链接，或 <a href=":url">点击此处</a> 重新发送确认电子邮件。',
                'success' => '您的帐户已成功确认！',
                'resent' => '新的确认电子邮件已发送到文件上的地址。',
            ],

            'deactivated' => '您的帐户已被停用。',
            'email_taken' => '该电子邮件地址已被占用。',

            'password' => [
                'change_mismatch' => '这不是你的旧密码。',
                'reset_problem' => '重置密码过程中出现错误。请重新发送密码重置邮件。',
            ],

            'registration_disabled' => '注册目前已关闭。',
        ],
    ],
];
