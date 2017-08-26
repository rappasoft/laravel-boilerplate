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
            'title' => 'Quản lý truy cập',

            'roles' => [
                'all'        => 'Tất cả quyền',
                'create'     => 'Thêm quyền',
                'edit'       => 'Chỉnh sửa quyền',
                'management' => 'Quản lý quyền',
                'main'       => 'Quyền',
            ],

            'users' => [
                'all'             => 'Tất cả thành viên',
                'change-password' => 'Đổi mật khẩu',
                'create'          => 'Thêm thành viên',
                'deactivated'     => 'Thành viên chưa kích hoạt',
                'deleted'         => 'Thành viên đã xóa',
                'edit'            => 'Chỉnh sửa thành viên',
                'main'            => 'Thành viên',
                'view'            => 'Thông tin thành viên',
            ],
        ],

        'log-viewer' => [
            'main'      => 'Nhật ký hệ thống',
            'dashboard' => 'Tổng quan',
            'logs'      => 'Nhật ký',
        ],

        'sidebar' => [
            'dashboard' => 'Trang quản trị',
            'general'   => 'Tổng quan',
            'system'    => 'Hệ thống',
        ],
    ],

    'language-picker' => [
        'language' => 'Ngôn ngữ',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'Arabic',
            'zh'    => 'Chinese Simplified',
            'zh-TW' => 'Chinese Traditional',
            'da'    => 'Danish',
            'de'    => 'German',
            'el'    => 'Greek',
            'en'    => 'English',
            'es'    => 'Spanish',
            'fr'    => 'French',
            'id'    => 'Indonesian',
            'it'    => 'Italian',
            'ja'    => 'Japanese',
            'nl'    => 'Dutch',
            'pt_BR' => 'Brazilian Portuguese',
            'ru'    => 'Russian',
            'sv'    => 'Swedish',
            'th'    => 'Thai',
            'tr'    => 'Turkish',
            'vi'    => 'Tiếng Việt',
        ],
    ],
];
