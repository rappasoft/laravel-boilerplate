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
            'created' => 'บทบาทถูกสร้างสำเร็จแล้ว',
            'deleted' => 'บทบาทถูกลบสำเร็จแล้ว',
            'updated' => 'บทบาทถูกแก้ไขสำเร็จแล้ว',
        ],

        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'  => 'อีเมลยืนยันตัวตนได้ถูกส่งไปยังปลายทางแล้ว',
            'confirmed'              => 'The user was successfully confirmed.',
            'created'             => 'ผู้ใช้ถูกสร้างสำเร็จแล้ว',
            'deleted'             => 'ผู้ใช้ถูกลบสำเร็จแล้ว',
            'deleted_permanently' => 'ผู้ใช้ถูกลบไปอย่างถาวร',
            'restored'            => 'ผู้ใช้ถูกกู้คืนสำเร็จแล้ว',
            'session_cleared'      => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => 'ผู้ใช้ถูกแก้ไขสำเร็จแล้ว',
            'updated_password'    => 'รหัสผ่านของผู้ใช้ถูกแก้ไขสำเร็จแล้ว',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
