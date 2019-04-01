<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Мовні ресурси назв Ярликів (Labels)
    |--------------------------------------------------------------------------
    |
    | Наступні мовні ресурси використовуються в назвах
    | Ярликів (Labels) всієї вашої програми.
    | Ви можете вільно змінювати ці мовні ресурси відповідно до вимог
    | вашої програми.
    |
    */

    'general' => [
        'all' => 'Все',
        'yes' => 'Так',
        'no' => 'Ні',
        'copyright' => 'Авторське право',
        'custom' => 'Вибірково',
        'actions' => 'Дії',
        'active' => 'Активований',
        'buttons' => [
            'save' => 'Зберегти',
            'update' => 'Оновити',
        ],
        'hide' => 'Приховати',
        'inactive' => 'Неактивний',
        'show' => 'Показати',
        'toggle_navigation' => 'Переключити навігацію',
        'create_new' => 'Створити новий',
        'toolbar_btn_groups' => 'Панель інструментів із групами кнопок',
        'more' => 'Більше',
        'none' => 'Немає',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create' => 'Створити нову роль',
                'edit' => 'Змінити роль',
                'management' => 'Доступ',
                'table' => [
                    'number_of_users' => 'Кількість користувачів',
                    'permissions' => 'Дозволи',
                    'role' => 'Роль',
                    'sort' => 'Позиція',
                    'total' => 'ролей всього|всього ролей',
                ],
            ],
            'users' => [
                'active' => 'Активні користувачі',
                'all_permissions' => 'Повний доступ',
                'change_password' => 'Зміна паролю',
                'change_password_for' => 'Змінити пароль для :user',
                'create' => 'Створити обліковий запис',
                'deactivated' => 'Заблоковані Користувачі',
                'deleted' => 'Вилучені користувачі',
                'edit' => 'Редагування облікового запису',
                'management' => 'Користувачі',
                'no_permissions' => 'Немає дозволів',
                'no_roles' => 'Немає ролей для встановлення',
                'permissions' => 'Дозволи',
                'user_actions' => 'Дії над користувачем',
                'table' => [
                    'confirmed' => 'Підтверджено',
                    'created' => 'Створено',
                    'email' => 'E-mail',
                    'id' => 'ID',
                    'last_updated' => 'Останнє оновлення',
                    'name' => 'Логін',
                    'first_name' => 'Ім\'я',
                    'last_name' => 'Прізвище',
                    'no_deactivated' => 'Немає заблокованих користувачів',
                    'no_deleted' => 'Немає вилучених користувачів',
                    'other_permissions' => 'Інші дозволи',
                    'permissions' => 'Дозволи',
                    'roles' => 'Роль',
                    'social' => 'Соціальний аккаунт',
                    'total' => 'користувачів усього|усього користувачів',
                ],
                'tabs' => [
                    'titles' => [
                        'history' => 'Історія',
                        'overview' => 'Огляд',
                    ],
                    'content' => [
                        'overview' => [
                            'avatar' => 'Аватар',
                            'confirmed' => 'Підтверджено',
                            'created_at' => 'Створено',
                            'deleted_at' => 'Видалено',
                            'email' => 'E-mail',
                            'last_login_at' => 'Останній вхід у',
                            'last_login_ip' => 'Останній вхід з IP',
                            'last_updated' => 'Останнє оновлення',
                            'name' => 'Логін',
                            'first_name' => 'Ім\'я',
                            'last_name' => 'Прізвище',
                            'status' => 'Статус',
                            'timezone' => 'Часовий пояс',
                        ],
                    ],
                ],
                'view' => 'Переглянути обліковий запис',
            ],
        ],
    ],
    'frontend' => [
        'auth' => [
            'login_box_title' => 'Вхід',
            'login_button' => 'Увійти',
            'login_with' => 'Увійти за допомогою :social_media',
            'register_box_title' => 'Реєстрація',
            'register_button' => 'Зареєструватися',
            'remember_me' => 'Запам\'ятати мене',
        ],

        'contact' => [
            'box_title' => 'Зв\'яжіться з нами',
            'button' => 'Надіслати',
        ],

        'passwords' => [
            'expired_password_box_title' => 'Термін дії зміни пароля закінчився.',
            'forgot_password' => 'Забули Пароль?',
            'reset_password_box_title' => 'Скидання паролю',
            'reset_password_button' => 'Зміна пароля',
            'update_password_button' => 'Оновити пароль',
            'send_password_reset_link_button' => 'Надіслати',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Змінити пароль',
            ],
            'profile' => [
                'avatar' => 'Аватар',
                'created_at' => 'Створений',
                'edit_information' => 'Редагування інформації',
                'email' => 'E-mail',
                'last_updated' => 'Останнє оновлення',
                'name' => 'Логін',
                'first_name' => 'Ім\'я',
                'last_name' => 'Прізвище',
                'update_information' => 'Оновити інформацію',
            ],
        ],
    ],
];
