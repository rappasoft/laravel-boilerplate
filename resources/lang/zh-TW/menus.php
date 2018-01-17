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
        'language' => '語言',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => '(Arabic)',
            'zh' => '中文（Chinese Simplified）',
            'zh-TW' => '中文（Chinese Traditional）',
            'da' => '丹麥語（Danish）',
            'de' => '德語（German）',
            'el' => '希臘語（Greek）',
            'en' => '英語（English）',
            'es' => '西班牙語（Spanish）',
            'fr' => '法語（French）',
            'he' => '希伯來語 (Hebrew)',
            'id' => '印度尼西亞語（Indonesian）',
            'it' => '意大利語（Italian）',
            'ja' => '日語（Japanese）',
            'nl' => '荷蘭語（Dutch）',
            'no'    => '挪威 (Norwegian)',
            'pt_BR' => '巴西葡萄牙語（Brazilian Portuguese）',
            'ru' => '俄語（Russian）',
            'sv' => '瑞典語（Swedish）',
            'th' => '泰語（Thai）',
            'tr'    => '(Turkish)',
        ],
    ],
];
