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
            'permissions' => [
                'create_error' => 'There was a problem creating this permission. Please try again.',
                'delete_error' => 'There was a problem deleting this permission. Please try again.',

                'groups' => [
                    'associated_permissions' => 'You can not delete this group because it has associated permissions.',
                    'has_children' => 'You can not delete this group because it has child groups.',
                    'name_taken' => 'There is already a group with that name',
                ],

                'not_found' => 'That permission does not exist.',
                'system_delete_error' => 'You can not delete a system permission.',
                'update_error' => 'There was a problem updating this permission. Please try again.',
            ],

            'roles' => [
                'already_exists' => 'That role already exists. Please choose a different name.',
                'cant_delete_admin' => 'You can not delete the Administrator role.',
                'create_error' => 'There was a problem creating this role. Please try again.',
                'delete_error' => 'There was a problem deleting this role. Please try again.',
                'has_users' => 'You can not delete a role with associated users.',
                'needs_permission' => 'You must select at least one permission for this role.',
                'not_found' => 'That role does not exist.',
                'update_error' => 'There was a problem updating this role. Please try again.',
            ],

            'users' => [
                'cant_deactivate_self' => 'You can not do that to yourself.',
                'cant_delete_self' => 'You can not delete yourself.',
                'create_error' => 'There was a problem creating this user. Please try again.',
                'delete_error' => 'There was a problem deleting this user. Please try again.',
                'email_error' => 'That email address belongs to a different user.',
                'mark_error' => 'There was a problem updating this user. Please try again.',
                'not_found' => 'That user does not exist.',
                'restore_error' => 'There was a problem restoring this user. Please try again.',
                'role_needed_create' => 'You must choose at lease one role. User has been created but deactivated.',
                'role_needed' => 'You must choose at least one role.',
                'update_error' => 'There was a problem updating this user. Please try again.',
                'update_password_error' => 'There was a problem changing this users password. Please try again.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'บัญชีผู้ใช้ของคุณได้รับการยืนยันเรียบร้อยแล้ว',
                'confirm' => 'ยืนยันบัญชีผู้ใช้ของคุณ!',
                'created_confirm' => 'บัญชีของคุณถูกสร้างแล้ว ระบบได้ส่งอีเมลเพื่อให้คุณยืนยันบัญชีของคุณ',
                'mismatch' => 'รหัสสำหรับยืนยันไม่ตรงกัน',
                'not_found' => 'รหัสยืนยันไม่มีอยู่ในระบบ',
                'resend' => 'บัญชีผู้ใช้ของคุณยังไม่ได้รับการยืนยัน กรุณาคลิกที่ลิงค์เพื่อยืนยันในอีเมลที่่ส่งให้ หรือ <a href="' . route('account.confirm.resend', ':user_id') . '">คลิกที่นี่</a> เพื่อให้ระบบส่งลิงค์เพื่อยืนยันบัญชีของคุณอีกครั้งหนึ่ง',
                'success' => 'บัญชีผู้ใช้ของคุณได้รับการยืนยันแล้ว!',
                'resent' => 'ระบบได้ส่งอีเมลเพื่อให้คุณได้ทำการยืนยันบัญชีผู้ใช้ของคุณตามชื่ออีเมลที่ระบุไว้แล้ว',
            ],

            'deactivated' => 'Your account has been deactivated.',
            'email_taken' => 'อีเมลที่ระบุมีผู้ใช้งานในระบบแล้ว',

            'password' => [
                'change_mismatch' => 'รหัสผ่านเดิมไม่ถูกต้อง',
            ],


        ],
    ],
];
