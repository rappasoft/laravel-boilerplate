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

    'accepted' => 'El campo :attribute debe ser aceptado.',
    'active_url' => 'El campo :attribute no es una URL válida.',
    'after' => 'El campo :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El campo :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El campo :attribute solo debe contener letras.',
    'alpha_dash' => 'El campo :attribute solo debe contener letras, números y barras.',
    'alpha_num' => 'El campo :attribute solo debe contener letras y números.',
    'array' => 'El campo :attribute debe ser una lista.',
    'before' => 'El campo :attribute debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El campo :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El campo :attribute debe ser un número entre :min y :max.',
        'file' => 'El fichero del campo :attribute debe tener entre :min y :max kilobytes.',
        'string' => 'El campo :attribute debe tener entre :min y :max caracteres.',
        'array' => 'La lista :attribute debe contener entre :min y :max elementos.',
    ],
    'boolean' => 'El campo :attribute debe ser booleano.',
    'confirmed' => 'El campo :attribute de confirmación no coincide.',
    'date' => 'El campo :attribute no es una fecha válida.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'La fecha :attribute debe coincidir con el formato :format.',
    'different' => 'Los campos :attribute y :other deben ser diferentes.',
    'digits' => 'El número :attribute debe tener :digits dígitos.',
    'digits_between' => 'El número :attribute debe tener entre :min y :max dígitos.',
    'dimensions' => 'La imagen del campo :attribute tiene dimensiones inválidas.',
    'distinct' => 'El campo :attribute contiene un valor duplicado.',
    'email' => 'El campo :attribute debe contener un e-mail válido.',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => 'El campo :attribute seleccionado es inválido.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute es obligatorio.',
    'gt' => [
        'numeric' => 'El campo :attribute debe ser mayor que :value.',
        'file' => 'El fichero :attribute debe tener un tamaño de más de :value kilobytes.',
        'string' => 'El campo :attribute debe tener más de :value caracteres.',
        'array' => 'La lista :attribute debe tener más de :value elementos.',
    ],
    'gte' => [
        'numeric' => 'El campo :attribute debe ser mayor o igual que :value.',
        'file' => 'El fichero :attribute debe tener un tamaño mayor o igual de :value kilobytes.',
        'string' => 'El campo :attribute debe tener :value caracteres o más.',
        'array' => 'La lista :attribute debe tener :value elementos o más.',
    ],
    'image' => 'El campo :attribute debe contener una imagen.',
    'in' => 'El campo :attribute seleccionado no es válido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El campo :attribute debe ser un número entero.',
    'ip' => 'El campo :attribute debe contener una dirección IP válida.',
    'ipv4' => 'El campo :attribute debe contener una Dirección IPv4 válida.',
    'ipv6' => 'El campo :attribute debe contener una Dirección IPv6 válida.',
    'json' => 'El campo :attribute debe contener un JSON válido.',
    'lt' => [
        'numeric' => 'El campo :attribute debe ser menor que :value.',
        'file' => 'El fichero del campo :attribute debe tener un tamaño menor de :value kilobytes.',
        'string' => 'El campo :attribute debe tener menos de :value caracteres.',
        'array' => 'La lista :attribute debe tener menos de :value elementos.',
    ],
    'lte' => [
        'numeric' => 'El campo :attribute debe ser menor o igual que :value.',
        'file' => 'El fichero del campo :attribute debe tener un tamaño menor o igual de :value kilobytes.',
        'string' => 'El campo :attribute debe tener :value caracteres o menos.',
        'array' => 'La lista :attribute debe tener :value elementos o menos.',
    ],
    'max' => [
        'numeric' => 'El número :attribute no debe ser mayor que :max.',
        'file' => 'El fichero del campo :attribute no debe tener un tamaño mayor de :max kilobytes.',
        'string' => 'El texto :attribute debe tener menos de :max caracteres.',
        'array' => 'La lista :attribute debe contener menos de :max elementos.',
    ],
    'mimes' => 'El fichero :attribute debe tener el formato/s :values.',
    'min' => [
        'numeric' => 'El número :attribute debe ser mayor o igual que :min.',
        'file' => 'El fichero del campo :attribute debe tener un tamaño menor o igual de :min kilobytes.',
        'string' => 'El texto :attribute debe tener, al menos, :min caracteres.',
        'array' => 'La lista :attribute debe contener, al menos, :min elementos.',
    ],
    'not_in' => 'El campo :attribute seleccionado no es válido.',
    'not_regex' => 'El formato del campo :attribute no es válido.',
    'numeric' => 'El campo :attribute debe ser un número.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El formato del campo :attribute no es válido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other tiene valor :value.',
    'required_unless' => 'El campo :attribute es obligatorio, excepto cuando :other esta en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando :values están presentes.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no están presentes.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de :values están presentes.',
    'same' => 'Los campos :attribute y :other deben coincidir.',
    'size' => [
        'numeric' => 'El número :attribute debe tener :size caracteres.',
        'file' => 'El fichero :attribute debe tener :size kilobytes.',
        'string' => 'El texto :attribute debe tener :size caracteres.',
        'array' => 'La lista :attribute debe contener :size elementos.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'El campo :attribute debe contener texto.',
    'timezone' => 'El campo :attribute debe contener una zona horaria válida.',
    'unique' => 'El campo :attribute ya está en uso.',
    'uploaded' => 'El campo :attribute no se pudo actualizar.',
    'url' => 'El enlace :attribute debe tener un formato válido.',
    'uuid' => 'El campo :attribute debe ser un UUID válido.',

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

    'attributes' => [],
];
