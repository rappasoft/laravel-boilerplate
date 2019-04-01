<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'مدیریت دسترسی',

            'roles' => [
                'all' => 'همه نقش‌ها',
                'create' => 'ایجاد نقش',
                'edit' => 'ویرایش نقش',
                'management' => 'مدیریت نقش',
                'main' => 'نقش‌ها',
            ],

            'users' => [
                'all' => 'همه کاربران',
                'change-password' => 'تغییر گذرواژه',
                'create' => 'ایجاد کاربر',
                'deactivated' => 'کاربران غیرفعال',
                'deleted' => 'کاربران حذف شده',
                'edit' => 'ویرایش کاربر',
                'main' => 'کاربران',
                'view' => 'نمایش کاربر',
            ],
        ],

        'log-viewer' => [
            'main' => 'نمایش لاگ',
            'dashboard' => 'داشبورد',
            'logs' => 'لاگ‌ها',
        ],

        'sidebar' => [
            'dashboard' => 'داشبورد',
            'general' => 'عمومی',
            'history' => 'History',
            'system' => 'سامانه',
        ],
    ],

    'language-picker' => [
        'language' => 'زبان',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'عربی (Arabic)',
            'zh' => 'چینی ساده (Chinese Simplified)',
            'zh-TW' => 'چینی سنتی (Chinese Traditional)',
            'da' => 'دانمارکی (Danish)',
            'de' => 'آلمانی (German)',
            'el' => 'یونانی (Greek)',
            'en' => 'انگلیسی (English)',
            'es' => 'اسپانیولی (Spanish)',
            'fa' => 'فارسی',
            'fr' => 'فرانسوی (French)',
            'he' => 'عبری (Hebrew)',
            'id' => 'اندونزیایی (Indonesian)',
            'it' => 'ایتالیایی (Italian)',
            'ja' => 'ژاپنی (Japanese)',
            'nl' => 'هلندی (Dutch)',
            'no' => 'نروژی (Norwegian)',
            'pt_BR' => 'پرتغالی برزیلی (Brazilian Portuguese)',
            'ru' => 'روسی (Russian)',
            'sv' => 'سوئدی (Swedish)',
            'th' => 'تایلندی (Thai)',
            'tr' => 'ترکی (Turkish)',
            'uk' => '(Ukrainian)',
        ],
    ],
];
