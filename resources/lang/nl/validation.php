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

    'accepted' => ':attribute moet geaccepteerd worden.',
    'active_url' => ':attribute is geen geldige URL.',
    'after' => ':attribute moet een datum na :date zijn.',
    'after_or_equal' => ':attribute moet een datum zijn dat gelijk of later is dan :date.',
    'alpha' => ':attribute mag alleen letters bevatten.',
    'alpha_dash' => ':attribute mag alleen letters, cijfers en koppeltekens bevatten.',
    'alpha_num' => ':attribute mag alleen letters, cijfers bevatten',
    'array' => ':attribute moet een array zijn.',
    'before' => ':attribute moet een datum voor :date zijn.',
    'before_or_equal' => ':attribute moet een datum zijn dat gelijk of eerder is dan :date.',
    'between' => [
        'numeric' => ':attribute moet tussen :min en :max liggen.',
        'file' => ':attribute moet tussen :min and :max kilobytes liggen.',
        'string' => ':attribute moet tussen de :min en :max karakters hebben.',
        'array' => ':attribute moet tussen :min en :max items hebben.',
    ],
    'boolean' => ':attribute veld moet waar of onwaar zijn.',
    'confirmed' => ':attribute bevestiging komt niet overeen.',
    'date' => ':attribute bevat geen geldige datum.',
    'date_equals' => ':attribute moet gelijk zijn aan :date.',
    'date_format' => ':attribute komt niet overeen met het formaat :format.',
    'different' => ':attribute en :other mogen niet gelijk zijn.',
    'digits' => ':attribute moet :digits cijfers bevatten.',
    'digits_between' => ':attribute moet tussen :min and :max cijfers bevatten.',
    'dimensions' => ':attribute heeft ongeldige afbeelding dimensies.',
    'distinct' => ':attribute bevat een duplicate waarde.',
    'email' => ':attribute moet een geldig e-mail adres zijn.',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => 'Het geselecteerde :attribute is ongeldig.',
    'file' => ':attribute moet een bestand zijn.',
    'filled' => ':attribute veld is verplicht.',
    'gt' => [
        'numeric' => ':attribute moet groter zijn dan :value.',
        'file' => ':attribute moet groter zijn dan :value kilobytes.',
        'string' => ':attribute mmoet meer dan :value karakters bevatten.',
        'array' => ':attribute moet meer dan :value items bevatten.',
    ],
    'gte' => [
        'numeric' => ':attribute moet minstens :value. zijn',
        'file' => ':attribute moet minstens :value kilobyte groot zijn.',
        'string' => ':attribute moet minstens :value karakters bevatten.',
        'array' => ':attribute moet minstels :value items hebben.',
    ],
    'image' => ':attribute moet een afbeelding zijn.',
    'in' => 'geselecteerd :attribute is ongeldig.',
    'in_array' => ':attribute veld bestaat niet in :other.',
    'integer' => ':attribute moet een heel getal zijn .',
    'ip' => ':attribute moet een geldig IP adres zijn.',
    'ipv4' => ':attribute moet een geldig IPv4-adres zijn.',
    'ipv6' => ':attribute moet een geldig IPv6-adres zijn.',
    'json' => ':attribute moet een geldige JSON string zijn.',
    'lt' => [
        'numeric' => ':attribute moet kleiner zijn dan :value.',
        'file' => ':attribute moet kleiner zijn dan :value kilobyte.',
        'string' => ':attribute mag maximaal :value karakters bevatten.',
        'array' => ':attribute mag maximaal :value items bevatten.',
    ],
    'lte' => [
        'numeric' => ':attribute moet minder zijn dan :value.',
        'file' => ':attribute moet kleiner zijn dan :value kilobyte.',
        'string' => ':attribute moet minstens :value karakters bevatten.',
        'array' => ':attribute mag niet meer dan :value items bevatten.',
    ],
    'max' => [
        'numeric' => ':attribute mag niet groter zijn dan :max.',
        'file' => ':attribute mag niet groter zijn dan :max kilobytes.',
        'string' => ':attribute mag niet groter zijn dan :max karakters.',
        'array' => ':attribute mag niet meer dan :max items bevatten.',
    ],
    'mimes' => ':attribute moet een bestand zijn van het type: :values.',
    'min' => [
        'numeric' => ':attribute moet minimaal :min zijn.',
        'file' => ':attribute moet minimaal :min kilobytes zijn.',
        'string' => ':attribute moet minimaal :min karakters zijn.',
        'array' => ':attribute moet ten minste :min items bevatten.',
    ],
    'not_in' => 'Het geselcteerde :attribute is ongeldig.',
    'not_regex' => 'het formaat van :attribute is niet correct.',
    'numeric' => ':attribute moet numeriek zijn.',
    'present' => ':attribute veld is verplicht.',
    'regex' => ':attribute formaat is ongeldig.',
    'required' => ':attribute veld is verplicht.',
    'required_if' => ':attribute veld is verplicht wanneer :other :value is.',
    'required_unless' => ':attribute veld is verplicht behalve wanneer:other :values is.',
    'required_with' => ':attribute veld is verplicht wanneer :values aanwezig is.',
    'required_with_all' => ':attribute veld is verplicht wanneer :values aanwezig is.',
    'required_without' => ':attribute veld is verplicht wanneer :values niet aanwezig is.',
    'required_without_all' => ':attribute veld is verplicht wanneer geen van :values aanwezig zijn.',
    'same' => ':attribute en :other moeten overeenkomen.',
    'size' => [
        'numeric' => ':attribute moet :size zijn.',
        'file' => ':attribute moet :size kilobytes zijn.',
        'string' => ':attribute moet :size karakters bevatten.',
        'array' => ':attribute moet :size items bevatten.',
    ],
    'starts_with' => ':attribute moet starten met: :values',
    'string' => ':attribute moet een string zijn.',
    'timezone' => ':attribute moet een geldige tijdzone bevatten.',
    'unique' => ':attribute is al in gebruik.',
    'url' => ':attribute formaat is ongeldig.',
    'uuid' => ':attribute moet een geldige UUID zijn.',

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
                    'dependencies' => 'Afhankelijkheden',
                    'display_name' => 'Weergave Naam',
                    'group' => 'Groep',
                    'group_sort' => 'Groep Sorteren',

                    'groups' => [
                        'name' => 'Groep Naam',
                    ],

                    'name' => 'Naam',
                    'system' => 'Systeem?',
                ],

                'roles' => [
                    'associated_permissions' => 'Geassocieerde Permissies',
                    'name' => 'Naam',
                    'sort' => 'Sorteren',
                ],

                'users' => [
                    'active' => 'Actief',
                    'associated_roles' => 'Geassocieerde Rollen',
                    'confirmed' => 'Bevestigd',
                    'email' => 'E-mailadres',
                    'first_name' => 'Voornaam',
                    'last_name' => 'Achternaam',
                    'name' => 'Naam',
                    'other_permissions' => 'Overige Permissies',
                    'password' => 'Wachtwoord',
                    'password_confirmation' => 'Wachtwoord bevestiging',
                    'send_confirmation_email' => 'Stuur Bevestigings E-mail',
                ],
            ],
        ],

        'frontend' => [
            'email' => 'E-mailadres',
            'first_name' => 'Voornaam',
            'last_name' => 'Achternaam',
            'name' => 'Naam',
            'password' => 'Wachwoord',
            'password_confirmation' => 'Wachtwoord Bevestiging',
            'phone' => 'Telefoonnummer',
            'message' => 'Bericht',
            'old_password' => 'Oud Wachtwoord',
            'new_password' => 'Nieuw Wachtwoord',
            'new_password_confirmation' => 'Nieuw Wachtwoord Bevestigen',
        ],
    ],
];
