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
        'all'     => 'همه',
        'yes'     => 'آری',
        'no'      => 'خیر',
        'copyright' => 'کپی‌رایت',
        'custom'  => 'سفارشی',
        'actions' => 'اعمال',
        'active'  => 'فعال',
        'buttons' => [
            'save'   => 'ثبت',
            'update' => 'به‌روز رسانی',
        ],
        'hide'              => 'مخفی',
        'inactive'          => 'غیرفعال',
        'none'              => 'هیچ',
        'show'              => 'نمایش',
        'toggle_navigation' => 'تغییر ناوبری',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'ایجاد نقش',
                'edit'       => 'ویرایش نقش',
                'management' => 'مدیریت نقش',

                'table' => [
                    'number_of_users' => 'تعداد کاربران',
                    'permissions'     => 'مجوزها',
                    'role'            => 'نقش',
                    'sort'            => 'مرتب‌سازی',
                    'total'           => 'تعداد نقش|تعداد نقش‌ها',
                ],
            ],

            'users' => [
                'active'              => 'کاربران فعال',
                'all_permissions'     => 'همه‌ی مجوزها',
                'change_password'     => 'تغییر گذرواژه',
                'change_password_for' => 'تغییر گذرواژه‌ی :user',
                'create'              => 'ایجاد کاربر',
                'deactivated'         => 'کاربران غیر فعال',
                'deleted'             => 'کاربران حذف‌شده',
                'edit'                => 'ویرایش کاربر',
                'management'          => 'مدیریت کاربر',
                'no_permissions'      => 'بدون مجوز',
                'no_roles'            => 'بدون نقش',
                'permissions'         => 'مجوزها',

                'table' => [
                    'confirmed'      => 'تاییدشده',
                    'created'        => 'تاریخ ایجاد',
                    'email'          => 'رایانامه',
                    'id'             => 'شناسه',
                    'last_updated'   => 'آخرین تغییر',
                    'name'           => 'نام',
                    'first_name'     => 'نام',
                    'last_name'      => 'نام خانوادگی',
                    'no_deactivated' => 'هیچ کاربر غیرفعالی نیست',
                    'no_deleted'     => 'هیچ کاربری حذف نشده',
                    'other_permissions' => 'دیگر مجوزها',
                    'permissions' => 'مجوزها',
                    'roles'          => 'نقش‌ها',
                    'social' => 'شبکه‌اجتماعی',
                    'total'          => 'تعداد کاربر|تعداد کاربران',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'دید کلی',
                        'history'  => 'تاریخچه',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'تصویر',
                            'confirmed'    => 'تاییدشده',
                            'created_at'   => 'تاریخ ایجاد',
                            'deleted_at'   => 'تاریخ حذف',
                            'email'        => 'ایمیل',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'آخرین تغییر',
                            'name'         => 'نام',
                            'first_name'   => 'نام',
                            'last_name'    => 'نام خانوادگی',
                            'status'       => 'وضعیت',
                            'timezone'     => 'Timezone',
                        ],
                    ],
                ],

                'view' => 'نمایش کاربر',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'ورود',
            'login_button'       => 'ورود',
            'login_with'         => 'ورود با :social_media',
            'register_box_title' => 'ثبت نام',
            'register_button'    => 'ثبت نام',
            'remember_me'        => 'مرا به خاطر بسپار',
        ],

        'contact' => [
            'box_title' => 'تماس با ما',
            'button' => 'ارسال اطلاعات',
        ],

        'passwords' => [
            'expired_password_box_title' => 'گذرواژه شما منقضی شده است.',
            'forgot_password'                 => 'گذرواژه‌ی خود را فراموش کرده‌اید؟',
            'reset_password_box_title'        => 'بازنشانی گذرواژه',
            'reset_password_button'           => 'بازنشانی گذرواژه',
            'update_password_button'           => 'به‌روز رسانی گذرواژه',
            'send_password_reset_link_button' => 'ارسال پیوند بازنشانی گذرواژه',
        ],

        'user' => [
            'passwords' => [
                'change' => 'تغییر گذرواژه',
            ],

            'profile' => [
                'avatar'             => 'تصویر',
                'created_at'         => 'تاریخ ایجاد',
                'edit_information'   => 'ویرایش اطلاعات',
                'email'              => 'ایمیل',
                'last_updated'       => 'آخرین تغییر',
                'name'               => 'نام',
                'first_name'         => 'نام',
                'last_name'          => 'نام خانوادگی',
                'update_information' => 'به‌روز رسانی اطلاعات',
            ],
        ],

    ],
];
