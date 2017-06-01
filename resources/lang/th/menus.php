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
            'title' => 'การจัดการผู้ใช้และสิทธิ์',

            'roles' => [
                'all'        => 'บทบาททั้งหมด',
                'create'     => 'สร้างบทบาท',
                'edit'       => 'แก้ไขบทบาท',
                'management' => 'การจัดการบทบาท',
                'main'       => 'บทบาท',
            ],

            'users' => [
                'all'             => 'ผู้ใช้ทั้งหมด',
                'change-password' => 'เปลี่ยนรหัสผ่าน',
                'create'          => 'สร้างผู้ใช้',
                'deactivated'     => 'ผู้ใช้ที่ถูกพักการใช้งาน',
                'deleted'         => 'ผู้ใช้ที่ถูกลบ',
                'edit'            => 'แก้ไขผู้ใช้',
                'main'            => 'ผู้ใช้',
        'view'                    => 'แสดงผู้ใช้',
            ],
        ],

        'log-viewer' => [
            'main'      => 'แสดงข้อมูล Log',
            'dashboard' => 'แผงควบคุม',
            'logs'      => 'รายการล็อก',
        ],

        'sidebar' => [
            'dashboard' => 'แผงควบคุม',
            'general'   => 'ทั่วไป',
        'system'        => 'ระบบ',
        ],
    ],

    'language-picker' => [
        'language' => 'ภาษา',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'อารบิก (Arabic)',
            'zh'    => '(Chinese Simplified)',
            'zh-TW' => '(Chinese Traditional)',
            'da'    => 'เดนมา์ก (Danish)',
            'de'    => 'เยอรมัน (German)',
            'el'    => '(Greek)',
            'en'    => 'อังกฤษ (English)',
            'es'    => 'สเปน (Spanish)',
            'fr'    => 'ฝรั่งเศส (French)',
            'id'    => 'ชาวอินโดนีเซีย (Indonesian)',
            'it'    => 'อิตาลี (Italian)',
            'ja'    => '(Japanese)',
            'nl'    => 'ดัตช์ (Dutch)',
            'pt_BR' => 'โปรตุเกสแบบบราซิล (Brazilian Portuguese)',
            'ru'    => 'รัสเซีย (Russian)',
            'sv'    => 'สวีเดน (Swedish)',
            'th'    => 'ไทย (Thai)',
            'tr'    => '(Turkish)',
        ],
    ],
];
