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
                'already_exists'    => 'هذا الدور موجود مسبقا. برجاء إختيار إسم آخر.',
                'cant_delete_admin' => 'لا يمكنك إزالة دور الإداري.',
                'create_error'      => 'حدثت مشكلة أثناء إنشاء الدور، برجاء المحاولة مرة أخرى.',
                'delete_error'      => 'حدثت مشكلة أثناء مسح الدور، برجاء إعادة المحاولة مرى أخرى.',
                'has_users'         => 'لا يمكنك مسح هذا الدور وهناك مستخدمين مرتبطين به.',
                'needs_permission'  => 'يجب عليك على الأقل إختيار صلاحية واحدة لهذا الدور.',
                'not_found'         => 'هذا الدور غير موجود.',
                'update_error'      => 'هناك مشكلة في تحديث هذا الدور، برجاء المحاولة مرة أخرى.',
            ],

            'users' => [
                'already_confirmed'    => 'This user is already confirmed.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'cant_deactivate_self'  => 'لا يمكنك فعل هذا بنفسك.',
                'cant_delete_admin'  => 'You can not delete the super administrator.',
                'cant_delete_self'      => 'لا يمكنك مسح نفسك.',
                'cant_delete_own_session' => 'You can not delete your own session.',
                'cant_restore'          => 'This user is not deleted so it can not be restored.',
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'create_error'          => 'حدثت مشكلة أثناء إنشاء المستخدم، برجاء المحاولة مرة أخرى.',
                'delete_error'          => 'حدثت مشكلة أثناء مسح المستخدم، برجاء المحاولة مرى أخرى .',
                'delete_first'          => 'This user must be deleted first before it can be destroyed permanently.',
                'email_error'           => 'هذا البريد الإلكتروني ينتمي إلا مستخدم آخر.',
                'mark_error'            => 'حدثت مشكلة أثناء تحديث هذا المستخدم، برجاء المحاولة مرى أخرى.',
                'not_confirmed'            => 'This user is not confirmed.',
                'not_found'             => 'هذا المستخدم غير موجود.',
                'restore_error'         => 'حدثت مشكلة أثناء إستعادة المستخدم، برجاء المحاولة مرة أخرى',
                'role_needed_create'    => 'يجب عليك اختيار دور واحد.',
                'role_needed'           => 'يجب عليك إختيار دور واحد على الأقل.',
                'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
                'social_delete_error' => 'There was a problem removing the social account from the user.',
                'update_error'          => 'حدثت مشكلة أثناء تحديث المستخدم، برجاء المحاولة مرة أخرى.',
                'update_password_error' => 'حدثت مشكلة أثناء تغيير كلمة مرور المستخدم، برجاء المحاولة مرة أخرى.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'حسابك مفعل بالفعل.',
                'confirm'           => 'برجاء القيام بتفعيل حسابك!',
                'created_confirm'   => 'لقد تم إنشاء حسابك بنجاح. لقد تم إرسال بريد التفعيل إلى بريدك الإلكتروني.',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch'          => 'كود التفعيل هذا غير متطابق!',
                'not_found'         => 'كود التفعيل هذا غير موجود!',
                'pending'            => 'Your account is currently pending approval.',
                'resend'            => 'حسابك غير مفعل. برجاء الضغط على رابط التفعيل الذي تم إرساله إلى بريدك الإلكتروني, أو <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">إضغط هنا</a> لإعادة إرسال رابط التفعيل مجددا.',
                'success'           => 'تم تفعيل حسابك بنجاح!',
                'resent'            => 'تم إرسال رابط التفعيل مجددا إلى عنوان بريدك الإلكتروني الموجود في حسابك.',
            ],

            'deactivated' => 'لقد تم تعطيل حسابك.',
            'email_taken' => 'هذا البريد الإلكتروني موجود مسبقا.',

            'password' => [
                'change_mismatch' => 'هذه ليست كلمة مرورك القديمة.',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
