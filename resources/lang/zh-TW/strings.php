<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Strings Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in strings throughout the system.
    | Regardless where it is placed, a string can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'users' => [
                'delete_user_confirm' => '您確定要永久刪除此用戶嗎？引用此用戶ID的應用程序中的任何地方都很可能是錯誤。繼續自行承擔風險。這不能被撤消。 ',
                'if_confirmed_off' => '(確認關閉)',
                'restore_user_confirm' => '將此用戶恢復到其原始狀態？ ',
            ],
        ],

        'dashboard' => [
            'title' => '管理儀表板',
            'welcome' => '歡迎',
        ],

        'general' => [
            'all_rights_reserved' => '保留所有權利。 ',
            'are_you_sure' => '你確定嗎？ ',
            'boilerplate_link' => 'Laravel Boilerplate',
            'continue' => '繼續',
            'member_since' => '會員自',
            'minutes' => ' 分鐘',
            'search_placeholder' => '搜索...',
            'timeout' => '您因為沒有活動而被自動註銷為了安全原因',

            'see_all' => [
                'messages' => '查看所有郵件',
                'notifications' => '查看全部',
                'tasks' => '查看所有任務',
            ],

            'status' => [
                'online' => '在線',
                'offline' => '離線',
            ],

            'you_have' => [
                'messages' => '{0} 您沒有消息|{1} 您有1個消息|[2,Inf] 您有 :number 個消息',
                'notifications' => '{0} 您沒有通知|{1} 您有1個通知|[2,Inf] 您有 :number 個通知',
                'tasks' => '{0} 你沒有任務|{1} 你有1個任務|[2,Inf] 你有 :number 個任務',
            ],
        ],

        'search' => [
            'empty' => '請輸入搜索字詞。 ',
            'incomplete' => '您必須為此系統編寫您自己的搜索邏輯。 ',
            'title' => '搜索結果',
            'results' => '搜索結果 :query',
        ],

        'welcome' => 'Welcome to the Dashboard',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'Your account has been confirmed.',
            'error' => 'Whoops!',
            'greeting' => '你好!',
            'regards' => '問候,',
            'trouble_clicking_button' => '如果您在點擊 ":action_text" 按鈕時遇到問題, 請將以下網址複製並粘貼到您的網絡瀏覽器中:',
            'thank_you_for_using_app' => '謝謝您使用我們的應用程序！ ',

            'password_reset_subject' => '重置密碼',
            'password_cause_of_email' => '您收到此電子郵件是因為我們收到了您帳戶的密碼重設要求',
            'password_if_not_requested' => '如果您沒有請求重置密碼，則無需進一步操作',
            'reset_password' => '點擊這裡重置密碼',

            'click_to_confirm' => '點擊此處確認您的帳戶:',
        ],

        'contact' => [
            'email_body_title' => 'You have a new contact form request: Below are the details:',
            'subject' => 'A new :app_name contact form submission!',
        ],
    ],

    'frontend' => [
        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'Permission Based - ',
                'role' => 'Role Based - ',
            ],

            'js_injected_from_controller' => 'Javascript Injected from a Controller',

            'using_blade_extensions' => 'Using Blade Extensions',

            'using_access_helper' => [
                'array_permissions' => 'Using Access Helper with Array of Permission Names or ID\'s where the user does have to possess all.',
                'array_permissions_not' => 'Using Access Helper with Array of Permission Names or ID\'s where the user does not have to possess all.',
                'array_roles' => 'Using Access Helper with Array of Role Names or ID\'s where the user does have to possess all.',
                'array_roles_not' => 'Using Access Helper with Array of Role Names or ID\'s where the user does not have to possess all.',
                'permission_id' => 'Using Access Helper with Permission ID',
                'permission_name' => 'Using Access Helper with Permission Name',
                'role_id' => 'Using Access Helper with Role ID',
                'role_name' => 'Using Access Helper with Role Name',
            ],

            'view_console_it_works' => 'View console, you should see \'it works!\' which is coming from FrontendController@index',
            'you_can_see_because' => 'You can see this because you have the role of \':role\'!',
            'you_can_see_because_permission' => 'You can see this because you have the permission of \':permission\'!',
        ],

        'general' => [
            'joined' => 'Joined',
        ],

        'user' => [
            'change_email_notice' => 'If you change your e-mail you will be logged out until you confirm your new e-mail address.',
            'email_changed_notice' => 'You must confirm your new e-mail address before you can log in again.',
            'profile_updated' => 'Profile successfully updated.',
            'password_updated' => 'Password successfully updated.',
        ],

        'welcome_to' => 'Welcome to :place',
    ],
];
