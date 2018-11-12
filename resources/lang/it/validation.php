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
    'active_url'           => ':attribute non è un URL valido.',
    'after'                => ':attribute deve essere una data successiva a :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => ':attribute può contenere solo lettere.',
    'alpha_dash'           => ':attribute può contenere solo lettere, numeri e trattini.',
    'alpha_num'            => ':attribute può contenere solo lettere e numeri.',
    'array'                => ':attribute deve essere un array.',
    'before'               => ':attribute deve essere una data precedente al :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => ':attribute deve avere un valore tra :min e :max.',
        'file'    => ':attribute deve essere tra :min e :max kilobytes.',
        'string'  => ':attribute deve avere tra :min e :max caratteri.',
        'array'   => ':attribute deve contenere tra :min e :max elementi.',
    ],
    'boolean'              => ':attribute può essere solo vero o falso.',
    'confirmed'            => 'La conferma di :attribute non corrisponde.',
    'date'                 => ':attribute non è una data valida.',
    'date_format'          => ':attribute non corrisponde al formato :format.',
    'different'            => ':attribute e :other devono essere diversi.',
    'digits'               => ':attribute deve avere :digits cifre.',
    'digits_between'       => ':attribute deve avere tra :min e :max cifre.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => ':attribute deve essere un indirizzo email valido.',
    'exists'               => 'La selezione per :attribute non è valida.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => ':attribute è obbligatorio.',
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
    'image'                => ":attribute deve essere un'immagine.",
    'in'                   => 'La selezione per :attribute non è valida.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => ':attribute deve essere un numero intero.',
    'ip'                   => ':attribute deve essere un indirizzo IP valido.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => ':attribute deve essere una stringa JSON valida.',
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
        'numeric' => ':attribute non può essere più grande di :max.',
        'file'    => ':attribute non può superare i :max kilobytes.',
        'string'  => ':attribute non può superare i :max caratteri.',
        'array'   => ':attribute non può avere più di :max elementi.',
    ],
    'mimes'                => ':attribute deve essere un file di questo formato: :values.',
    'min'                  => [
        'numeric' => ':attribute deve essere almeno :min.',
        'file'    => ':attribute deve essere di almeno :min kilobytes.',
        'string'  => ':attribute deve contenere almeno :min caratteri.',
        'array'   => ':attribute deve avere almeno :min elementi.',
    ],
    'not_in'               => 'Il valore selezionato per :attribute non è valido.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => ':attribute deve essere un numero.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'Il formato di :attribute non è valido.',
    'required'             => ':attribute è richiesto.',
    'required_if'          => ':attribute è richiesto quando :other è :value.',
    'required_unless'      => ':attribute è richiesto se :other non è tra :values.',
    'required_with'        => ':attribute è richiesto quando :values è presente.',
    'required_with_all'    => ':attribute è richiesto quando :values è presente.',
    'required_without'     => ':attribute è richiesto quando :values non è presente.',
    'required_without_all' => ':attribute è richiesto quando nessuno tra :values è presente.',
    'same'                 => ':attribute e :other devono essere identici.',
    'size'                 => [
        'numeric' => ':attribute deve essere :size.',
        'file'    => ':attribute deve essere di :size kilobytes.',
        'string'  => ':attribute deve contenere :size caratteri.',
        'array'   => ':attribute deve contenere :size elementi.',
    ],
    'string'               => ':attribute deve essere una stringa.',
    'timezone'             => ':attribute deve essere un fuso orario valido.',
    'unique'               => ':attribute è già stato utilizzato.',
    'url'                  => 'Il formato di :attribute non è valido.',
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

        'backend' => [
            'access' => [
                'permissions' => [
                    'associated_roles' => 'Ruoli associati',
                    'dependencies'     => 'Dipendenze',
                    'display_name'     => 'Nome visualizzato',
                    'group'            => 'Gruppo',
                    'group_sort'       => 'Ordina gruppo',

                    'groups' => [
                        'name' => 'Nome gruppo',
                    ],

                    'name'   => 'Nome',
                    'system' => 'Sistema?',
                ],

                'roles' => [
                    'associated_permissions' => 'Permessi associati',
                    'name'                   => 'Nome',
                    'sort'                   => 'Ordina',
                ],

                'users' => [
                    'active'                  => 'Attivo',
                    'associated_roles'        => 'Ruoli associati',
                    'confirmed'               => 'Confermato',
                    'email'                   => 'Indirizzo e-mail',
                    'name'                    => 'Nome',
                    'other_permissions'       => 'Altri permessi',
                    'password'                => 'Password',
                    'password_confirmation'   => 'Conferma password',
                    'send_confirmation_email' => 'Invia e-mail di conferma',
                ],
            ],
        ],

        'frontend' => [
            'email'                     => 'Indirizzo e-mail',
            'name'                      => 'Nome',
            'password'                  => 'Password',
            'password_confirmation'     => 'Conferma password',
            'phone' => 'Phone',
            'message' => 'Message',
            'old_password'              => 'Vecchia password',
            'new_password'              => 'Nuova password',
            'new_password_confirmation' => 'Conferma nuova password',
        ],
    ],

];
