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
                'already_exists' => '該角色已存在。請選擇其他名稱。 ',
                'cant_delete_admin' => '您無法刪除管理員角色。 ',
                'create_error' => '創建此角色時出現問題。請再試一次。 ',
                'delete_error' => '刪除此角色時出現問題。請再試一次。 ',
                'has_users' => '您無法刪除與關聯用戶的角色。 ',
                'needs_permission' => '您必須為此角色至少選擇一個權限。 ',
                'not_found' => '該角色不存在。 ',
                'update_error' => '更新此角色時出現問題。請再試一次。 ',
            ],

            'users' => [
                'already_confirmed'    => 'This user is already confirmed.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'cant_deactivate_self' => '你不能停用自己。 ',
                'cant_delete_self' => '你不能刪除自己。 ',
                'cant_restore' => '此用戶未刪除，因此無法恢復。 ',
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'create_error' => '創建此用戶時出現問題。請再試一次。 ',
                'delete_error' => '刪除此用戶時出現問題。請再試一次。 ',
                'delete_first' => '此用戶必須先刪除，才能永久銷毀。 ',
                'email_error' => '該電子郵件地址已被其它用戶使用。 ',
                'mark_error' => '更新此用戶時出現問題。請再試一次。 ',
                'not_confirmed'            => 'This user is not confirmed.',
                'not_found' => '該用戶不存在。 ',
                'restore_error' => '還原此用戶時出現問題。請再試一次。 ',
                'role_needed_create' => '你必須選擇至少一個角色。 ',
                'role_needed' => '您必須至少選擇一個角色。 ',
                'update_error' => '更新此用戶時出現問題。請再試一次。 ',
                'update_password_error' => '更改此用戶密碼時出現問題。請再試一次。 ',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => '您的帳戶已確認。 ',
                'confirm' => '確認您的帳戶！ ',
                'created_confirm' => '您的帳戶已成功創建。我們已向您發送電子郵件以確認您的帳戶。 ',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch' => '您的確認碼不匹配。 ',
                'not_found' => '該確認碼不存在。 ',
                'pending'            => 'Your account is currently pending approval.',
                'resend' => '您的帳戶未確認。請點擊您的電子郵件中的確認鏈接，或<a href=":url">點擊此處</a> 重新發送確認電子郵件。 ',
                'success' => '您的帳戶已成功確認！ ',
                'resent' => '新的確認電子郵件已發送到文件上的地址。 ',
            ],

            'deactivated' => '您的帳戶已被停用。 ',
            'email_taken' => '該電子郵件地址已被佔用。 ',

            'password' => [
                'change_mismatch' => '這不是你的舊密碼。 ',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => '注册目前已关闭。',
        ],
    ],
];
