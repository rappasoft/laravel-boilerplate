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
                    'confirmed' => 'Confirmed',
                    'created' => 'Created',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Last Updated',
                    'name' => 'Name',
                    'first_name' => 'First Name',
                    'last_name' => 'Last Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted' => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'permissions' => 'Permissions',
                    'abilities' => 'Abilities',
                    'roles' => 'Roles',
                    'social' => 'Social',
                    'total' => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history' => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar' => 'Avatar',
                            'confirmed' => 'Confirmed',
                            'created_at' => 'Created At',
                            'deleted_at' => 'Deleted At',
                            'email' => 'E-mail',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'Last Updated',
                            'name' => 'Name',
                            'first_name' => 'First Name',
                            'last_name' => 'Last Name',
                            'status' => 'Status',
                            'timezone' => 'Timezone',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'login_box_title' => 'Login',
            'login_button' => 'Login',
            'login_with' => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button' => 'Register',
            'remember_me' => 'Remember Me',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'expired_password_box_title' => 'Your password has expired.',
            'forgot_password' => 'Forgot Your Password?',
            'reset_password_box_title' => 'Reset Password',
            'reset_password_button' => 'Reset Password',
            'update_password_button' => 'Update Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar' => 'Avatar',
                'created_at' => 'Created At',
                'edit_information' => 'Edit Information',
                'email' => 'E-mail',
                'last_updated' => 'Last Updated',
                'name' => 'Name',
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'update_information' => 'Update Information',
            ],
        ],
    ],
];
