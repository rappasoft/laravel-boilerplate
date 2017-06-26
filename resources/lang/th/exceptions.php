<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'roles' => [
                'already_exists'    => 'บทบาทนี้มีอยู่แล้ว กรุณาเลือกชื่ออื่นที่แตกต่าง',
                'cant_delete_admin' => 'คุณไม่สามารถลบบทบาทผู้ดูแลระบบได้',
                'create_error'      => 'มีข้อผิดพลาดในการสร้างบทบาทนี้ กรุณาลองใหม่อีกครั้ง',
                'delete_error'      => 'มีข้อผิดพลาดในการลบบทบาทนี้ กรุณาลองใหม่อีกครั้ง',
                'has_users'         => 'คุณไม่สามารถลบบทบาทที่มีผู้ใช้สวมบทบาทนี้อยู่',
                'needs_permission'  => 'คุณต้องเลือกอย่างน้อยหนึ่งสิทธิ์ให้กับบทบาทนี้',
                'not_found'         => 'ไม่พบบทบาทนี้',
                'update_error'      => 'มีข้อผิดพลาดในการแก้ไขบทบาทนี้ กรุณาลองใหม่อีกครั้ง',
            ],

            'users' => [
                'already_confirmed'    => 'This user is already confirmed.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'cant_deactivate_self'  => 'คุณไม่สามารถกระทำกับตนเองได้',
                'cant_delete_admin'  => 'You can not delete the super administrator.',
                'cant_delete_self'      => 'คุณไม่สามารถลบตนเองได้',
                'cant_delete_own_session' => 'You can not delete your own session.',
                'cant_restore'                  => 'ผู้ใช้นี้ไม่สามารถทำการลบได้ เนื่องจากไม่สามารถจะกู้คืนผู้ใช้นี้ได้',
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'create_error'          => 'มีข้อผิดพลาดในการสร้างผู้ใช้นี้ กรุณาลองใหม่อีกครั้ง',
                'delete_error'          => 'มีข้อผิดพลาดในการลบผู้ใช้นี้ กรุณาลองใหม่อีกครั้ง',
        'delete_first'                  => 'ผู้ใช้นี้ต้องทำการลบออกไปก่อน ก่อนที่จะทำการทำลบทื้งอย่างถาวร',
                'email_error'           => 'อีเมลนี้เป็นของผู้ใช้คนอื่น',
                'mark_error'            => 'มีข้อผิดพลาดในการแก้ไขผู้ใช้นี้ กรุณาลองใหม่อีกครั้ง',
                'not_confirmed'            => 'This user is not confirmed.',
                'not_found'             => 'ไม่พบผู้ใช้นี้',
                'restore_error'         => 'มีข้อผิดพลาดในการกู้คืนผู้ใช้นี้ กรุณาลองใหม่อีกครั้ง',
                'role_needed_create'    => 'คุณต้องเลือกอย่างน้อยหนึ่งบทบาท',
                'role_needed'           => 'คุณต้องเลือกอย่างน้อยหนึ่งบทบาท',
                'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
                'social_delete_error' => 'There was a problem removing the social account from the user.',
                'update_error'          => 'มีข้อผิดพลาดในการแก้ไขผู้ใช้นี้ กรุณาลองใหม่อีกครั้ง',
                'update_password_error' => 'มีข้อผิดพลาดในการเปลี่ยนรหัสผ่านของผู้ใช้นี้ กรุณาลองใหม่อีกครั้ง',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'บัญชีผู้ใช้ของคุณได้รับการยืนยันแล้ว',
                'confirm'           => 'ยีนยันบัญชีผู้ใช้ของคุณ!',
                'created_confirm'   => 'บัญชีผู้ใช้ของคุณถูกสร้างสำเร็จแล้ว ระบบได้ส่งอีเมลสำหรับยืนยันตัวตนให้คุณ',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch'          => 'รหัสที่ใช้ยืนยันตัวตนไม่ถูกต้อง',
                'not_found'         => 'ไม่พบรหัสที่ใช้ยืนยันตัวตนนี้',
                'pending'            => 'Your account is currently pending approval.',
                'resend'            => 'บัญชีผู้ใช้ของคุณยังไม่ได้รับการยืนยันตัวตน กรุณาคลิกลิงก์ในอีเมลของคุณ หรือ <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">คลิกที่นี่</a> เพื่อส่งอีเมลยืนยันตัวตนอีกครั้ง',
                'success'           => 'บัญชีผู้ใช้ของคุณได้รับการยืนยันตัวตนสำเร็จแล้ว!',
                'resent'            => 'อีเมลยืนยันตัวตนฉบับใหม่ได้ถูกส่งไปยังปลายทางแล้ว',
            ],

            'deactivated' => 'บัญชีผู้ใช้ของคุณถูกพักการใช้งาน',
            'email_taken' => 'อีเมลนี้ถูกใช้ในระบบแล้ว',

            'password' => [
                'change_mismatch' => 'รหัสผ่านเดิมไม่ถูกต้อง',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
