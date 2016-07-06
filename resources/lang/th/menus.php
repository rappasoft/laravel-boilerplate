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
            'title' => 'Access Management',

            'permissions' => [
                'all' => 'All Permissions',
                'create' => 'Create Permission',
                'edit' => 'Edit Permission',
                'groups' => [
                    'all' => 'All Groups',
                    'create' => 'Create Group',
                    'edit' => 'Edit Group',
                    'main' => 'Groups',
                ],
                'main' => 'Permissions',
                'management' => 'Permission Management',
            ],

            'roles' => [
                'all' => 'Role ทั้งหมด',
                'create' => 'สร้าง Role',
                'edit' => 'แก้ไข Role',
                'management' => 'จัดการ Role',
                'main' => 'Roles',
            ],

            'users' => [
                'all' => 'ผู้ใช้งานทั้งหมด',
                'change-password' => 'เปลี่ยนรหัสผ่าน',
                'create' => 'สร้างผู้ใช้งาน',
                'deactivated' => 'ผู้ใช้งานที่ถูก deactivated',
                'deleted' => 'ผู้ใช้งานที่ถูกลบ',
                'edit' => 'แก้ไขผู้ใช้งาน',
                'main' => 'ผู้ใช้งาน',
            ],
        ],

        'log-viewer' => [
            'main' => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs' => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general' => 'ทั่วไป',
        ],
    ],

    'language-picker' => [
        'language' => 'ภาษา',
        /**
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'da' => 'Danish',
            'de' => 'German',
            'en' => 'English',
            'es' => 'Spanish',
            'fr' => 'French',
            'it' => 'Italian',
            'pt-BR' => 'Brazilian Portuguese',
            'sv' => 'Swedish',
			'th' => 'ไทย',
        ],
    ],
];
