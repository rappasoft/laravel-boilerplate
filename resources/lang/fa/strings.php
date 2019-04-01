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
                'delete_user_confirm' => 'آیا مطمئن هستید که می‌خواهید این کاربر را به طور دائم حذف کنید؟ هر کدام از قسمت‌هایی که به این کاربر ارجاع داده می‌شود احتمالا در معرض خطا خواهد بود و این کار قابل بازگشت نیست.',
                'if_confirmed_off' => '(اگر تاییده غیر فعال است)',
                'no_deactivated' => 'کاربر غیر فعالی وجود ندارد.',
                'no_deleted' => 'کاربر حذف شده‌ای وجود ندارد.',
                'restore_user_confirm' => 'آیا کاربر به حالت اصلی برگردانده شود?',
            ],
        ],

        'dashboard' => [
            'title' => 'داشبورد',
            'welcome' => 'خوش‌آمدید',
        ],

        'general' => [
            'all_rights_reserved' => 'همه حقوق محفوظ است.',
            'are_you_sure' => 'آیا مطمئن هستید که می‌خواهید این کار را انجام دهید؟',
            'boilerplate_link' => 'Laravel 5 Boilerplate',
            'continue' => 'ادامه',
            'member_since' => 'عضویت از',
            'minutes' => ' دقیقه',
            'search_placeholder' => 'جستجو ...',
            'timeout' => 'از آنجا که هیچ فعالیتی نداشتید، به دلایل امنیتی، به طور خودکار از سیستم خارج شدید ',

            'see_all' => [
                'messages' => 'نمایش همه پیام‌ها',
                'notifications' => 'نمایش همه',
                'tasks' => 'نمایش همه وظایف',
            ],

            'status' => [
                'online' => 'برخط',
                'offline' => 'برون‌خط',
            ],

            'you_have' => [
                'messages' => '{0} هیچ پیامی ندارید|{1} شما یک پیام دارید|[2,Inf] شما :number پیام دارید',
                'notifications' => '{0} هیچ اطلاعیه‌ای ندارید|{1} شما یک اطلاعیه دارید|[2,Inf] شما :number اطلاعیه دارید',
                'tasks' => '{0} هیچ وظیفه‌ای ندارید|{1} شما یک وظیفه دارید|[2,Inf] شما :number وظیفه دارید',
            ],
        ],

        'search' => [
            'empty' => 'لطفا یک واژه برای جستجو وارد کنید.',
            'incomplete' => 'شما باید منطق جستجوی خود را برای این سامانه بنویسید.',
            'title' => 'نتایج جستجو',
            'results' => 'نتایج جستجو برای :query',
        ],

        'welcome' => 'Welcome to the Dashboard',
    ],

    'emails' => [
        'auth' => [
            'account_confirmed' => 'حساب شما تایید شده است.',
            'error' => 'اوپس!',
            'greeting' => 'سلام!',
            'regards' => 'با احترام,',
            'trouble_clicking_button' => 'If you’re having trouble clicking the ":action_text" button, copy and paste the URL below into your web browser:',
            'thank_you_for_using_app' => 'تشکر از شما برای استفاده از برنامه ما!',

            'password_reset_subject' => 'باز نشانی گذرواژه',
            'password_cause_of_email' => 'You are receiving this email because we received a password reset request for your account.',
            'password_if_not_requested' => 'If you did not request a password reset, no further action is required.',
            'reset_password' => 'برای بازنشانی گذرواژه اینجا را کلیک کنید',

            'click_to_confirm' => 'برای تایید حساب خود، اینجا را کلیک کنید:',
        ],

        'contact' => [
            'email_body_title' => 'شما یک درخواست تماس دارید: در زیر جرئیات آن آمده است:',
            'subject' => 'یک :app_name ارسال درخواست تماس نو!',
        ],
    ],

    'frontend' => [
        'test' => 'تست',

        'tests' => [
            'based_on' => [
                'permission' => 'بر اساس مجوز - ',
                'role' => 'بر اساس نقش - ',
            ],

            'js_injected_from_controller' => 'Javascript Injected from a Controller',

            'using_blade_extensions' => 'Using Blade Extensions',

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
            'joined' => 'متصل',
        ],

        'user' => [
            'change_email_notice' => 'اگر شما رایانامه خود را تغییر دهید، تا زمانی که رایانامه جدید خود را تایید نکرده‌اید از سامانه خارج می‌شوید',
            'email_changed_notice' => 'شما باید قبل از ورود مجدد به سامانه، رایانامه جدید خود را تایید نمایید.',
            'profile_updated' => 'اطلاعات کاربری با موفقیت به‌روز شد.',
            'password_updated' => 'گذرواژه با موفقیت به‌روز شد.',
        ],

        'welcome_to' => 'خوش‌آمدید به :place',
    ],
];
