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

    'actions' => 'Akcje',
    'permissions' => [
        'name' => 'Nazwa',
        'permission' => 'Uprawnienia',
        'dependencies' => 'Zależności uprawnień',
        'roles' => 'Role',
        'system' => 'System?',
        'total' => 'uprawnienia razem',
        'users' => 'Użytkownicy',
        'group' => 'Grupa',
        'group-sort' => 'Sortowanie grupy', //TODO
        'groups' => [
            'name' => 'Nazwa grupy',
        ],
    ],
    'roles' => [
        'number_of_users' => 'Liczba użytkowników',
        'permissions' => 'Uprawnienia',
        'role' => 'Role',
        'total' => 'role razem',
        'sort' => 'Sortuj', //TODO
    ],
    'users' => [
        'confirmed' => 'Potwierdzony',
        'created' => 'Stworzony',
        'delete_permanently' => 'Usuń permanentnie',
        'email' => 'E-mail',
        'id' => 'ID',
        'last_updated' => 'Ostatnio zaktualizowany',
        'name' => 'Nazwa',
        'no_banned_users' => 'Brak zbanowanych użytkowników',
        'no_deactivated_users' => 'Brak dezaktywowanych użytkowników',
        'no_deleted_users' => 'Brak usuniętych użytkowników',
        'other_permissions' => 'Inne uprawnienia',
        'restore_user' => 'Przywróć użytkownika',
        'roles' => 'Role',
        'total' => 'użytkownicy razem',
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
    'activate_user_button' => 'Aktywuj użytkownika',
    'ban_user_button' => 'Zbanuj użytkownika',
    'change_password_button' => 'Zmień hasło',
    'deactivate_user_button' => 'Dezaktywuj użytkownika',
    'delete_button' => 'Usuń',
    'edit_button' => 'Edytuj',

];
