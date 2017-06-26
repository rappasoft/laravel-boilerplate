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
        'all' => 'すべて',
        'yes' => 'OK',
        'no' => 'No',
        'custom' => 'カスタム',
        'actions' => '各種変更',
        'active' => 'アクテイブ',
        'buttons' => [
            'save' => '保存',
            'update' => '更新',
        ],
        'hide' => '非表示',
        'inactive' => 'アクテイブ中',
        'none' => 'なし',
        'show' => '表示',
        'toggle_navigation' => 'ナビゲーション切り替え',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'ロール作成',
                'edit' => 'ロール編集',
                'management' => 'ロール管理',

                'table' => [
                    'number_of_users' => 'ユーザ数',
                    'permissions' => '権限',
                    'role' => 'ロール',
                    'sort' => 'ソート',
                    'total' => 'ロール合計|ロール合計',
                ],
            ],

            'users' => [
                'active' => 'アクテイブユーザ',
                'all_permissions' => '全権限',
                'change_password' => 'パスワード変更',
                'change_password_for' => ' :userのパスワードを変更',
                'create' => 'ユーザ作成',
                'deactivated' => '非アクティブユーザ',
                'deleted' => '削除されたユーザ',
                'edit' => 'ユーザ編集',
                'management' => 'ユーザ管理',
                'no_permissions' => '権限存在しない',
                'no_roles' => '設定するロールが存在なし',
                'permissions' => '権限',

                'table' => [
                    'confirmed' => '確認済',
                    'created' => '作成済',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => '最終更新日',
                    'name' => '名前',
                    'no_deactivated' => '非アクティブユーザが存在しない',
                    'no_deleted' => '削除されたユーザが存在しない',
                    'roles' => 'ロール',
                    'social' => 'Social',
                    'total' => 'ユーザ合計|ユーザ合計',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => '概要',
                        'history' => '履歴',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => '確認済',
                            'created_at' => '作成日',
                            'deleted_at' => '削除日',
                            'email' => 'E-mail',
                            'last_updated' => '最終更新日',
                            'name' => '名前',
                            'status' => 'ステータス',
                        ],
                    ],
                ],

                'view' => 'ユーザ表示',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title' => 'ログイン',
            'login_button' => 'ログイン',
            'login_with' => ' :social_mediaでログイン',
            'register_box_title' => '登録',
            'register_button' => '登録',
            'remember_me' => 'Remember Me',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'forgot_password' => 'パスワード忘れ',
            'reset_password_box_title' => 'パスワードリセット',
            'reset_password_button' => 'パスワードリセット',
            'send_password_reset_link_button' => 'パスワードリセットリンクを送る',
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
                'change' => 'パスワード変更',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => '作成日',
                'edit_information' => '情報編集',
                'email' => 'E-mail',
                'last_updated' => '最終更新日',
                'name' => '名前',
                'update_information' => '情報更新',
            ],
        ],

    ],
];
