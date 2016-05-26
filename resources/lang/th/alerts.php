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
        'permissions' => [
            'created' => 'Permission successfully created.',
            'deleted' => 'Permission successfully deleted.',

            'groups'  => [
                'created' => 'Permission group successfully created.',
                'deleted' => 'Permission group successfully deleted.',
                'updated' => 'Permission group successfully updated.',
            ],

            'updated' => 'Permission successfully updated.',
        ],

        'roles' => [
            'created' => 'The role was successfully created.',
            'deleted' => 'The role was successfully deleted.',
            'updated' => 'The role was successfully updated.',
        ],

        'users' => [
            'confirmation_email' => 'อีเมลสำหรับใช้ยืนยันบัญชีผู้ใช้ได้ถูกส่งให้แล้วตามอีเมลที่ระบุ',
            'created' => 'บัญชีผู้ใช้ได้ถูกสร้างแล้ว',
            'deleted' => 'บัญชีผู้ใช้ได้ถูกลบแล้ว',
            'deleted_permanently' => 'บัญชีผู้ใช้ได้ถูกลบออกจากระบบอย่างถาวรแล้ว',
            'restored' => 'บัญชีผู้ใช้ได้ถูกกู้คืนแล้ว',
            'updated' => 'บัญชีผู้ใช้ได้รับการปรับปรุงแล้ว',
            'updated_password' => "รหัสผ่านได้รับการปรับปรุงแล้ว",
        ]
    ],
];