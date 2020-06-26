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
        'copyright' => '版权',
        'custom' => '自定义',
        'actions' => '操作',
        'active' => '激活',
        'buttons' => [
            'save' => '保存',
            'update' => '更新',
        ],
        'hide' => '隐藏',
        'inactive' => '禁用',
        'none' => '空',
        'show' => '显示',
        'toggle_navigation' => '切换导航',
        'create_new' => '新建',
        'toolbar_btn_groups' => '带按钮组的工具栏',
        'more' => '更多',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => '新建角色',
                'edit' => '编辑角色',
                'management' => '角色管理',

                'table' => [
                    'number_of_users' => '用户数',
                    'permissions' => '权限',
                    'role' => '角色',
                    'sort' => '排序',
                    'total' => '角色总计',
                ],
            ],

            'users' => [
                'active' => '激活用户',
                'all_permissions' => '所有权限',
                'change_password' => '更改密码',
                'change_password_for' => '为 :user 更改密码',
                'create' => '新建用户',
                'deactivated' => '已停用的用户',
                'deleted' => '已删除的用户',
                'edit' => '编辑用户',
                'management' => '用户管理',
                'no_permissions' => '没有权限',
                'no_roles' => '没有角色可设置',
                'permissions' => '权限',
                'user_actions' => '用户操作',

                'table' => [
                    'confirmed' => '确认',
                    'created' => '创建',
                    'email' => '电子邮件',
                    'id' => 'ID',
                    'last_updated' => '最后更新',
                    'name' => '名称',
                    'first_name' => '名',
                    'last_name' => '姓',
                    'no_deactivated' => '没有停用的用户',
                    'no_deleted' => '没有删除的用户',
                    'other_permissions' => '其他权限',
                    'permissions' => '权限',
                    'abilities' => '能力',
                    'roles' => '角色',
                    'social' => '社交帐号',
                    'total' => '用户总计',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => '概述',
                        'history' => '历史',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => '头像',
                            'confirmed' => '已确认',
                            'created_at' => '创建于',
                            'deleted_at' => '删除于',
                            'email' => '电子邮件',
                            'last_login_at' => '最后登录时间',
                            'last_login_ip' => '最后登录IP',
                            'last_updated' => '最后更新',
                            'name' => '名称',
                            'first_name' => '名',
                            'last_name' => '姓',
                            'status' => '状态',
                            'timezone' => '时区',
                        ],
                    ],
                ],

                'view' => '查看用户',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'login_box_title' => '登录',
            'login_button' => '登录',
            'login_with' => '使用 :social_media 登录',
            'register_box_title' => '注册',
            'register_button' => '注册',
            'remember_me' => '记住我',
        ],

        'contact' => [
            'box_title' => '联系我们',
            'button' => '发送信息',
        ],

        'passwords' => [
            'expired_password_box_title' => '密码已过期。',
            'forgot_password' => '忘记密码了？',
            'reset_password_box_title' => '重置密码',
            'reset_password_button' => '重置密码',
            'update_password_button' => '更新密码',
            'send_password_reset_link_button' => '发送密码重置链接',
        ],

        'user' => [
            'passwords' => [
                'change' => '更改密码',
            ],

            'profile' => [
                'avatar' => '头像',
                'created_at' => '创建于',
                'edit_information' => '编辑信息',
                'email' => '电子邮件',
                'last_updated' => '最后更新',
                'name' => '名称',
                'first_name' => '名',
                'last_name' => '姓',
                'update_information' => '更新信息',
            ],
        ],
    ],
];
