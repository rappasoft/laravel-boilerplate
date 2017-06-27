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
        'all' => '全部',
        'yes' => '是',
        'no' => '否',
        'custom' => '自定義',
        'actions' => '動作',
        'active' => '活動',
        'buttons' => [
            'save' => '保存',
            'update' => '更新',
        ],
        'hide' => '隱藏',
        'inactive' => '非活動',
        'none' => '無',
        'show' => '顯示',
        'toggle_navigation' => '切換導航',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => '創建角色',
                'edit' => '編輯角色',
                'management' => '角色管理',

                'table' => [
                    'number_of_users' => '用戶數',
                    'permissions' => '權限',
                    'role' => '角色',
                    'sort' => '排序',
                    'total' => '角色總數|角色總數',
                ],
            ],

            'users' => [
                'active' => '活動用戶',
                'all_permissions' => '所有權限',
                'change_password' => '更改密碼',
                'change_password_for' => '更改密碼 :user',
                'create' => '已刪除的用戶',
                'deactivated' => '已停用的用戶',
                'deleted' => '已刪除的用戶',
                'edit' => '編輯用戶',
                'management' => '用戶管理',
                'no_permissions' => '無權限',
                'no_roles' => '無角色',
                'permissions' => '權限',

                'table' => [
                    'confirmed' => '確認',
                    'created' => '創建',
                    'email' => '電子郵件',
                    'id' => 'ID',
                    'last_updated' => '最後更新',
                    'name' => '名稱',
                    'no_deactivated' => '沒有停用的用戶',
                    'no_deleted' => '未刪除用戶',
                    'roles' => '角色',
                    'social' => 'Social',
                    'total' => '用戶總計|用戶總計',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => '概述',
                        'history' => '歷史',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => '頭像',
                            'confirmed' => '已確認',
                            'created_at' => '創建於',
                            'deleted_at' => '已刪除',
                            'email' => '電子郵件',
                            'last_updated' => '最後更新',
                            'name' => '名稱',
                            'status' => '狀態',
                        ],
                    ],
                ],

                'view' => '查看用戶',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => '登錄',
            'login_button' => '登錄',
            'login_with' => '使用 :social_media 登錄',
            'register_box_title' => '註冊',
            'register_button' => '註冊',
            'remember_me' => '記住我',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'forgot_password' => '忘記密碼？ ',
            'reset_password_box_title' => '重置密碼',
            'reset_password_button' => '重置密碼',
            'send_password_reset_link_button' => '發送密碼重置鏈接',
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

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => '更改密碼',
            ],

            'profile' => [
                'avatar' => '頭像',
                'created_at' => '創建於',
                'edit_information' => '編輯信息',
                'email' => '電子郵件',
                'last_updated' => '最後更新',
                'name' => '名稱',
                'update_information' => '更新信息',
            ],
        ],

    ],
];
