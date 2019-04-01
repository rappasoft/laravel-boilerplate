<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all' => 'Hepsi',
        'yes' => 'Evet',
        'no' => 'Hayır',
        'custom' => 'Özel',
        'actions' => 'İşlemler',
        'active' => 'Etkin',
        'buttons' => [
            'save' => 'Kaydet',
            'update' => 'Güncelle',
        ],
        'hide' => 'Gizle',
        'inactive' => 'Etkin değil',
        'none' => 'Hiçbiri',
        'show' => 'Göster',
        'toggle_navigation' => 'Navigasyon Açık',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Rol Oluştur',
                'edit' => 'Rol Düzenle',
                'management' => 'Rol Yönetimi',

                'table' => [
                    'number_of_users' => 'Kullanıcı Sayısı',
                    'permissions' => 'İzinler',
                    'role' => 'Rol',
                    'sort' => 'Sıralama',
                    'total' => 'rol toplam|roller toplam',
                ],
            ],

            'users' => [
                'active' => 'Aktif Kullanıcılar',
                'all_permissions' => 'Tüm İzinler',
                'change_password' => 'Parolayı Değiştir',
                'change_password_for' => 'Kullanıcı :user parolasını değiştir',
                'create' => 'Kullanıcı Oluştur',
                'deactivated' => 'Devre Dışı Bırakılan Kullanıcılar',
                'deleted' => 'Silinmiş Kullanıcılar',
                'edit' => 'Kullanıcı Düzenle',
                'management' => 'Kullanıcı Yönetimi',
                'no_permissions' => 'İzin yok.',
                'no_roles' => 'Ayarlanacak Rol yok.',
                'permissions' => 'İzinler',

                'table' => [
                    'confirmed' => 'Onaylandı',
                    'created' => 'Oluşturuldu',
                    'email' => 'E-posta',
                    'id' => 'ID',
                    'last_updated' => 'Son Güncelleme',
                    'name' => 'İsim',
                    'first_name' => 'Ad',
                    'last_name' => 'Soyad',
                    'no_deactivated' => 'Devre Dışı Bırakılan Kullanıcı Yok',
                    'no_deleted' => 'Silinmiş Kullanıcı Yok',
                    'roles' => 'Roller',
                    'social' => 'Social',
                    'total' => 'toplam kullanıcı|toplam kullanıcılar',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Genel Bakış',
                        'history' => 'Geçmiş',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Onaylandı',
                            'created_at' => 'Oluşturulma',
                            'deleted_at' => 'Silinme',
                            'email' => 'E-posta',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'Son Güncellenme',
                            'name' => 'İsim',
                            'first_name' => 'Ad',
                            'last_name' => 'Soyad',
                            'status' => 'Durum',
                            'timezone' => 'Timezone',
                        ],
                    ],
                ],

                'view' => 'Kullanıcıyı Göster',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'login_box_title' => 'Giriş',
            'login_button' => 'Giriş',
            'login_with' => 'Şununla Gir :social_media',
            'register_box_title' => 'Kayıt',
            'register_button' => 'Kayıt',
            'remember_me' => 'Beni Hatırla',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'forgot_password' => 'Parolanızı mı Unuttunuz?',
            'reset_password_box_title' => 'Parola Sıfırla',
            'reset_password_button' => 'Parola Sıfırla',
            'send_password_reset_link_button' => 'Parolayı Sıfırlama Bağlantısı Gönder',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Parolayı değiştir',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Oluşturulma',
                'edit_information' => 'Bilgileri Düzenle',
                'email' => 'E-posta',
                'last_updated' => 'Son Güncelleme',
                'name' => 'İsim',
                'first_name' => 'Ad',
                'last_name' => 'Soyad',
                'update_information' => 'Bilgileri Güncelle',
            ],
        ],
    ],
];
