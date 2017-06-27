<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы вывода оповещений
    |--------------------------------------------------------------------------
    |
    | Следующие языковые ресурсы используются для вывода
    | сообщений в различных сценариях CRUD.
    | Вы можете свободно изменять эти языковые ресурсы в соответствии
    | с требованиями вашего приложения.
    |
    */

    'backend'   => [
        'roles' => [
            'created'   => 'Новая роль создана.',
            'deleted'   => 'Роль удалена.',
            'updated'   => 'Роль обновлена.',
        ],
        'users' => [
            'cant_resend_confirmation' => 'The application is currently set to manually approve users.',
            'confirmation_email'    => 'Новые параметры для подтверждения отправлены на Ваш E-mail.',
            'confirmed'              => 'The user was successfully confirmed.',
            'created'               => 'Новый пользователь создан.',
            'deleted'               => 'Пользователь удален.',
            'deleted_permanently'   => 'Пользователь удален навсегда.',
            'restored'              => 'Пользователь восстановлен.',
            'session_cleared'      => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'               => 'Параметры пользователя обновлены.',
            'updated_password'      => 'Пароль пользователя обновлен.',
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
