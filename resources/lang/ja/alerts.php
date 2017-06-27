<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'roles' => [
            'created' => 'ロールが正常に作成されました。',
            'deleted' => 'ロールが削除されました。',
            'updated' => 'ロールが正常に更新されました。',
        ],

        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email' => '新しい確認メールがファイルのアドレスに送信されました。',
            'confirmed'              => 'The user was successfully confirmed.',
            'created' => 'ユーザーが正常に作成されました。',
            'deleted' => 'ユーザーが削除されました。',
            'deleted_permanently' => 'ユーザーが完全に削除されました。',
            'restored' => 'ユーザーが正常に復元されました。',
            'updated' => 'ユーザーが正常に更新されました。',
            'updated_password' => 'ユーザーのパスワードが正常に更新されました。',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
