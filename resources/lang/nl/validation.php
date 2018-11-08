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

    'accepted'             => ':attribute moet geaccepteerd worden.',
    'active_url'           => ':attribute is geen geldige URL.',
    'after'                => ':attribute moet een datum na :date zijn.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => ':attribute mag alleen letters bevatten.',
    'alpha_dash'           => ':attribute mag alleen letters, cijfers en koppeltekens bevatten.',
    'alpha_num'            => ':attribute mag alleen letters, cijfers bevatten',
    'array'                => ':attribute moet een array zijn.',
    'before'               => ':attribute moet een datum voor :date zijn.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => ':attribute moet tussen :min en :max liggen.',
        'file'    => ':attribute moet tussen :min and :max kilobytes liggen.',
        'string'  => ':attribute moet tussen de :min en :max karakters hebben.',
        'array'   => ':attribute moet tussen :min en :max items hebben.',
    ],
    'boolean'              => ':attribute veld moet waar of onwaar zijn.',
    'confirmed'            => ':attribute bevestiging komt niet overeen.',
    'date'                 => ':attribute bevat geen geldige datum.',
    'date_format'          => ':attribute komt niet overeen met het formaat :format.',
    'different'            => ':attribute en :other mogen niet gelijk zijn.',
    'digits'               => ':attribute moet :digits cijfers bevatten.',
    'digits_between'       => ':attribute moet tussen :min and :max cijfers bevatten.',
    'dimensions'           => ':attribute heeft ongeldige afbeelding dimensies.',
    'distinct'             => ':attribute bevat een duplicate waarde.',
    'email'                => ':attribute moet een geldig e-mail adres zijn.',
    'exists'               => 'Het geselecteerde :attribute is ongeldig.',
    'file'                 => ':attribute moet een bestand zijn.',
    'filled'               => ':attribute veld is verplicht.',
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
    'image'                => ':attribute moet een afbeelding zijn.',
    'in'                   => 'geselecteerd :attribute is ongeldig.',
    'in_array'             => ':attribute veld bestaat niet in :other.',
    'integer'              => ':attribute moet een heel getal zijn .',
    'ip'                   => ':attribute moet een geldig IP adres zijn.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => ':attribute moet een geldige JSON string zijn.',
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
        'numeric' => ':attribute mag niet groter zijn dan :max.',
        'file'    => ':attribute mag niet groter zijn dan :max kilobytes.',
        'string'  => ':attribute mag niet groter zijn dan :max karakters.',
        'array'   => ':attribute mag niet meer dan :max items bevatten.',
    ],
    'mimes'                => ':attribute moet een bestand zijn van het type: :values.',
    'min'                  => [
        'numeric' => ':attribute moet minimaal :min zijn.',
        'file'    => ':attribute moet minimaal :min kilobytes zijn.',
        'string'  => ':attribute moet minimaal :min karakters zijn.',
        'array'   => ':attribute moet ten minste :min items bevatten.',
    ],
    'not_in'               => 'Het geselcteerde :attribute is ongeldig.',
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => ':attribute moet numeriek zijn.',
    'present'              => ':attribute veld is verplicht.',
    'regex'                => ':attribute formaat is ongeldig.',
    'required'             => ':attribute veld is verplicht.',
    'required_if'          => ':attribute veld is verplicht wanneer :other :value is.',
    'required_unless'      => ':attribute veld is verplicht behalve wanneer:other :values is.',
    'required_with'        => ':attribute veld is verplicht wanneer :values aanwezig is.',
    'required_with_all'    => ':attribute veld is verplicht wanneer :values aanwezig is.',
    'required_without'     => ':attribute veld is verplicht wanneer :values niet aanwezig is.',
    'required_without_all' => ':attribute veld is verplicht wanneer geen van :values aanwezig zijn.',
    'same'                 => ':attribute en :other moeten overeenkomen.',
    'size'                 => [
        'numeric' => ':attribute moet :size zijn.',
        'file'    => ':attribute moet :size kilobytes zijn.',
        'string'  => ':attribute moet :size karakters bevatten.',
        'array'   => ':attribute moet :size items bevatten.',
    ],
    'string'               => ':attribute moet een string zijn.',
    'timezone'             => ':attribute moet een geldige tijdzone bevatten.',
    'unique'               => ':attribute is al in gebruik.',
    'url'                  => ':attribute formaat is ongeldig.',
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
            'rule-name' => 'Individueel-bericht',
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
                    'associated_roles' => 'Geassocieerde Rollen',
                    'dependencies'     => 'Afhankelijkheden',
                    'display_name'     => 'Weergave Naam',
                    'group'            => 'Groep',
                    'group_sort'       => 'Groep Sorteren',

                    'groups' => [
                        'name' => 'Groep Naam',
                    ],

                    'name'   => 'Naam',
                    'system' => 'Systeem?',
                ],

                'roles' => [
                    'associated_permissions' => 'Geassocieerde Permissies',
                    'name'                   => 'Naam',
                    'sort'                   => 'Sorteren',
                ],

                'users' => [
                    'active'                  => 'Actief',
                    'associated_roles'        => 'Geassocieerde Rollen',
                    'confirmed'               => 'Bevestigd',
                    'email'                   => 'E-mail Adres',
                    'first_name'              => 'Voornaam',
                    'last_name'               => 'Achternaam',
                    'name'                    => 'Naam',
                    'other_permissions'       => 'Overige Permissies',
                    'password'                => 'Wachtwoord',
                    'password_confirmation'   => 'Wachtwoord bevestiging',
                    'send_confirmation_email' => 'Stuur Bevestigings E-mail',
                ],
            ],
        ],

        'frontend' => [
            'email'                     => 'E-mail Adres',
            'first_name'                => 'Voornaam',
            'last_name'                 => 'Achternaam',
            'name'                      => 'Naam',
            'password'                  => 'Wachwoord',
            'password_confirmation'     => 'Wachtwoord Bevestiging',
            'phone' => 'Phone',
            'message' => 'Message',
            'old_password'              => 'Oud Wachtwoord',
            'new_password'              => 'Nieuw Wachtwoord',
            'new_password_confirmation' => 'Nieuw Wachtwoord Bevestigen',
        ],
    ],

];
