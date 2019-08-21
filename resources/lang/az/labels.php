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
        'all' => 'Hamısı',
        'yes' => 'Bəli',
        'no' => 'Xeyr',
        'copyright' => 'Müəllif hüquqları',
        'custom' => 'Xüsusi',
        'actions' => 'Hərəkətlər',
        'active' => 'Aktiv',
        'buttons' => [
            'save' => 'Yadda Saxla',
            'update' => 'Yenilə',
        ],
        'hide' => 'Gizlət',
        'inactive' => 'Dekativ',
        'none' => 'Heç nə',
        'show' => 'Göstər',
        'toggle_navigation' => 'Naviqasiya Keçidi',
        'create_new' => 'Yenisini Yarat',
        'toolbar_btn_groups' => 'Buton qruplarının alət setləri',
        'more' => 'More',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Rol Yarat',
                'edit' => 'Rolu yenilə',
                'management' => 'Rolu İdarə et',

                'table' => [
                    'number_of_users' => 'İstifadəçilərin sayı',
                    'permissions' => 'İcazələr',
                    'role' => 'Rol',
                    'sort' => 'Sıralama',
                    'total' => 'rolların sayı',
                ],
            ],

            'users' => [
                'active' => 'Aktiv İstifadəçi',
                'all_permissions' => 'Bütün İcazələr',
                'change_password' => 'Şifrəni Dəyiş',
                'change_password_for' => ':user adlı istifadəçinin şifrəsini dəyiş',
                'create' => 'Yeni İstifadəçi',
                'deactivated' => 'Deaktiv olunmuş istifadəçi',
                'deleted' => 'Silinmiş istifadəçi',
                'edit' => 'İstifadəçini yenilə',
                'management' => 'İsitafəçi paneli',
                'no_permissions' => 'İcazə yoxdur',
                'no_roles' => 'Seçim üçün rol yoxdur.',
                'permissions' => 'İcazələr',
                'user_actions' => 'İstifadəçi hərəkətləri',

                'table' => [
                    'confirmed' => 'Təsdiqləndi',
                    'created' => 'Yaradıldı',
                    'email' => 'E-mail ünvanı',
                    'id' => 'İD',
                    'last_updated' => 'Son Yenilənmə',
                    'name' => 'Ad',
                    'first_name' => 'Adınız',
                    'last_name' => 'Soyadınız',
                    'no_deactivated' => 'Deaktiv edilmiş itifadəçi yoxdur',
                    'no_deleted' => 'Silinmiş istifadəçi yoxdur',
                    'other_permissions' => 'Digər İcazələr',
                    'permissions' => 'İcazələr',
                    'abilities' => 'Bacarıqlar',
                    'roles' => 'Rollar',
                    'social' => 'Sosial',
                    'total' => 'User sayı',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Nəzər yetir',
                        'history' => 'Arxiv',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Təsdiqləndo',
                            'created_at' => 'Yaradıldı',
                            'deleted_at' => 'Silindi',
                            'email' => 'E-mail ünvanı',
                            'last_login_at' => 'Son daxil olma vaxtı',
                            'last_login_ip' => 'Son istifadə etdiyi IP',
                            'last_updated' => 'Son Yenilənmə',
                            'name' => 'Ad',
                            'first_name' => 'Adınız',
                            'last_name' => 'Soyadınız',
                            'status' => 'Status',
                            'timezone' => 'Vaxt Qurşağı',
                        ],
                    ],
                ],

                'view' => 'İstifadəçiyə bax',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'login_box_title' => 'Daxil ol',
            'login_button' => 'Daxil ol',
            'login_with' => ':social_media ilə daxil ol',
            'register_box_title' => 'Qeydiyyat',
            'register_button' => 'Qeydiyyat',
            'remember_me' => 'Məni xatırla',
        ],

        'contact' => [
            'box_title' => 'Bizimlə əlaqə',
            'button' => 'Məlumat göndər',
        ],

        'passwords' => [
            'expired_password_box_title' => 'Şifrənizin istifadə səlahiyyəti sona çatıb.',
            'forgot_password' => 'Şifrəni unutmusunuz?',
            'reset_password_box_title' => 'Şifrəni yenilə',
            'reset_password_button' => 'Şifrəni yenilə',
            'update_password_button' => 'Şifrəni yenilə',
            'send_password_reset_link_button' => 'Şifrəni yeniləmə linki göndər',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Şifrəni dəyiş',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Yaradıldı',
                'edit_information' => 'Məlumatarı Yenilə',
                'email' => 'E-mail ünvanı',
                'last_updated' => 'Son yenilənmə',
                'name' => 'Ad',
                'first_name' => 'Adınız',
                'last_name' => 'Soyadınız',
                'update_information' => 'Məlumatları yenilə',
            ],
        ],
    ],
];
