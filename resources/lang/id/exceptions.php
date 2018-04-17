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
                'already_exists'    => 'Peran tersebut sudah ada. Pilihlah nama yang berbeda.',
                'cant_delete_admin' => 'Anda tidak dapat menhapus Peran Administrator.',
                'create_error'      => 'Ada masalah saat membuat peran ini. Silakan coba lagi.',
                'delete_error'      => 'Ada masalah saat menghapus peran ini. Silakan coba lagi.',
                'has_users'         => 'Anda tidak dapat menghapus peran dengan pengguna yang berkaitan.',
                'needs_permission'  => 'Anda harus memilih setidaknya satu izin untuk peran ini.',
                'not_found'         => 'Peran tersebut tidak ada.',
                'update_error'      => 'Ada masalah saat memperbarui peran ini. Silakan coba lagi.',
            ],

            'users' => [
                'already_confirmed'    => 'This user is already confirmed.',
                'cant_deactivate_self'  => 'Anda tidak dapat melakukan itu kepada diri sendiri.',
                'cant_delete_admin'  => 'You can not delete the super administrator.',
                'cant_delete_self'      => 'Anda tidak dapat menghapus diri sendiri.',
                'cant_delete_own_session' => 'You can not delete your own session.',
                'cant_restore'          => 'Pengguna ini tidak dihapus sehingga tidak dapat dikembalikan.',
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'create_error'          => 'Ada masalah saat membuat pengguna ini. Silakan coba lagi.',
                'delete_error'          => 'Ada masalah saat menghapus pengguna ini. Silakan coba lagi.',
                'delete_first'          => 'Pengguna ini harus dihapus terlebih dahulu sebelum dapat dihancurkan secara permanen.',
                'email_error'           => 'Alamat email milik pengguna yang berbeda.',
                'mark_error'            => 'Ada masalah saat memperbarui pengguna ini. Silakan coba lagi.',
                'not_confirmed'            => 'This user is not confirmed.',
                'not_found'             => 'Pengguna tersebut tidak ada.',
                'restore_error'         => 'Ada masalah memulihkan pengguna ini. Silakan coba lagi.',
                'role_needed_create'    => 'Anda harus memilih setidaknya satu peran.',
                'role_needed'           => 'Anda harus memilih setidaknya satu peran.',
                'session_wrong_driver'  => 'Your session driver must be set to database to use this feature.',
                'social_delete_error' => 'There was a problem removing the social account from the user.',
                'update_error'          => 'Ada masalah saat memperbarui pengguna ini. Silakan coba lagi.',
                'update_password_error' => 'Ada masalah mengubah sandi pengguna ini. Silakan coba lagi.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Akun Anda sudah dikonfirmasi.',
                'confirm'           => 'Konfirmasi akun Anda!',
                'created_confirm'   => 'Akun Anda berhasil dibuat. Kami telah mengirim e-mail untuk konfirmasi akun Anda.',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch'          => 'Kode konfirmasi Anda tidak cocok.',
                'not_found'         => 'Kode konfirmasi tersebut tidak ada.',
                'pending'            => 'Your account is currently pending approval.',
                'resend'            => 'Akun Anda belum dikonfirmasi. Silakan klik link konfirmasi di e-mail Anda, atau <a href=":url">klik disini</a> untuk mengirim ulang e-mail konfirmasi.',
                'success'           => 'Akun Anda telah berhasil dikonfirmasi!',
                'resent'            => 'Sebuah e-mail konfirmasi baru telah dikirimkan ke alamat terkait.',
            ],

            'deactivated' => 'Akun Anda telah dinonaktifkan.',
            'email_taken' => 'Alamat e-mail tersebut sudah pakai.',

            'password' => [
                'change_mismatch' => 'Itu bukan sandi lama Anda.',
                'reset_problem' => 'There was a problem resetting your password. Please resend the password reset email.',
            ],

            'registration_disabled' => 'Registration is currently closed.',
        ],
    ],
];
