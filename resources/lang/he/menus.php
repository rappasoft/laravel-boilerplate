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
            'title' => 'ניהול גישה',

            'roles' => [
                'all' => 'כל התפקידים',
                'create' => 'יצירת תפקיד',
                'edit' => 'עריכת תפקיד',
                'management' => 'ניהול תפקידים',
                'main' => 'תפקידים',
            ],

            'users' => [
                'all' => 'כל המשתמשים',
                'change-password' => 'עדכון סיסמה',
                'create' => 'יצירת משתמש',
                'deactivated' => 'משתמשים לא פעילים',
                'deleted' => 'משתמשים שנמחקו',
                'edit' => 'עריכת משתמשים',
                'main' => 'משתמשים',
                'view' => 'הצג משתמש',
            ],
        ],

        'log-viewer' => [
            'main' => 'קורא דו&quot;חות',
            'dashboard' => 'לוח בקרה',
            'logs' => 'דו&quot;חות',
        ],

        'sidebar' => [
            'dashboard' => 'לוח בקרה',
            'general' => 'כללי',
            'history' => 'History',
            'system' => 'מערכת',
        ],
    ],

    'language-picker' => [
        'language' => 'שפה',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'ערבית (Arabic)',
            'zh' => 'סינית מופשטת (Chinese Simplified)',
            'zh-TW' => 'סינית מסורתית (Chinese Traditional)',
            'da' => 'דנית (Danish)',
            'de' => 'גרמנית (German)',
            'el' => 'יוונית (Greek)',
            'en' => 'אנגלית (English)',
            'es' => 'ספרדית (Spanish)',
            'fa' => 'פַּרסִית (Persian)',
            'fr' => 'צרפתית (French)',
            'he' => 'עברית (Hebrew)',
            'id' => 'אינדונזית (Indonesian)',
            'it' => 'איטלקית (Italian)',
            'ja' => 'יפנית (Japanese)',
            'nl' => 'הולנדית (Dutch)',
            'no' => 'נורווגית (Norwegian)',
            'pt_BR' => 'פורטוגזית ברזילאית (Brazilian Portuguese)',
            'ru' => 'רוסית (Russian)',
            'sv' => 'שוודית (Swedish)',
            'th' => 'תאית (Thai)',
            'tr' => 'תורכית (Turkish)',
            'uk' => '(Ukrainian)',
        ],
    ],
];
