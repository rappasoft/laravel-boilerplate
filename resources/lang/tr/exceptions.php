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
                'already_exists'    => 'Bu rol zaten var. Lütfen farklı bir isim seçin.',
                'cant_delete_admin' => 'Yönetici rolünü silemezsiniz.',
                'create_error'      => 'Bu rolü oluştururken bir sorun oluştu. Lütfen tekrar deneyin.',
                'delete_error'      => 'Bu rolü silerken bir sorun oluştu. Lütfen tekrar deneyin.',
                'has_users'         => 'İlişkili kullanıcı içeren bir rolü silemezsiniz.',
                'needs_permission'  => 'Bu rol için en az bir yetki seçmelisiniz.',
                'not_found'         => 'Bu rol yok.',
                'update_error'      => 'Bu rolü güncelleştirirken bir sorun oluştu. Lütfen tekrar deneyin.',
            ],

            'users' => [
                'already_confirmed'    => 'This user is already confirmed.',
                'cant_confirm' => 'There was a problem confirming the user account.',
                'cant_deactivate_self'  => 'Kendinize bu işlemi yapamazsınız.',
                'cant_delete_admin'  => 'Süper yöneticiyi silemezsiniz.',
                'cant_delete_self'      => 'Kendinizi silemezsiniz.',
                'cant_delete_own_session' => 'Kendi oturumunuzu silemezsiniz.',
                'cant_restore'          => 'Bu kullanıcı silinmediği için geri yüklenemez.',
                'cant_unconfirm_admin' => 'You can not un-confirm the super administrator.',
                'cant_unconfirm_self' => 'You can not un-confirm yourself.',
                'create_error'          => 'Bu kullanıcı oluşturulurken bir sorun oluştu. Lütfen tekrar deneyin.',
                'delete_error'          => 'Bu kullanıcı silinirken bir sorun oluştu. Lütfen tekrar deneyin.',
                'delete_first'          => 'Bu kullanıcı kalıcı olarak yokedilmeden önce önce silinmelidir.',
                'email_error'           => 'Bu e-posta adresi farklı bir kullanıcıya ait.',
                'mark_error'            => 'Bu kullanıcıyı güncellerken bir sorun oluştu. Lütfen tekrar deneyin.',
                'not_confirmed'            => 'This user is not confirmed.',
                'not_found'             => 'Bu kullanıcı bulunamadı.',
                'restore_error'         => 'Bu kullanıcı geri yüklenirken bir sorun oluştu. Lütfen tekrar deneyin.',
                'role_needed_create'    => 'En az bir rol seçmelisiniz.',
                'role_needed'           => 'En az bir rol seçmelisiniz.',
                'session_wrong_driver'  => 'Bu özelliği kullanabilmeniz için oturumların veritabanında saklanması gerekir.',
                'social_delete_error' => 'There was a problem removing the social account from the user.',
                'update_error'          => 'Bu kullanıcı güncellenirken bir hata oluştu. Lütfen tekrar deneyin.',
                'update_password_error' => 'Bu kullanıcının şifresini değiştirirken bir sorun oluştu. Lütfen tekrar deneyin.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Hesabınız zaten doğrulanmış.',
                'confirm'           => 'Hesabınızı onaylayın!',
                'created_confirm'   => 'Hesabınız başarıyla oluşturuldu. Hesabınızı onaylamak için size bir e-posta gönderdik.',
                'created_pending'   => 'Your account was successfully created and is pending approval. An e-mail will be sent when your account is approved.',
                'mismatch'          => 'Onay kodunuz uyuşmuyor.',
                'not_found'         => 'Onay kodu mevcut değil.',
                'pending'            => 'Your account is currently pending approval.',
                'resend'            => 'Hesabınız doğrulanmadı. Lütfen e-postanızdaki onay bağlantısını tıklayın veya onay e-postasını yeniden göndermek için <a href=":url">buraya tıklayın</a>',
                'success'           => 'Hesabınız başarıyla onaylandı!',
                'resent'            => 'Kayıtlı e-posta adresine yeni bir onay e-postası gönderildi.',
            ],

            'deactivated' => 'Hesabınız devreden çıkarıldı.',
            'email_taken' => 'Bu e-posta adresi zaten alınmış.',

            'password' => [
                'change_mismatch' => 'Bu şifre eski şifrenizle uyuşmuyor.',
                'reset_problem' => 'Şifrenizi sıfırlarken bir sorun oluştu. Lütfen şifre sıfırlama e-postasını tekrar gönderin.',
            ],

            'registration_disabled' => 'Kayıt şu anda kapalıdır.',
        ],
    ],
];
