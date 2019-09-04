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
                'delete_user_confirm' => '您确定要永久删除此用户吗？引用此用户ID的应用程序中的任何地方都很可能是错误。继续自行承担风险。这不能被撤消。',
                'if_confirmed_off' => '(已确认则无效)',
                'restore_user_confirm' => '将此用户恢复到其原始状态？',
            ],
        ],

        'dashboard' => [
            'title' => '管理仪表板',
            'welcome' => '欢迎',
        ],

        'general' => [
            'all_rights_reserved' => '保留所有权利。',
            'are_you_sure' => '你确定这样做吗？',
            'boilerplate_link' => 'Laravel Boilerplate',
            'continue' => '继续',
            'member_since' => '会员自',
            'minutes' => ' 分钟',
            'search_placeholder' => '搜索...',
            'timeout' => '出于安全原因已自动注销，因为你没有操作超过 ',

            'see_all' => [
                'messages' => '查看所有消息',
                'notifications' => '查看所有提醒',
                'tasks' => '查看所有任务',
            ],

            'status' => [
                'online' => '在线',
                'offline' => '离线',
            ],

            'you_have' => [
                'messages' => '{0} 你没有消息|{1} 你有 1 条消息|[2,Inf] 你有 :number 条消息',
                'notifications' => '{0} 你没有提醒|{1} 你有 1 条提醒|[2,Inf] 你有 :number 条提醒',
                'tasks' => '{0} 你没有任务|{1} 你有 1 个任务|[2,Inf] 你有 :number 个任务',
            ],
        ],

        'search' => [
            'empty' => '请输入搜索关键词。',
            'incomplete' => '您必须为此系统编写您自己的搜索逻辑。',
            'title' => '搜索结果',
            'results' => '搜索 :query 的结果',
        ],

        'welcome' => 'Welcome to the Dashboard',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => '你的账户已经被确认',
            'error' => '哎呀！',
            'greeting' => '你好！',
            'regards' => '问候,',
            'trouble_clicking_button' => '如果您在点击 ":action_text" 按钮时遇到问题, 请将以下网址复制并粘贴到您的网络浏览器中:',
            'thank_you_for_using_app' => '谢谢您使用我们的应用程序！',

            'password_reset_subject' => '重置密码',
            'password_cause_of_email' => '您收到此电子邮件是因为我们收到了您帐户的密码重设请求',
            'password_if_not_requested' => '如果您没有请求重置密码，则无需进一步操作',
            'reset_password' => '点击这里重置密码',

            'click_to_confirm' => '点击此处确认您的帐户:',
        ],

        'contact' => [
            'email_body_title' => '你有一个新的联系请求， 详情如下：',
            'subject' => '一个新提交的 :app_name 联系请求',
        ],
    ],

    'frontend' => [
        'test' => '测试',

        'tests' => [
            'based_on' => [
                'permission' => '基于权限 - ',
                'role' => '基于角色 - ',
            ],

            'js_injected_from_controller' => '从控制器注入的Javascript',

            'using_blade_extensions' => '使用Blade扩展',

            'using_access_helper' => [
                'array_permissions' => '访问控制-用户拥有的权限Name或权限ID数组必须完全匹配.',
                'array_permissions_not' => '访问控制-用户拥有的权限Name或权限ID数组不必完全匹配',
                'array_roles' => '访问控制-用户拥有的角色Name或角色ID数组必须完全匹配',
                'array_roles_not' => '访问控制-用户拥有的角色Name或角色ID数组不必完全匹配',
                'permission_id' => '访问控制-用户拥有指定权限ID',
                'permission_name' => '访问控制-用户拥有指定权限Name',
                'role_id' => '访问控制-用户拥有指定角色ID',
                'role_name' => '访问控制-用户拥有指定角色Name',
            ],

            'view_console_it_works' => '检查 console, 你应该看到来自 FrontendController@index 的 \'it works!\' ',
            'you_can_see_because' => '看到这条信息是因为你拥有角色 \':role\'!',
            'you_can_see_because_permission' => '看条这条信息是因为你拥有权限 \':permission\'!',
        ],

        'general' => [
            'joined' => '加入',
        ],

        'user' => [
            'change_email_notice' => '如果你更改你的邮件地址，你会被登出系统直到你确认你的新邮件地址。',
            'email_changed_notice' => '在登录之前，你必须确认你的新邮件地址。',
            'profile_updated' => '个人资料更新成功。',
            'password_updated' => '密码修改成功。',
        ],

        'welcome_to' => '欢迎来到 :place',
    ],
];
