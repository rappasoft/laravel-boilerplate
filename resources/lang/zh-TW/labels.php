<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => 'All',
        'yes' => 'Yes',
        'no' => 'No',
        'custom' => 'Custom',
        'actions' => '行動',
        'buttons' => [
            'save' => '儲存',
            'update' => '更新',
        ],
        'hide' => '隱藏',
        'none' => 'None',
        'show' => '顯示',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'permissions' => [
                'create' => 'Create Permission',
                'dependencies' => 'Dependencies',
                'edit' => 'Edit Permission',

                'groups' => [
                    'create' => 'Create Group',
                    'edit' => 'Edit Group',

                    'table' => [
                        'name' => 'Name',
                    ],
                ],

                'grouped_permissions' => 'Grouped Permissions',
                'label' => 'permissions',
                'management' => 'Permission Management',
                'no_groups' => 'There are no permission groups.',
                'no_permissions' => 'No permission to choose from.',
                'no_roles' => 'No Roles to set',
                'no_ungrouped' => 'There are no ungrouped permissions.',

                'table' => [
                    'dependencies' => 'Dependencies',
                    'group' => 'Group',
                    'group-sort' => 'Group Sort',
                    'name' => 'Name',
                    'permission' => 'Permission',
                    'roles' => 'Roles',
                    'system' => 'System',
                    'total' => 'permission total|permissions total',
                    'users' => 'Users',
                ],

                'tabs' => [
                    'general' => 'General',
                    'groups' => 'All Groups',
                    'dependencies' => 'Dependencies',
                    'permissions' => 'All Permissions',
                ],

                'ungrouped_permissions' => 'Ungrouped Permissions',
            ],

            'roles' => [
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions' => 'Permissions',
                    'role' => 'Role',
                    'sort' => 'Sort',
                    'total' => 'role total|roles total',
                ],
            ],

            'users' => [
                'active' => '啟用帳戶',
                'all_permissions' => '所有權限',
                'change_password' => '變更密碼',
                'change_password_for' => 'Change Password for :user',
                'create' => 'Create User',
                'deactivated' => '停用帳戶',
                'deleted' => '啟用帳戶',
                'dependencies' => 'Dependencies',
                'edit' => '編輯使用者',
                'management' => '使用者管理',
                'no_other_permissions' => 'No Other Permissions',
                'no_permissions' => 'No Permissions',
                'no_roles' => 'No Roles to set.',
                'permissions' => 'Permissions',
                'permission_check' => 'Checking a permission will also check its dependencies, if any.',

                'table' => [
                    'confirmed' => '確認',
                    'created' => '建立日期',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => '最後更新',
                    'name' => '姓名',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted' => 'No Deleted Users',
                    'other_permissions' => '其他權限',
                    'roles' => '角色',
                    'total' => '位使用者',
//                    'total' => 'user total|users total',
                ],
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => '登入',
            'login_button' => '登入',
            'login_with' => 'Login with :social_media',
            'register_box_title' => '註冊',
            'register_button' => '註冊',
            'remember_me' => '記住我',
            'start' => '所有的工作從登入開始',
        ],

        'passwords' => [
            'forgot_password' => '忘記密碼?',
            'reset_password_box_title' => '重設密碼',
            'reset_password_button' => '重設密碼',
            'send_password_reset_link_button' => '傳送密碼重設連結',
        ],

        'macros' => [
            'country' => [
                'alpha' => 'Country Alpha Codes',
                'alpha2' => 'Country Alpha 2 Codes',
                'alpha3' => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us' => [
                    'us' => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed' => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => '時區',
        ],

        'user' => [
            'passwords' => [
                'change' => '變更密碼',
            ],

            'profile' => [
                'avatar' => '頭像',
                'created_at' => '建立於',
                'edit_information' => '編輯資訊',
                'email' => 'E-mail',
                'last_updated' => '最後修改',
                'name' => '名字',
                'update_information' => '更新資訊',
            ],
        ],

    ],
];
