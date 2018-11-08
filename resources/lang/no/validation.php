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

    'accepted'             => ':attribute skal aksepteres.',
    'active_url'           => ':attribute er ikke en gyldig adresse.',
    'after'                => ':attribute skal være en dato etter :date.',
    'after_or_equal'       => ':attribute må være etter eller lik som :date.',
    'alpha'                => ':attribute må kun inneholde bokstaver.',
    'alpha_dash'           => ':attribute må kun inneholde bokstaver, tall og mellemstreger.',
    'alpha_num'            => ':attribute må kun inneholde bokstaver og tall.',
    'array'                => ':attribute skal være en liste.',
    'before'               => ':attribute skal være en dato før :date.',
    'before_or_equal'      => ':attribute må være en dato før eller lik som :date.',
    'between'              => [
        'numeric' => ':attribute skal være mellem :min og :max.',
        'file'    => ':attribute skal være mellem :min og :max kilobytes.',
        'string'  => ':attribute skal være mellem :min og :max tegn.',
        'array'   => ':attribute skal være mellem :min og :max elementer.',
    ],
    'boolean'              => ':attribute skal være sant eller falsk.',
    'confirmed'            => ':attribute bekreftelse passer ikke sammen.',
    'date'                 => ':attribute er ikke en gyldig dato.',
    'date_format'          => ':attribute passer ikke til formatet :format.',
    'different'            => ':attribute og :other skal være forskjellige.',
    'digits'               => ':attribute skal være på :digits cifre.',
    'digits_between'       => ':attribute skal være mellom :min og :max siffre.',
    'dimensions'           => ':attribute har ugyldige dimensioner.',
    'distinct'             => ':attribute skal være unik.',
    'email'                => ':attribute skal være en gyldig e-mailaddresse.',
    'exists'               => ':attribute finnes ikke.',
    'file'                 => ':attribute skal være en fil.',
    'filled'               => ':attribute skal utfyldes.',
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
    'image'                => ':attribute skal være et bilde.',
    'in'                   => ':attribute er ikke gyldig.',
    'in_array'             => ':attribute finnes ikke i :other.',
    'integer'              => ':attribute skal være et heltal.',
    'ip'                   => ':attribute skal være en gyldig IP-adresse.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => ':attribute skal være gyldig JSON format.',
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
        'numeric' => ':attribute må ikke være større enn :max.',
        'file'    => ':attribute må ikke være større enn :max kilobytes.',
        'string'  => ':attribute må ikke være længere enn :max tegn.',
        'array'   => ':attribute må ikke ha flere enn :max elementer.',
    ],
    'mimes'                => ':attribute skal være filtypen: :values.',
    'min'                  => [
        'numeric' => ':attribute skal være mindst :min.',
        'file'    => ':attribute skal være mindst :min kilobytes.',
        'string'  => ':attribute skal mindts være :min tegn.',
        'array'   => ':attribute skal ha mindst :min elementer.',
    ],
    'not_in'               => ':attribute er ikke gyldig.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => ':attribute skal være et tall.',
    'present'              => 'Feltet :attribute mangler.',
    'regex'                => ':attribute er ikke et gyldigt format.',
    'required'             => ':attribute er påkrevd.',
    'required_if'          => ':attribute er påkrevd når :other er :value.',
    'required_unless'      => ':attribute er påkrevd med mindre :other er :values.',
    'required_with'        => ':attribute er påkrevd når :values er tilgengelig.',
    'required_with_all'    => ':attribute er påkrevd når :values er tilgengelig.',
    'required_without'     => ':attribute er påkrevd når :values ikke er tilgengelig.',
    'required_without_all' => ':attribute er påkrevd når ingen av verdierne :values er tilgengelig.',
    'same'                 => ':attribute og :other skal være ens.',
    'size'                 => [
        'numeric' => ':attribute skal være :size.',
        'file'    => ':attribute skal være :size kilobytes.',
        'string'  => ':attribute skal ha :size tegn.',
        'array'   => ':attribute skal inneholde :size elementer.',
    ],
    'string'               => ':attribute skal være tekst.',
    'timezone'             => ':attribute skal være en gyldig tidssone.',
    'unique'               => ':attribute er allerede i bruk.',
    'url'                  => ':attribute er ikke i det riktig format.',
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
                    'associated_roles' => 'Tilknyttede Roller',
                    'dependencies'     => 'Avengigheter',
                    'display_name'     => 'Visningsnavn',
                    'group'            => 'Gruppe',
                    'group_sort'       => 'Gruppesortering',

                    'groups' => [
                        'name' => 'Gruppenavn',
                    ],

                    'name'   => 'Navn',
                    'system' => 'System?',
                ],

                'roles' => [
                    'associated_permissions' => 'Tilknyttede Rettigheter',
                    'name'                   => 'Navn',
                    'sort'                   => 'Sortér',
                ],

                'users' => [
                    'active'                  => 'Aktiv',
                    'associated_roles'        => 'Tilknyttede Roller',
                    'confirmed'               => 'Bekreftet',
                    'email'                   => 'E-mailadresse',
                    'first_name'              => 'Brukernavn',
                    'last_name'               => 'Etternavn',
                    'other_permissions'       => 'Andre Rettigheter',
                    'password'                => 'Passord',
                    'password_confirmation'   => 'Bekreft passord',
                    'send_confirmation_email' => 'Send bekrefelsesmail',
                ],
            ],
        ],

        'frontend' => [
            'email'                     => 'E-mailadresse',
            'first_name'                => 'Brukernavn',
            'last_name'                 => 'Etternavn',
            'password'                  => 'Passord',
            'password_confirmation'     => 'Bekreft passord',
            'phone' => 'Phone',
            'message' => 'Message',
            'old_password'              => 'Gammelt passord',
            'new_password'              => 'Nytt passord',
            'new_password_confirmation' => 'Bekreft nytt passord',
        ],
    ],
];
