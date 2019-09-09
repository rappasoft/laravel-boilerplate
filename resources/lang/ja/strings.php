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
                'delete_user_confirm' => 'このユーザーを永久に削除してもよろしいですか？ このユーザーのIDを参照するアプリケーションのどこでもエラーが発生します。 自己責任で行ってください。 これは、元に戻すことはできません。',
                'if_confirmed_off' => '(確認済みの場合)',
                'restore_user_confirm' => 'このユーザーを元の状態に戻しますか？',
            ],
        ],

        'dashboard' => [
            'title' => 'Dashboard',
            'welcome' => 'Welcome',
        ],

        'general' => [
            'all_rights_reserved' => 'All Rights Reserved.',
            'are_you_sure' => '本当ですか？',
            'boilerplate_link' => 'Laravel Boilerplate',
            'continue' => 'Continue',
            'member_since' => '会員登録日',
            'minutes' => ' 分',
            'search_placeholder' => '検索中...',
            'timeout' => 'あなたは活動がなかったのでセキュリティ上の理由から自動的にログアウトされました。',

            'see_all' => [
                'messages' => 'すべてのメッセージを見る',
                'notifications' => 'すべて表示',
                'tasks' => 'すべてのタスク表示',
            ],

            'status' => [
                'online' => 'オンライン',
                'offline' => 'オフライン',
            ],

            'you_have' => [
                'messages' => '{0} メッセージなし|{1} １件メッセージあり|[2,Inf] :number件のメッセージあり',
                'notifications' => '{0} 通知なし|{1} １件通知あり|[2,Inf] :number件の通知あり',
                'tasks' => '{0} タスクなし|{1} １件タスクあり|[2,Inf] :number件のタスクあり',
            ],
        ],

        'search' => [
            'empty' => '検索テキストを入力してください。',
            'incomplete' => 'このシステムに独自の検索ロジックを記述する必要があります。',
            'title' => '検索結果',
            'results' => '検索結果 :query',
        ],

        'welcome' => 'Welcome to the Dashboard',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'Your account has been confirmed.',
            'error' => 'Whoops!',
            'greeting' => 'Hello!',
            'regards' => 'Regards,',
            'trouble_clicking_button' => '":action_text" ボタンをクリックしても問題が解決しない場合は、以下のURLをコピーしてウェブブラウザに貼り付けてください:',
            'thank_you_for_using_app' => 'このアプリケーションを使用していただきありがとうございます！',

            'password_reset_subject' => 'パスワードのリセット',
            'password_cause_of_email' => 'あなたのアカウントのパスワードリセットリクエストを受け取りましたので、このメールをお送りしています。',
            'password_if_not_requested' => 'パスワードリセットを要求しなかった場合、これ以上の操作は必要ありません。',
            'reset_password' => 'パスワードをリセットするにはここをクリック',

            'click_to_confirm' => 'あなたのアカウントを確認するにはここをクリックしてください:',
        ],

        'contact' => [
            'email_body_title' => 'You have a new contact form request: Below are the details:',
            'subject' => 'A new :app_name contact form submission!',
        ],
    ],

    'frontend' => [
        'test' => 'Test',

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

        'general' => [
            'joined' => 'Joined',
        ],

        'user' => [
            'profile_updated' => 'プロフィール更新に成功しました。',
            'password_updated' => 'パスワード更新に成功しました。',
        ],

        'welcome_to' => 'Welcome to :place',
    ],
];
