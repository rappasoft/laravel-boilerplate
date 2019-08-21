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
            'title' => 'アクセス管理',

            'roles' => [
                'all' => '全ロール',
                'create' => 'ロール作成',
                'edit' => 'ロール編集',
                'management' => 'ロール管理',
                'main' => 'ロール',
            ],

            'users' => [
                'all' => '全ユーザ',
                'change-password' => 'パスワード変更',
                'create' => 'ユーザ作成',
                'deactivated' => 'ユーザ非アクティブ',
                'deleted' => '削除済のユーザ',
                'edit' => 'ユーザ編集',
                'main' => 'ユーザ',
                'view' => 'ユーザ表示',
            ],
        ],

        'log-viewer' => [
            'main' => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => '一般',
            'history' => 'History',
            'system' => 'システム',
        ],
    ],

    'language-picker' => [
        'language' => '言語',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'アラビア語（Arabic）',
            'az' => 'Azerbaijan',
            'zh' => '中国語（Chinese Simplified）',
            'zh-TW' => '中国語（Chinese Traditional）',
            'da' => 'デンマーク語（Danish）',
            'de' => 'ドイツ人（German）',
            'el' => 'ギリシャ語（Greek）',
            'en' => '英語（English）',
            'es' => 'スペイン語（Spanish）',
            'fa' => 'ペルシア語 (Persian)',
            'fr' => 'フランス語（French）',
            'he' => 'ヘブライ語 (Hebrew)',
            'id' => 'インドネシア語（Indonesian）',
            'it' => 'イタリア語（Italian）',
            'ja' => '日本語（Japanese）',
            'nl' => 'オランダ語（Dutch）',
            'no' => 'ノルウェーの (Norwegian)',
            'pt_BR' => 'ブラジルポルトガル語（Brazilian Portuguese）',
            'ru' => 'ロシア語（Russian）',
            'sv' => 'スウェーデン語（Swedish）',
            'th' => 'タイ語（Thai）',
            'tr' => '(Turkish)',
            'uk' => '(Ukrainian)',
        ],
    ],
];
