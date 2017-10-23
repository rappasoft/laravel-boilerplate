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

            'roles' => [
                'all'        => 'Όλοι οι ρόλοι',
                'create'     => 'Δημιουργία ρόλου',
                'edit'       => 'Επεξεργασία ρόλου',
                'management' => 'Διαχείρηση ρόλων',
                'main'       => 'Ρόλοι',
            ],

            'users' => [
                'all'             => 'Όλοι οι χρήστες',
                'change-password' => 'Αλλαγή κωδικού',
                'create'          => 'Δημιουργία χρήστη',
                'deactivated'     => 'Ανενεργοί χρήστες',
                'deleted'         => 'Διεγραμμένοι χρήστες',
                'edit'            => 'Επεξεργασία χρήστη',
                'main'            => 'Χρήστες',
                'view'            => 'Δες το χρήστη',
            ],
        ],

        'log-viewer' => [
            'main'      => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs'      => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general'   => 'Γενικά',
            'system'    => 'Σύστημα',
        ],
    ],

    'language-picker' => [
        'language' => 'Γλώσσα',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar'    => 'Αραβικά (Arabic)',
            'zh'    => '(Chinese Simplified)',
            'zh-TW' => '(Chinese Traditional)',
            'da'    => 'Δανέζικα (Danish)',
            'de'    => 'Γερμανικά (German)',
            'el'    => 'Ελληνικά (Greek)',
            'en'    => 'Αγγλικά (English)',
            'es'    => 'Ισπανικά (Spanish)',
            'fr'    => 'Γαλλικά (French)',
            'id'    => 'Ινδονησίας (Indonesian)',
            'it'    => 'Ιταλικά (Italian)',
            'ja'    => '(Japanese)',
            'nl'    => 'Ολλανδικά (Dutch)',
            'pt_BR' => '(Brazilian Portuguese)',
            'ru'    => 'Ρωσικός (Russian)',
            'sv'    => 'Σουηδικά (Swedish)',
            'th'    => 'Ταιλανδέζικα (Thai)',
            'tr'    => '(Turkish)',
        ],
    ],
];
