<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => '权限管理',

            'roles' => [
                'all' => '所有角色',
                'create' => '新建角色',
                'edit' => '编辑角色',
                'management' => '角色管理',
                'main' => '角色',
            ],

            'users' => [
                'all' => '所有用户',
                'change-password' => '更改密码',
                'create' => '新建用户',
                'deactivated' => '未激活的用户',
                'deleted' => '已删除的用户',
                'edit' => '编辑用户',
                'main' => '用户',
                'view' => '查看用户',
            ],
        ],

        'log-viewer' => [
            'main' => '日志查看器',
            'dashboard' => '指示板',
            'logs' => '日志',
        ],

        'sidebar' => [
            'dashboard' => '指示板',
            'general' => '常规',
            'history' => 'History',
            'system' => '系统',
        ],
    ],

    'language-picker' => [
        'language' => '语言',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => '阿拉伯语（Arabic）',
            'az' => 'Azerbaijan',
            'zh' => '中文-简体（Chinese Simplified）',
            'zh-TW' => '中文-繁体（Chinese Traditional）',
            'da' => '丹麦语（Danish）',
            'de' => '德语（German）',
            'el' => '希腊语（Greek）',
            'en' => '英语（English）',
            'es' => '西班牙语（Spanish）',
            'fa' => '波斯语 (Persian)',
            'fr' => '法语（French）',
            'he' => '希伯来语 (Hebrew)',
            'id' => '印度尼西亚语（Indonesian）',
            'it' => '意大利语（Italian）',
            'ja' => '日语（Japanese）',
            'nl' => '荷兰语（Dutch）',
            'pt_BR' => '巴西葡萄牙语（Brazilian Portuguese）',
            'ru' => '俄语（Russian）',
            'sv' => '瑞典语（Swedish）',
            'th' => '泰语（Thai）',
            'tr' => '土耳其语(Turkish)',
            'uk' => '(Ukrainian)',
        ],
    ],
];
