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
                'delete_user_confirm'  => '您确定要永久删除此用户吗？引用此用户ID的应用程序中的任何地方都很可能是错误。继续自行承担风险。这不能被撤消。',
                'if_confirmed_off'     => '(已确认则无效)',
                'restore_user_confirm' => '将此用户恢复到其原始状态？',
            ],
        ],

        'dashboard' => [
            'title'   => '管理仪表板',
            'welcome' => '欢迎',
        ],

        'general' => [
            'all_rights_reserved' => '保留所有权利。',
            'are_you_sure'        => '你确定这样做吗？',
            'boilerplate_link'    => 'Laravel 5 Boilerplate',
            'continue'            => '继续',
            'member_since'        => '会员自',
            'minutes'             => ' 分钟',
            'search_placeholder'  => '搜索...',
            'timeout'             => '出于安全原因已自动注销，因为你没有操作超过 ',

            'see_all' => [
                'messages'      => '查看所有消息',
                'notifications' => '查看所有提醒',
                'tasks'         => '查看所有任务',
            ],

            'status' => [
                'online'  => '在线',
                'offline' => '离线',
            ],

            'you_have' => [
                'messages'      => '{0} 你没有消息|{1} 你有 1 条消息|[2,Inf] 你有 :number 条消息',
                'notifications' => '{0} 你没有提醒|{1} 你有 1 条提醒|[2,Inf] 你有 :number 条提醒',
                'tasks'         => '{0} 你没有任务|{1} 你有 1 个任务|[2,Inf] 你有 :number 个任务',
            ],
        ],

        'search' => [
            'empty'      => '请输入搜索关键词。',
            'incomplete' => '您必须为此系统编写您自己的搜索逻辑。',
            'title'      => '搜索结果',
            'results'    => '搜索 :query 的结果',
        ],

        'welcome' => '<p>This is the AdminLTE theme by <a href="https://almsaeedstudio.com/" target="_blank">https://almsaeedstudio.com/</a>. This is a stripped down version with only the necessary styles and scripts to get it running. Download the full version to start adding components to your dashboard.</p>
<p>All the functionality is for show with the exception of the <strong>Access Management</strong> to the left. This boilerplate comes with a fully functional access control library to manage users/roles/permissions.</p>
<p>Keep in mind it is a work in progress and their may be bugs or other issues I have not come across. I will do my best to fix them as I receive them.</p>
<p>Hope you enjoy all of the work I have put into this. Please visit the <a href="https://github.com/rappasoft/laravel-5-boilerplate" target="_blank">GitHub</a> page for more information and report any <a href="https://github.com/rappasoft/Laravel-5-Boilerplate/issues" target="_blank">issues here</a>.</p>
<p><strong>This project is very demanding to keep up with given the rate at which the master Laravel branch changes, so any help is appreciated.</strong></p>
<p>- Anthony Rappa</p>',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'Your account has been confirmed.',
            'error'                   => '哎呀！',
            'greeting'                => '你好！',
            'regards'                 => '问候,',
            'trouble_clicking_button' => '如果您在点击 ":action_text" 按钮时遇到问题, 请将以下网址复制并粘贴到您的网络浏览器中:',
            'thank_you_for_using_app' => '谢谢您使用我们的应用程序！',

            'password_reset_subject'    => '重置密码',
            'password_cause_of_email'   => '您收到此电子邮件是因为我们收到了您帐户的密码重设请求',
            'password_if_not_requested' => '如果您没有请求重置密码，则无需进一步操作',
            'reset_password'            => '点击这里重置密码',

            'click_to_confirm' => '点击此处确认您的帐户:',
        ],

        'contact' => [
            'email_body_title' => 'You have a new contact form request: Below are the details:',
            'subject' => 'A new :app_name contact form submission!',
        ],
    ],

    'frontend' => [
        'test' => '测试',

        'tests' => [
            'based_on' => [
                'permission' => '基于权限 - ',
                'role'       => '基于角色 - ',
            ],

            'js_injected_from_controller' => '从控制器注入的Javascript',

            'using_blade_extensions' => '使用Blade扩展',

            'using_access_helper' => [
                'array_permissions'     => 'Using Access Helper with Array of Permission Names or ID\'s where the user does have to possess all.',
                'array_permissions_not' => 'Using Access Helper with Array of Permission Names or ID\'s where the user does not have to possess all.',
                'array_roles'           => 'Using Access Helper with Array of Role Names or ID\'s where the user does have to possess all.',
                'array_roles_not'       => 'Using Access Helper with Array of Role Names or ID\'s where the user does not have to possess all.',
                'permission_id'         => 'Using Access Helper with Permission ID',
                'permission_name'       => 'Using Access Helper with Permission Name',
                'role_id'               => 'Using Access Helper with Role ID',
                'role_name'             => 'Using Access Helper with Role Name',
            ],

            'view_console_it_works'          => 'View console, you should see \'it works!\' which is coming from FrontendController@index',
            'you_can_see_because'            => 'You can see this because you have the role of \':role\'!',
            'you_can_see_because_permission' => 'You can see this because you have the permission of \':permission\'!',
        ],

        'general' => [
            'joined'        => 'Joined',
        ],

        'user' => [
            'change_email_notice' => 'If you change your e-mail you will be logged out until you confirm your new e-mail address.',
            'email_changed_notice' => 'You must confirm your new e-mail address before you can log in again.',
            'profile_updated'  => 'Profile successfully updated.',
            'password_updated' => 'Password successfully updated.',
        ],

        'welcome_to' => '欢迎来到 :place',
    ],
];
