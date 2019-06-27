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

    'accepted' => ':attribute muss akzeptiert werden.',
    'active_url' => ':attribute ist keine gültige URL.',
    'after' => ':attribute muss ein Datun nach dem :date sein.',
    'after_or_equal' => 'Das :attribute muss ein Datum nach oder gleich :date sein.',
    'alpha' => ':attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => ':attribute darf nur Buchstaben, Nummern und Bindestriche enthalten.',
    'alpha_num' => ':attribute darf nur Buchstaben und Nummern enthalten.',
    'array' => ':attribute muss ein Array sein.',
    'before' => ':attribute muss ein Datum vor dem :date sein.',
    'before_or_equal' => 'Das :attribute muss ein Datum vor oder gleich dem :date sein.',
    'between' => [
        'numeric' => ':attribute muss zwischen :min und :max sein.',
        'file' => ':attribute muss zwischen :min und :max Kilobytes gross sein.',
        'string' => ':attribute muss zwischen :min und :max Zeichen lang sein.',
        'array' => ':attribute muss zwischen :min und :max Einträge enthalten.',
    ],
    'boolean' => ':attribute darf nur Wahr oder Falsch sein.',
    'confirmed' => ':attribute Wiederholung stimmt nicht überein.',
    'date' => ':attribute ist kein gültiges Datum.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => ':attribute ist nicht im Format: :format.',
    'different' => ':attribute und :other müssen unterschiedlich sein.',
    'digits' => ':attribute muss :digits Ziffern enthalten.',
    'digits_between' => ':attribute muss zwischen :min und :max Ziffern enthalten.',
    'dimensions' => 'Das :attribute hat ungültige Bildabmessungen.',
    'distinct' => 'Das :attribute Feld hat einen Wert, der bereits verwendet wurde.',
    'email' => ':attribute muss eine gültige E-Mailadresse sein.',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => ':attribute ist ungültig.',
    'file' => 'Das :attribute muss eine Datei sein.',
    'filled' => ':attribute ist erforderlich.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => ':attribute muss ein Bild sein.',
    'in' => ':attribute ist ungültig.',
    'in_array' => 'Das :attribute-Feld existiert nicht in :other.',
    'integer' => ':attribute muss eine Ganzzahl sein.',
    'ip' => ':attribute muss eine gültige IP-Adresse sein.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => ':attribute muss eine gültige JSON-Zeichenkette sein.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => ':attribute darf nicht grösser sein als :max.',
        'file' => ':attribute darf nicht grösser sein als :max Kilobytes.',
        'string' => ':attribute darf nicht grösser sein als :max Zeichen.',
        'array' => ':attribute darf nicht mehr Einträge enthalten als :max Einträge.',
    ],
    'mimes' => ':attribute muss eine Datei des folgenden Typs sein: :values.',
    'mimetypes' => ':attribute muss eine Datei des folgenden Typs sein: :values.',
    'min' => [
        'numeric' => ':attribute muss mindestens :min sein.',
        'file' => ':attribute muss mindestens :min Kilobytes gross sein.',
        'string' => ':attribute muss mindestens :min Zeichen lang sein.',
        'array' => ':attribute muss mindestens :min Einträge enthalten.',
    ],
    'not_in' => ':attribute ist ungültig.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => ':attribute muss eine Zahl sein.',
    'present' => 'Das :attribute-Feld muss vorhanden sein.',
    'regex' => ':attribute enthält ein ungültiges Format.',
    'required' => ':attribute ist erforderlich.',
    'required_if' => ':attribute ist erforderlich, wenn :other folgenden Wert hat: :value.',
    'required_unless' => ':attribute ist erforderlich, ausser :other enthält :values.',
    'required_with' => ':attribute ist erforderlich, wenn :values vorhanden ist.',
    'required_with_all' => ':attribute ist erforderlich, wenn :values vorhanden ist.',
    'required_without' => ':attribute ist erforderlich, wenn :values nicht vorhanden ist.',
    'required_without_all' => ':attribute ist erforderlich, wenn keine von :values vorhanden ist.',
    'same' => ':attribute und :other müssen gleich sein.',
    'size' => [
        'numeric' => ':attribute muss :size gross ein.',
        'file' => ':attribute muss :size Kilobytes gross sein.',
        'string' => ':attribute muss :size Zeichen enthalten.',
        'array' => ':attribute muss :size Einträge enthalten.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => ':attribute muss eine Zeichenkette sein.',
    'timezone' => ':attribute muss eine gültige Zeitzone sein.',
    'unique' => ':attribute ist schon vergeben.',
    'uploaded' => ':attribute wurde nicht hochgeladen.',
    'url' => ':attribute Format ist ungültig.',
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
            'rule-name' => 'Individuelle-Nachricht',
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
                    'associated_roles' => 'Zugeordnete Rollen',
                    'dependencies' => 'Abhängigkeiten',
                    'display_name' => 'Anzeige-Name',
                    'group' => 'Gruppe',
                    'group_sort' => 'Gruppen-Sortierung',

                    'groups' => [
                        'name' => 'Gruppen-Name',
                    ],

                    'name' => 'Name',
                    'first_name' => 'Vorname',
                    'last_name' => 'Nachname',
                    'system' => 'System?',
                ],

                'roles' => [
                    'associated_permissions' => 'Zugeordnerte Berechtigungen',
                    'name' => 'Name',
                    'sort' => 'Sortierung',
                ],

                'users' => [
                    'active' => 'Aktiv',
                    'associated_roles' => 'Zugeordnerte Rollen',
                    'confirmed' => 'Bestätigt',
                    'email' => 'E-Mailadresse',
                    'name' => 'Name',
                    'last_name' => 'Vorname',
                    'first_name' => 'Nachname',
                    'other_permissions' => 'Andere Berechtigungen',
                    'password' => 'Kennwort',
                    'password_confirmation' => 'Kennwort (Wdh.)',
                    'send_confirmation_email' => 'Bestätigungs E-Mail senden',
                    'timezone' => 'Zeitzone',
                ],
            ],
        ],

        'frontend' => [
            'avatar' => 'Avatar Adresse',
            'email' => 'E-Mailadresse',
            'first_name' => 'Vorname',
            'last_name' => 'Nachname',
            'name' => 'Name',
            'password' => 'Kennwort',
            'password_confirmation' => 'Kennwort (Wdh.)',
            'phone' => 'Phone',
            'message' => 'Message',
            'new_password' => 'Neues Kennwort',
            'new_password_confirmation' => 'Neues Kennwort (Wdh.)',
            'old_password' => 'Altes Kennwort',
            'timezone' => 'Zeitzone',
        ],
    ],
];
