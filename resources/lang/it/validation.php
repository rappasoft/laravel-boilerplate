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

    'accepted'             => ':attribute deve essere accettato.',
    'active_url'           => ':attribute deve essere un URL valido.',
    'after'                => ':attribute deve essere dopo :date.',
    'alpha'                => ':attribute può contenere solo lettere.',
    'alpha_dash'           => ':attribute può contenere lettere, numeri e trattini.',
    'alpha_num'            => ':attribute può contenere solo lettere e numeri.',
    'array'                => ':attribute deve essere un array.',
    'before'               => ':attribute deve essere una data prima di :date.',
    'between'              => [
        'numeric' => ':attribute deve essere tra :min e :max.',
        'file'    => ':attribute deve essere tra :min e :max kilobytes.',
        'string'  => ':attribute deve essere tra :min e :max caratteri.',
        'array'   => ':attribute deve avere tra :min e :max elementi.',
    ],
    'boolean'              => ':attribute deve essere vero o falso.',
    'confirmed'            => ':attribute deve essere identico alla conferma.',
    'date'                 => ':attribute non è una data valida.',
    'date_format'          => ':attribute non corrisponde al formato :format.',
    'different'            => ':attribute e :other devono essere diversi.',
    'digits'               => ':attribute deve avere :digits cifre.',
    'digits_between'       => ':attribute deve avere tra :min and :max cifre.',
    'email'                => ':attribute deve essere un indirizzo email valido.',
    'exists'               => ':attribute non è valido.',
    'filled'               => ':attribute è richiesto.',
    'image'                => ":attribute deve essere un'immagine.",
    'in'                   => ':attribute non è valido.',
    'integer'              => ':attribute deve essere un numero intero.',
    'ip'                   => ':attribute deve essere un indirizzo IP valido.',
    'json'                 => ':attribute deve essere a valid JSON string.',
    'max'                  => [
        'numeric' => ':attribute non può essere più grande di :max.',
        'file'    => ':attribute non può essere più grande di :max kilobytes.',
        'string'  => ':attribute non può essere più lungo di :max caratteri.',
        'array'   => ':attribute may not have more than :max items.',
    ],
    'mimes'                => ':attribute deve essere a file of type: :values.',
    'min'                  => [
        'numeric' => ':attribute deve essere at least :min.',
        'file'    => ':attribute deve essere at least :min kilobytes.',
        'string'  => ':attribute deve essere at least :min characters.',
        'array'   => ':attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => ':attribute deve essere a number.',
    'regex'                => ':attribute ha un formato non valido.',
    'required'             => ':attribute è richiesto.',
    'required_if'          => ':attribute è rihiesto quando :other è :value.',
    'required_with'        => ':attribute è richiesto quando :values è presente.',
    'required_with_all'    => ':attribute field is required when :values is present.',
    'required_without'     => ':attribute field is required when :values is not present.',
    'required_without_all' => ':attribute field is required when none of :values are present.',
    'same'                 => ':attribute and :other must match.',
    'size'                 => [
        'numeric' => ':attribute deve essere :size.',
        'file'    => ':attribute deve essere :size kilobytes.',
        'string'  => ':attribute deve essere :size characters.',
        'array'   => ':attribute deve contenere :size elementi.',
    ],
    'string'               => ':attribute deve essere a string.',
    'timezone'             => ':attribute deve essere a valid zone.',
    'unique'               => ':attribute has already been taken.',
    'url'                  => ':attribute format is invalid.',

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

    'attributes' => [],

];
