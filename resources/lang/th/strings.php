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
            'permissions' => [
                'edit_explanation' => 'If you performed operations in the hierarchy section without refreshing this page, you will need to refresh to reflect the changes here.',

                'groups' => [
                    'hierarchy_saved' => 'Hierarchy successfully saved.',
                ],

                'sort_explanation' => 'This section allows you to organize your permissions into groups to stay organized. Regardless of the group, the permissions are still individually assigned to each role.',
            ],

            'users' => [
                'delete_user_confirm' => 'Are you sure you want to delete this user permanently? Anywhere in the application that references this user\'s id will most likely error. Proceed at your own risk. This can not be un-done.',
                'if_confirmed_off' => '(If confirmed is off)',
                'restore_user_confirm' => 'Restore this user to its original state?',
            ],
        ],

        'dashboard' => [
            'title' => 'Administrative Dashboard',
            'welcome' => 'ยินดีต้อนรับ',
        ],

        'general' => [
            'all_rights_reserved' => 'All Rights Reserved.',
            'are_you_sure' => 'คุณแน่ใจหรือไใม่?',
            'boilerplate_link' => 'Laravel 5 Boilerplate',
            'continue' => 'ดำเนินการต่อ',
            'member_since' => 'เป็นสมาชิกตั้งแต่',
            'search_placeholder' => 'ค้นหา...',

            'see_all' => [
                'messages' => 'ดูข้อความทั้งหมด',
                'notifications' => 'ดูทั้งหมด',
                'tasks' => 'ดูงานทั้งหมด',
            ],

            'status' => [
                'online' => 'กำลังใช้งาน',
                'offline' => 'Offline',
            ],

            'you_have' => [
                'messages' => '{0} คุณไม่มีข้อความใหม่|{1} คุณมีหนึ่งข้อความใหม่|[2,Inf] คุณมี :number ข้อความใหม่',
                'notifications' => '{0} คุณไม่มีข้อความแจ้งเตือนใหม่|{1} คุณมีหนึ่งข้อความแจ้งเตือนใหม่|[2,Inf] คุณมี :number ข้อความแจ้งเตือนใหม่',
                'tasks' => '{0} คุณไม่มีงานใหม่|{1} คุณมีหนึ่งงานใหม่|[2,Inf] คุณมี :number งานใหม่',
            ],
        ],
    ],

    'emails' => [
        'auth' => [
            'password_reset_subject' => 'Your Password Reset Link',
            'reset_password' => 'คลิกที่นี่เพื่อกำหนดรหัสผ่านใหม่',
        ],
    ],

    'frontend' => [
        'email' => [
            'confirm_account' => 'คลิกที่นี่เพื่อยืนยันบัญชีของคุณ:',
        ],

        'test' => 'ทดสอบ',

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

        'user' => [
            'profile_updated' => 'Profile successfully updated.',
            'password_updated' => 'Password successfully updated.',
        ],

        'welcome_to' => 'ยินดีต้อนรับสู่ :place',
    ],
];