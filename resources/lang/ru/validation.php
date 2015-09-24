<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute должен быть принят.',
    'active_url'           => ':attribute является недопустимым URL.',
    'after'                => ':attribute должен быть датой после :date.',
    'alpha'                => ':attribute должен содержать только буквы.',
    'alpha_dash'           => ':attribute должен содержать только буквы, цифры и дефис.',
    'alpha_num'            => ':attribute должен содержать только буквы и цифры.',
    'array'                => ':attribute должен быть массивом.',
    'before'               => ':attribute должен быть датой перед :date.',
    'between'              => [
        'numeric' => ':attribute должен быть между :min и :max.',
        'file'    => ':attribute должен быть между :min и :max килобайтами.',
        'string'  => ':attribute должен быть между :min и :max символами.',
        'array'   => ':attribute должен быть между :min и :max пунктами.',
    ],
    'boolean'              => ':attribute поле должно быть истинным или ложным.',
    'confirmed'            => ':attribute не совпадает с подтверждением.',
    'date'                 => ':attribute не является допустимой датой.',
    'date_format'          => ':attribute не совпадает с форматом :format.',
    'different'            => ':attribute и :other должны быть различны.',
    'digits'               => ':attribute должен содержать :digits цифр.',
    'digits_between'       => ':attribute должен быть между :min и :max цифрами.',
    'email'                => ':attribute должен быть допустимым e-mail адресом.',
    'exists'               => 'Выбранный :attribute недействителен.',
    'filled'               => ':attribute требуется.',
    'image'                => ':attribute должен быть изображением.',
    'in'                   => 'Выбранный атрибут :attribute недействителен.',
    'integer'              => ':attribute должен быть целым числом.',
    'ip'                   => ':attribute должен быть допустимым IP-адресом.',
    'json'                 => ':attribute должен быть допустимой JSON-строкой.',
    'max'                  => [
        'numeric' => ':attribute не должен быть больше чем :max.',
        'file'    => ':attribute не должен быть больше чем :max килобайт.',
        'string'  => ':attribute не должен быть больше чем :max символов.',
        'array'   => ':attribute не должен быть больше чем :max пунктов.',
    ],
    'mimes'                => ':attribute должен быть файлом с типом: :values.',
    'min'                  => [
        'numeric' => ':attribute должен быть не менее :min.',
        'file'    => ':attribute должен быть не менее :min килобайт.',
        'string'  => ':attribute должен быть не менее :min символов.',
        'array'   => ':attribute должен быть не менее :min пунктов.',
    ],
    'not_in'               => 'Выбранный :attribute недопустим.',
    'numeric'              => ':attribute должен быть числом.',
    'regex'                => 'Формат :attribute недопустим.',
    'required'             => 'Поле :attribute требуется.',
    'required_if'          => ':attribute field is required when :other is :value.',
    'required_with'        => 'Поле :attribute требуется, когда :values существует.',
    'required_with_all'    => 'Поле :attribute требуется, когда :values существуют.',
    'required_without'     => 'Поле :attribute требуется, когда :values не существует.',
    'required_without_all' => 'Поле :attribute требуется, когда ни одно из :values не существует.',
    'same'                 => ':attribute и :other должны совпадать.',
    'size'                 => [
        'numeric' => ':attribute должен быть :size.',
        'file'    => ':attribute должен быть :size килобайт.',
        'string'  => ':attribute должен быть :size символов.',
        'array'   => ':attribute должен содержать :size пунктов.',
    ],
    'string'               => ':attribute должен быть строкой.',
    'timezone'             => ':attribute должен быть действительной часовой зоной.',
    'unique'               => ':attribute не уникален.',
    'url'                  => 'Формат :attribute недействителен.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'Имя',
        'email' => 'Электронная почта',
        'password' => 'Пароль',
        'password_confirmation' => 'Подтверждение пароля',
        'old_password' => 'Старый пароль',
        'new_password' => 'Новый пароль',
        'new_password_confirmation' => 'Подтверждение нового пароля',
        'created_at' => 'Создано',
        'last_updated' => 'Последнее обновление',
        'actions' => 'Действия',
        'active' => 'Активен',
        'confirmed' => 'Подтвержден',
        'send_confirmation_email' => 'Отправить подтверждение по e-mail',
        'associated_roles' => 'Сопутствующие роли',
        'other_permissions' => 'Другие разрешения',
        'role_name' => 'Имя роли',
        'role_sort' => 'Сортировка роли',
        'associated_permissions' => 'Сопутствующие разрешения',
        'permission_name' => 'Имя разрешения',
        'display_name' => 'Отображаемое имя',
        'system_permission' => 'Системное разрешение?',
        'permission_group_name' => 'Имя группы',
        'group' => 'Группа',
        'group-sort' => 'Сортировка группы',
    ],

];
