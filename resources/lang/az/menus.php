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
            'title' => 'Giriş',

            'roles' => [
                'all' => 'Bütün Rollar',
                'create' => 'Rol yarat',
                'edit' => 'Rolu yenilə',
                'management' => 'Rolun İdarəedilməsi',
                'main' => 'Rollar',
            ],

            'users' => [
                'all' => 'Bütün İstifadəçilər',
                'change-password' => 'Şifrəni dəyiş',
                'create' => 'İstifadəçi yarat',
                'deactivated' => 'Deaktiv İstifadəçilər',
                'deleted' => 'Silinmiş İstifadəçilər',
                'edit' => 'İstifadəçini yenilə',
                'main' => 'İstifadəçilər',
                'view' => 'İstifadəçiyə bax',
            ],
        ],

        'log-viewer' => [
            'main' => 'Loglara bax',
            'dashboard' => 'Dashboard',
            'logs' => 'Loglar',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => 'Ümumi',
            'history' => 'Arxiv',
            'system' => 'Sistem',
        ],
    ],

    'language-picker' => [
        'language' => 'Dil',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'Arabic',
            'az' => 'Azerbaijan',
            'zh' => 'Chinese Simplified',
            'zh-TW' => 'Chinese Traditional',
            'da' => 'Danish',
            'de' => 'German',
            'el' => 'Greek',
            'en' => 'English',
            'es' => 'Spanish',
            'fa' => 'Persian',
            'fr' => 'French',
            'he' => 'Hebrew',
            'id' => 'Indonesian',
            'it' => 'Italian',
            'ja' => 'Japanese',
            'nl' => 'Dutch',
            'no' => 'Norwegian',
            'pt_BR' => 'Brazilian Portuguese',
            'ru' => 'Russian',
            'sv' => 'Swedish',
            'th' => 'Thai',
            'tr' => 'Turkish',
            'uk' => 'Ukrainian',
        ],
    ],
];
