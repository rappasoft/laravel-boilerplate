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

    'accepted'             => 'El campo :attribute debe ser aceptado.',
    'active_url'           => 'El campo :attribute no es una URL válida.',
    'after'                => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal'       => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha'                => 'El campo :attribute sólo debe contener letras.',
    'alpha_dash'           => 'El campo :attribute sólo debe contener letras, números y barras.',
    'alpha_num'            => 'El campo :attribute sólo debe contener letras y números.',
    'array'                => 'El campo :attribute debe ser una lista.',
    'before'               => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal'      => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between'              => [
        'numeric' => 'El campo :attribute debe ser un número entre :min y :max.',
        'file'    => 'El campo :attribute debe ser entre :min y :max kilobytes.',
        'string'  => 'El campo :attribute debe ser entre :min y :max caracteres.',
        'array'   => 'El campo :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean'              => 'El campo :attribute debe ser booleano.',
    'confirmed'            => 'El campo :attribute de confirmación no coincide.',
    'date'                 => 'El campo :attribute no es una fecha válida.',
    'date_format'          => 'La fecha :attribute debe coincidir con el formato :format.',
    'different'            => 'El campo :attribute y :other deben ser diferentes.',
    'digits'               => 'El número :attribute debe tener :digits dígitos.',
    'digits_between'       => 'El número :attribute debe tener entre :min y :max dígitos.',
    'dimensions'           => 'El :attribute contiene dimensiones de imagen invalidas.',
    'distinct'             => 'El campo :attribute contiene un valor duplicado.',
    'email'                => 'El campo :attribute debe contener un e-mail válido.',
    'exists'               => 'El campo :attribute seleccionado es inválido.',
    'file'                 => 'El :attribute debe ser un archivo.',
    'filled'               => 'El campo :attribute es obligatorio.',
    'gt'                   => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file'    => 'The :attribute must be greater than :value kilobytes.',
        'string'  => 'The :attribute must be greater than :value characters.',
        'array'   => 'The :attribute must have more than :value items.',
    ],
    'gte'                  => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file'    => 'The :attribute must be greater than or equal :value kilobytes.',
        'string'  => 'The :attribute must be greater than or equal :value characters.',
        'array'   => 'The :attribute must have :value items or more.',
    ],
    'image'                => 'El campo :attribute debe contener una imagen.',
    'in'                   => 'El :attribute seleccionado no es válido.',
    'in_array'             => 'El campo :attribute no existen en :other.',
    'integer'              => 'El campo :attribute debe ser un número entero.',
    'ip'                   => 'El campo :attribute debe contener una dirección IP válida.',
    'ipv4'                 => 'El campo :attribute debe contener una Dirección IPv4 válida.',
    'ipv6'                 => 'El campo :attribute debe contener una Dirección IPv6 válida.',
    'json'                 => 'El campo :attribute debe contener un JSON válido.',
    'lt'                   => [
        'numeric' => 'The :attribute must be less than :value.',
        'file'    => 'The :attribute must be less than :value kilobytes.',
        'string'  => 'The :attribute must be less than :value characters.',
        'array'   => 'The :attribute must have less than :value items.',
    ],
    'lte'                  => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file'    => 'The :attribute must be less than or equal :value kilobytes.',
        'string'  => 'The :attribute must be less than or equal :value characters.',
        'array'   => 'The :attribute must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => 'El número :attribute no debe ser mayor que :max.',
        'file'    => 'El fichero :attribute no debe ser mayor que :max kilobytes.',
        'string'  => 'El texto :attribute debe tener menos de :max caracteres.',
        'array'   => 'La lista :attribute debe contener menos de :max elemnetos.',
    ],
    'mimes'                => 'El fichero :attribute debe tener el formato/s :values.',
    'min'                  => [
        'numeric' => 'El número :attribute debe ser mayor o igual a :min.',
        'file'    => 'El fichero :attribute debe ser mayor o igual a :min kilobytes.',
        'string'  => 'El texto :attribute debe tener, al menos, :min caracteres.',
        'array'   => 'La lista :attribute debe contener, al menos :min elemnetos.',
    ],
    'not_in'               => 'El :attribute seleccionado no es válido.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => 'El campo :attribute debe ser un número.',
    'present'              => 'El campo :attribute debe estar presente.',
    'regex'                => 'El formato de :attribute no es válido.',
    'required'             => 'El campo :attribute es obligatorio.',
    'required_if'          => 'El campo :attribute es obligatorio cuando :other tiene valor :value.',
    'required_unless'      => 'El campo :attribute es obligatorio, excepto cuando :other esta en :values.',
    'required_with'        => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_with_all'    => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without'     => 'El campo :attribute es obligatorio cuando :values no están presentes.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values están presentes.',
    'same'                 => 'El campo :attribute y :other deben coincidir.',
    'size'                 => [
        'numeric' => 'El número :attribute debe tener :size caracteres.',
        'file'    => 'El fichero :attribute debe tener :size kilobytes.',
        'string'  => 'El texto :attribute debe tener :size caracteres.',
        'array'   => 'La lista :attribute debe contener :size elemnetos.',
    ],
    'string'               => 'El campo :attribute debe contener texto.',
    'timezone'             => 'El campo :attribute debe contener una zona horaria válida.',
    'unique'               => 'El campo :attribute ya está en uso.',
    'uploaded'             => 'El campo :attribute no se pudo actualizar.',
    'url'                  => 'El enlace :attribute debe tener un formato válido.',
    'uuid' => 'The :attribute must be a valid UUID.',

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
            'rule-name' => 'mensaje-personalizado',
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

        'backend' => [
            'access' => [
                'permissions' => [
                    'associated_roles' => 'Roles asociados',
                    'dependencies'     => 'Dependencias',
                    'display_name'     => 'Nombre a mostrar',
                    'group'            => 'Grupo',
                    'group_sort'       => 'Orden del Grupo',

                    'groups' => [
                        'name' => 'Nombre del Grupo',
                    ],

                    'name'   => 'Nombre',
                    'first_name' => 'Nombre',
                    'last_name'  => 'Apellidos',
                    'system' => 'Sistema?',
                ],

                'roles' => [
                    'associated_permissions' => 'Permisos asociados',
                    'name'                   => 'Nombre',
                    'sort'                   => 'Orden',
                ],

                'users' => [
                    'active'                  => 'Activo',
                    'associated_roles'        => 'Roles asociados',
                    'confirmed'               => 'Confirmado',
                    'email'                   => 'Dirección de Correo',
                    'name'                    => 'Nombre',
                    'last_name'               => 'Apellidos',
                    'first_name'              => 'Nombre',
                    'other_permissions'       => 'Otros Permisos',
                    'password'                => 'Contraseña',
                    'password_confirmation'   => 'Confirmación de la Contraseña',
                    'send_confirmation_email' => 'Enviar Correo de confirmación',
                    'timezone'                => 'Zona Horaria',
                    'language'                => 'Lenguaje',
                ],
            ],
        ],

        'frontend' => [
            'avatar'                    => 'Localización Avatar',
            'email'                     => 'Dirección de Correo',
            'first_name'                => 'Nombre',
            'last_name'                 => 'Apellidos',
            'name'                      => 'Nombre completo',
            'password'                  => 'Contraseña',
            'password_confirmation'     => 'Confirmación de la Contraseña',
            'phone'                     => 'Telefono',
            'message'                   => 'Mensaje',
            'old_password'              => 'Antigua Contraseña',
            'new_password'              => 'Nueva Contraseña',
            'new_password_confirmation' => 'Confirmación de la Nueva Contraseña',
            'timezone'                  => 'Zona Horaria',
            'language'                  => 'Lenguaje',
        ],
    ],

];
