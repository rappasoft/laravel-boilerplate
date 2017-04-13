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
            'title' => 'Access Management',

            'roles' => [
                'all' => 'All Roles',
                'create' => 'Create Role',
                'edit' => 'Edit Role',
                'management' => 'Role Management',
                'main' => 'Roles',
            ],

            'users' => [
                'all' => 'All Users',
                'change-password' => 'Change Password',
                'create' => 'Create User',
                'deactivated' => 'Deactivated Users',
                'deleted' => 'Deleted Users',
                'edit' => 'Edit User',
                'main' => 'Users',
                'view' => 'View User',
            ],
        ],

        'log-viewer' => [
            'main' => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => 'General',
            'system' => 'System',
        ],
    ],

    'language-picker' => [
        'language' => '语言',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => '阿拉伯语（Arabic）',
            'da'    => '丹麦语（Danish）',
            'de'    => '德语（German）',
            'el'    => '希腊语（Greek）',
            'en'    => '英语（English）',
            'es'    => '西班牙语（Spanish）',
            'fr'    => '法语（French）',
            'id'    => '印度尼西亚语（Indonesian）',
            'it'    => '意大利语（Italian）',
            'ja'    => '日语（Japanese）',
            'nl'    => '荷兰语（Dutch）',
            'pt_BR' => '巴西葡萄牙语（Brazilian Portuguese）',
            'ru'    => '俄语（Russian）',
            'sv'    => '瑞典语（Swedish）',
            'th'    => '泰语（Thai）',
            'zh'    => '中文（简体）',
            'zh-TW' => '中文（繁体）',
        ],
    ],
];
