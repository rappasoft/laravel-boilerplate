<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы названий менюшек
    |--------------------------------------------------------------------------
    |
    | Следующие языковые ресурсы используются в названиях
    | менюшек всего вашего приложения.
    | Вы можете свободно изменять эти языковые ресурсы в соответствии
    | с требованиями вашего приложения.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'Администрирование',
            'roles' => [
                'all' => 'Все роли',
                'create' => 'Создать роль',
                'edit' => 'Редактировать роль',
                'management' => 'Управление доступом',
                'main' => 'Роли',
            ],
            'users' => [
                'all' => 'Все пользователи',
                'change-password' => 'Изменить пароль',
                'create' => 'Создать пользователя',
                'deactivated' => 'Заблокированные пользователи',
                'deleted' => 'Удаленные пользователи',
                'edit' => 'Редактирование учётной записи',
                'main' => 'Пользователи',
                'view' => 'Просмотр учётной записи',
            ],
        ],
        'log-viewer' => [
            'main' => 'Журнал ошибок',
            'dashboard' => 'Обзор',
            'logs' => 'Все записи',
        ],
        'sidebar' => [
            'dashboard' => 'Системная панель',
            'general' => 'Главная',
            'system' => 'Система',
        ],
    ],
    'language-picker' => [
        'language' => 'Язык',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'ar' => 'Арабский (Arabic)',
            'zh' => 'Китайский (Chinese Simplified)',
            'zh-TW' => 'Китайский (Chinese Traditional)',
            'da' => 'Датский (Danish)',
            'de' => 'Немецкий (German)',
            'el' => 'Греческий (Greek)',
            'en' => 'Английский (English)',
            'es' => 'Испанский (Spanish)',
            'fa' => 'персидский (Persian)',
            'fr' => 'Французский (French)',
            'he' => 'иврит (Hebrew)',
            'id' => 'Индонезийский (Indonesian)',
            'it' => 'Итальянский (Italian)',
            'ja' => 'Японский (Japanese)',
            'nl' => 'Голландский (Dutch)',
            'no' => 'норвежский (Norwegian)',
            'pt_BR' => 'Бразильский Португальский (Brazilian Portuguese)',
            'ru' => 'Русский (Russian)',
            'sv' => 'Шведский (Swedish)',
            'th' => 'Тайский (Thai)',
            'tr' => 'Турецкий (Turkish)',
            'uk' => 'Украинский (Ukrainian)',
        ],
    ],
];
