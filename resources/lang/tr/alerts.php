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
            'created' => 'Rol başarılı bir şekilde oluşturuldu.',
            'deleted' => 'Rol başarıyla silindi.',
            'updated' => 'Rol başarıyla güncellendi.',
        ],

        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'  => 'Kayıtlı e-posta adresine yeni bir onay e-postası gönderildi.',
            'confirmed'              => 'The user was successfully confirmed.',
            'created'             => 'Kullanıcı başarıyla oluşturuldu.',
            'deleted'             => 'Kullanıcı başarıyla silindi.',
            'deleted_permanently' => 'Kullanıcı kalıcı olarak silindi.',
            'restored'            => 'Kullanıcı başarıyla geri yüklendi.',
            'session_cleared'      => 'Kullanıcının oturumu başarıyla temizlendi.',
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => 'Kullanıcı başarıyla güncellendi.',
            'updated_password'    => 'Kullanıcının şifresi başarıyla güncellendi.',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
