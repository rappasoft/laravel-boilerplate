<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы названий Labels
    |--------------------------------------------------------------------------
    |
    | Следующие языковые ресурсы используются в названиях
    | Labels всего вашего приложения.
    | Вы можете свободно изменять эти языковые ресурсы в соответствии
    | с требованиями вашего приложения.
    |
    */

    'general' => [
        'all'       => 'Все',
        'yes'       => 'Да',
        'no'        => 'Нет',
        'copyright' => 'Copyright',
        'custom'    => 'Выборочно',
        'actions' => 'Действие',
        'active'  => 'Активирован',
        'buttons' => [
            'save'   => 'Сохранить',
            'update' => 'Обновить',
        ],
        'hide'     => 'Скрыть',
        'inactive' => 'Неактивен',
        'none'              => 'Нет',
        'show'              => 'Показать',
        'toggle_navigation' => 'Навигация',
    ],

    'backend'  => [
        'access' => [
            'roles' => [
                'create'     => 'Создать новую роль',
                'edit'       => 'Изменить роль',
                'management' => 'Доступ',
                'table'      => [
                    'number_of_users' => 'Пользователей',
                    'permissions'     => 'Разрешения',
                    'role'            => 'Роль',
                    'sort'            => 'Позиция',
                    'total'           => 'ролей всего|всего ролей',
                ],
            ],
            'users' => [
                'active'              => 'Активные пользователи',
                'all_permissions'     => 'Полный доступ',
                'change_password'     => 'Изменение пароля',
                'change_password_for' => 'Изменить пароль :user',
                'create'              => 'Создать учётную запись',
                'deactivated'         => 'Заблокированные пользователи',
                'deleted'             => 'Удаленные пользователи',
                'edit'                => 'Редактирование учётной записи',
                'management'          => 'Пользователи',
                'no_permissions'      => 'Нет разрешений',
                'no_roles'            => 'Невозможно присвоить роль.',
                'permissions'         => 'Разрешения',
                'table'               => [
                    'confirmed'         => 'Подтверждён',
                    'created'           => 'Создан',
                    'email'             => 'E-mail',
                    'id'                => 'ID',
                    'last_updated'      => 'Обновлён',
                    'name'              => 'Логин',
                    'first_name'        => 'Имя',
                    'last_name'         => 'Фамилия',
                    'no_deactivated'    => 'Нет заблокированных пользователей',
                    'no_deleted'        => 'Нет удаленных пользователей',
                    'other_permissions' => 'Другие Разрешения',
                    'permissions'       => 'Разрешения',
                    'roles'             => 'Роль',
                    'social'            => 'Социальный аккаунт',
                    'total'             => 'пользователей всего|всего пользователей',
                ],
                'tabs'                => [
                    'titles'  => [
                        'history'  => 'История',
                        'overview' => 'Обзор',
                    ],
                    'content' => [
                        'overview' => [
                            'avatar'       => 'Аватар',
                            'confirmed'    => 'Подтверждён',
                            'created_at'   => 'Создан',
                            'deleted_at'   => 'Удалён',
                            'email'        => 'E-mail',
                            'last_login_at' => 'Last Login At',
                            'last_login_ip' => 'Last Login IP',
                            'last_updated' => 'Обновлён',
                            'name'         => 'Логин',
                            'first_name'   => 'Имя',
                            'last_name'    => 'Фамилия',
                            'status'       => 'Статус',
                            'timezone'     => 'Timezone',
                        ],
                    ],
                ],
                'view'                => 'Просмотр учётной записи',
            ],
        ],
    ],
    'frontend' => [
        'auth' => [
            'login_box_title'    => 'Вход',
            'login_button'       => 'Вход',
            'login_with'         => 'Вход из :social_media',
            'register_box_title' => 'Регистрация',
            'register_button'    => 'Зарегистрироваться',
            'remember_me'        => 'Запомнить меня',
        ],

        'contact' => [
            'box_title' => 'Контакт',
            'button'    => 'Отправить',
        ],

        'passwords' => [
            'expired_password_box_title'      => 'Срок действия изменения пароля истек.',
            'forgot_password'                 => 'Забыли Пароль?',
            'reset_password_box_title'        => 'Сброс Пароля',
            'reset_password_button'           => 'Смена пароля',
            'update_password_button'          => 'Обновить пароль',
            'send_password_reset_link_button' => 'Отправить',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Изменить пароль',
            ],
            'profile'   => [
                'avatar'             => 'Аватар',
                'created_at'         => 'Создан',
                'edit_information'   => 'Редактирование информации',
                'email'              => 'E-mail',
                'last_updated'       => 'Обновлён',
                'name'               => 'Логин',
                'first_name'         => 'Имя',
                'last_name'          => 'Фамилия',
                'update_information' => 'Обновление информации',
            ],
        ],
    ],
];
