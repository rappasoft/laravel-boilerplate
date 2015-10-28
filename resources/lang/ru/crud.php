<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CRUD Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in CRUD operations throughout the
    | system.
    | Regardless where it is placed, a CRUD label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'actions' => 'Действия',
    'permissions' => [
        'name' => 'Имя',
        'permission' => 'Разрешение',
        'roles' => 'Роли',
        'system' => 'Системное?',
        'total' => 'разрешений(ия) всего',
        'users' => 'Пользователи',
        'group' => 'Группа',
        'group-sort' => 'Сортировка группы',
        'groups' => [
            'name' => 'Имя группы',
        ],
    ],
    'roles' => [
        'number_of_users' => '# Пользователей',
        'permissions' => 'Разрешения',
        'role' => 'Роль',
        'total' => 'ролей(и) всего',
        'sort' => 'Сортировка',
    ],
    'users' => [
        'confirmed' => 'Подтвержден',
        'created' => 'Создан',
        'delete_permanently' => 'Удалить навсегда',
        'email' => 'E-mail',
        'id' => 'ID',
        'last_updated' => 'Последнее обновление',
        'name' => 'Имя',
        'no_banned_users' => 'Нет заблокированных пользователей',
        'no_deactivated_users' => 'Нет деактивированных пользователей',
        'no_deleted_users' => 'Нет удаленных пользователей',
        'other_permissions' => 'Другие разрешения',
        'restore_user' => 'Восстановить пользователя',
        'roles' => 'Роли',
        'total' => 'пользователей всего',
    ],

    /*
    |--------------------------------------------------------------------------
    | CRUD Language Lines outside view Files
    |--------------------------------------------------------------------------
    |
    | These lines are being marked as obsolete by the localization helper
    | because they will only be found outside view files.
    |
    */
    'activate_user_button' => 'Активировать пользователя',
    'ban_user_button' => 'Заблокировать пользователя',
    'change_password_button' => 'Сменить пароль',
    'deactivate_user_button' => 'Деактивировать пользователя',
    'delete_button' => 'Удалить',
    'edit_button' => 'Редактировать',

];
