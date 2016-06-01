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

    'accepted'             => 'Denne :attribute skal accepteres.',
    'active_url'           => 'Dette :attribute er ikke en gyldig URL.',
    'after'                => 'Datoen :attribute skal være en dato efter :date.',
    'alpha'                => ':attribute må kun indeholde bogstaver.',
    'alpha_dash'           => ':attribute må kun indehlde bogstaver, tal og streger.',
    'alpha_num'            => ':attribute må kun indeholde bogstaver og tal.',
    'array'                => ':attribute skal vøre en matrix.',
    'before'               => ':attribute skal være en dato før :date.',
    'between'              => [
        'numeric' => ':attribute skal være mellem :min og :max.',
        'file'    => ':attribute skal være mellem :min og :max kilobytes.',
        'string'  => ':attribute skal være mellem :min og :max karaktere.',
        'array'   => ':attribute skal have mellem :min og :max elementer.',
    ],
    'boolean'              => ':attribute feltet skal være sandt eller falsk.',
    'confirmed'            => ':attribute bekræftelse passer ikke sammen.',
    'date'                 => ':attribute er ikke en gyldig dato.',
    'date_format'          => ':attribute passer ikke titl formatet :format.',
    'different'            => ':attribute og :other skal være forskellig.',
    'digits'               => ':attribute skal have :digits cifre.',
    'digits_between'       => ':attribute skal være mellem :min og :max cifre.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => ':attribute skal være en gyldig email addresse.',
    'exists'               => 'Den valgte :attribute er ikke gyldig.',
    'filled'               => ':attribute feltet et påkrævet.',
    'image'                => ':attribute skal være et billed.',
    'in'                   => 'Den valgte :attribute er ikke gyldig.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => ':attribute skal være et heltal.',
    'ip'                   => ':attribute skal være en gyldig IP addresse.',
    'json'                 => ':attribute skal være en gyldig JSON streng.',
    'max'                  => [
        'numeric' => ':attribute må ikke være større end :max.',
        'file'    => ':attribute må ikke være større end :max kilobytes.',
        'string'  => ':attribute må ikke være længere end :max tegn.',
        'array'   => ':attribute må ikke have flere end :max elementer.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => ':attribute skal være mindst :min.',
        'file'    => ':attribute skal være mindst :min kilobytes.',
        'string'  => ':attribute skal mindts være :min tegn.',
        'array'   => ':attribute skal have mindst :min elementer.',
    ],
    'not_in'               => 'Den valgte :attribute er ikke gyldig.',
    'numeric'              => ':attribute skal være et tal.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => ':attribute format er ikke gyldig.',
    'required'             => ':attribute feltet et påkrævet.',
    'required_if'          => ':attribute feltet er påkrævet når :other er :value.',
    'required_unless'      => ':attribute feltet er påkrævet med mindre :other er :values.',
    'required_with'        => ':attribute feltet er påkrævet når :values er tilgængelig.',
    'required_with_all'    => ':attribute feltet er påkrævet når :values er tilgængelig.',
    'required_without'     => ':attribute feltet er påkrævet når :values ikke er tilgængelig.',
    'required_without_all' => ':attribute feltet er påkrævet når ingen af værdierne :values er tilgængelig.',
    'same'                 => ':attribute og :other skal være ens.',
    'size'                 => [
        'numeric' => ':attribute skal være :size.',
        'file'    => ':attribute skal værer :size kilobytes.',
        'string'  => ':attribute skal have :size tegn.',
        'array'   => ':attribute skal indeholde :size elementer.',
    ],
    'string'               => ':attribute skal være en tekst streng.',
    'timezone'             => ':attribute skal være en gyldig tidszone.',
    'unique'               => ':attribute er allerede i brug.',
    'url'                  => ':attribute er ikke i det rigtige format.',

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
                    'associated_roles' => 'Tilknyttede roller',
                    'dependencies' => 'Afhængigheder',
                    'display_name' => 'Visnings navn',
                    'group' => 'Grouppe',
                    'group_sort' => 'Gruppe sortering',

                    'groups' => [
                        'name' => 'Grouppe navn',
                    ],

                    'name' => 'Navn',
                    'system' => 'System?',
                ],

                'roles' => [
                    'associated_permissions' => 'Tilknyttede rettigheder',
                    'name' => 'Navn',
                    'sort' => 'Sorter',
                ],

                'users' => [
                    'active' => 'Aktiv',
                    'associated_roles' => 'Tilknyttede roller',
                    'confirmed' => 'Bekræftet',
                    'email' => 'E-mail address',
                    'name' => 'Navn',
                    'other_permissions' => 'Andre rettigheder',
                    'password' => 'Kodeord',
                    'password_confirmation' => 'Bekræft kodeord',
                    'send_confirmation_email' => 'Send bekræfelses e-mail',
                ],
            ],
        ],

        'frontend' => [
            'email' => 'E-mail adresse',
            'name' => 'Navn',
            'password' => 'Kodeord',
            'password_confirmation' => 'Bekræft kodeord',
            'old_password' => 'Gammelt kodeord',
            'new_password' => 'Nyt kodeord',
            'new_password_confirmation' => 'Bekræft nyt kodeord',
        ],
    ],

];
