<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Strings Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in strings throughout the system.
    | Regardless where it is placed, a string can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'users' => [
                'delete_user_confirm' => 'Are you sure you want to delete this user permanently? Anywhere in the application that references this user\'s id will most likely error. Proceed at your own risk. This can not be un-done.',
                'if_confirmed_off' => '(If confirmed is off)',
                'no_deactivated' => 'There are no deactivated users.',
                'no_deleted' => 'There are no deleted users.',
                'restore_user_confirm' => 'Restore this user to its original state?',
            ],
        ],

        'dashboard' => [
            'title' => 'Dashboard',
            'welcome' => 'Xoş gəldiniz',
        ],

        'general' => [
            'all_rights_reserved' => 'Bütün hüquqlar qorunur.',
            'are_you_sure' => 'Bunu etmək istədiyinizə əminsiniz?',
            'boilerplate_link' => 'Laravel Boilerplate',
            'continue' => 'Davam',
            'member_since' => 'Qeydiyyat vaxtı',
            'minutes' => ' dəqiqələr',
            'search_placeholder' => 'Axtar...',
            'timeout' => 'Sistemdə aktivliyiniz olmadığı üçün siz avtomatik çıxış etdiniz ',

            'see_all' => [
                'messages' => 'Bütün mesajlara bax',
                'notifications' => 'Hamısına bax',
                'tasks' => 'Bütün tapşırıqlara abx',
            ],

            'status' => [
                'online' => 'Xətdə',
                'offline' => 'Xətdən kənar',
            ],

            'you_have' => [
                'messages' => '{0} Mesajınız yoxdur|{1} 1 mesajınız var|[2,Inf] :number messages sayda mesajınız var',
                'notifications' => '{0} bildirişiniz yoxdur |{1} Sizin bir bildirişiniz var |[2,Inf] Sizin :number sayda mesajınız var',
                'tasks' => '{0} Sizin tapşırığınız yoxdur |{1} Sizin bir taskınız var |[2,Inf] Siz :number sayda tapşırığa maliksiniz',
            ],
        ],

        'search' => [
            'empty' => 'Axtarış üçün söz daxil edin.',
            'incomplete' => 'Bu axtarış sistemi üçün şəxsi axtarış məntiqinizi yazmalısınız.',
            'title' => 'Axtarış nəticələri',
            'results' => ':query açar sözü üçün nəticələr',
        ],

        'welcome' => 'Dashboarda xoş gəldiniz',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'Hesabınız təsdiqləndi.',
            'error' => 'Xəta!',
            'greeting' => 'Salam!',
            'regards' => 'Hörmətlə,',
            'trouble_clicking_button' => 'Əgər ":action_text" düyməsinə klik etməkdə çətinlik çəkirsizsə, aşağıdakı linki kopyalayıb brauzerdə daxil olun:',
            'thank_you_for_using_app' => 'Tətbiqetməmizi istifadə etdiyiniz üçün təşəkkür edirik!',

            'password_reset_subject' => 'Şifrəni sıfırla',
            'password_cause_of_email' => 'Biz şifrənin sıfırlanması üçün xahiş əldə etdik buna görədə siz bu emaili almısınız.',
            'password_if_not_requested' => 'Əgər şifrə sıfırlanması xahişi etməmisinizsə,heç bir hərəkət tələb edilmir.',
            'reset_password' => 'Şifrəni sıfırlamaq üçün bura klik edin',

            'click_to_confirm' => 'Hesabınızı təsdiqləmək üçün bura klik edin:',
        ],

        'contact' => [
            'email_body_title' => 'Sizin əlaqə formundan yeni istəyiniz var: Aşağıda detallara baxın:',
            'subject' => 'A new :app_name contact form submission!',
        ],
    ],

    'frontend' => [
        'test' => 'Test',

        'tests' => [
            'based_on' => [
                'permission' => 'İcazə əsaslı - ',
                'role' => 'Rol əsaslı - ',
            ],

            'js_injected_from_controller' => 'Controllerdən Javascript daxil edildi',

            'using_blade_extensions' => 'Blade əlavələrinin istifadəsi',

            'using_access_helper' => [
                'array_permissions' => 'Using Access Helper with Array of Permission Names or ID\'s where the user does have to possess all.',
                'array_permissions_not' => 'Using Access Helper with Array of Permission Names or ID\'s where the user does not have to possess all.',
                'array_roles' => 'Using Access Helper with Array of Role Names or ID\'s where the user does have to possess all.',
                'array_roles_not' => 'Using Access Helper with Array of Role Names or ID\'s where the user does not have to possess all.',
                'permission_id' => 'Using Access Helper with Permission ID',
                'permission_name' => 'Using Access Helper with Permission Name',
                'role_id' => 'Using Access Helper with Role ID',
                'role_name' => 'Using Access Helper with Role Name',
            ],

            'view_console_it_works' => 'View console, you should see \'it works!\' which is coming from FrontendController@index',
            'you_can_see_because' => 'You can see this because you have the role of \':role\'!',
            'you_can_see_because_permission' => 'You can see this because you have the permission of \':permission\'!',
        ],

        'general' => [
            'joined' => 'Qoşuldu',
        ],

        'user' => [
            'change_email_notice' => 'Email adresinizi dəyişdiyiniz halda yeni email adresini təsdiq edənə qədər çıxış etmiş olacaqsınız',
            'email_changed_notice' => 'Daxil olmamışdan əvvəl email təsdiqləməsi etməyiniz lazımdır',
            'profile_updated' => 'Profil uğurla yeniləndi.',
            'password_updated' => 'Şifrə uğurla yeniləndi.',
        ],

        'welcome_to' => 'Xoş Gəldiniz :place -ə',
    ],
];
