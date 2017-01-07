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

    'accepted'             => ':attribute must Akzeptert werden.',
    'active_url'           => ':attribute ist keine gültige URL.',
    'after'                => ':attribute muss ein Datun nach dem :date sein.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => ':attribute darf nur buchstaben enthalten.',
    'alpha_dash'           => ':attribute darf nur Buchstaben, Nummern und Bindestriche enthalten.',
    'alpha_num'            => ':attribute darf nur Buchstaben und Nummern enthalten.',
    'array'                => ':attribute muss ein Array sein.',
    'before'               => ':attribute muss ein Datum vor dem :date sein.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => ':attribute muss zwischen :min und :max sein.',
        'file'    => ':attribute muss zwischen :min und :max Kilobytes gross sein.',
        'string'  => ':attribute muss zwischen :min und :max zeichen lang sein.',
        'array'   => ':attribute muss zwischen :min und :max Einträge enthalten.',
    ],
    'boolean'              => ':attribute darf nur Wahr oder Falsch sein.',
    'confirmed'            => ':attribute Wiederholung stimmt nicht überein.',
    'date'                 => ':attribute ist kein gültiges Datum.',
    'date_format'          => ':attribute ist nicht im Format: :format.',
    'different'            => ':attribute und :other müssen unterschiedlich sein.',
    'digits'               => ':attribute muss :digits Ziffern enthalten.',
    'digits_between'       => ':attribute mus zwischen :min und :max Ziffern enthalten.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => ':attribute muss eine gültige E-Mailadresse sein.',
    'exists'               => ':attribute ist ungültig.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => ':attribute ist erforderlich.',
    'image'                => ':attribute muss ein Bild sein.',
    'in'                   => ':attribute ist ungültig.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => ':attribute muss eine Ganzzahl sein.',
    'ip'                   => ':attribute muss eine gültige IP-Adresse sein.',
    'json'                 => ':attribute muss ein gültiger JSON-String sein.',
    'max'                  => [
        'numeric' => ':attribute darf nicht grösser sein als :max.',
        'file'    => ':attribute darf nicht grösser sein als :max Kilobytes.',
        'string'  => ':attribute darf nicht grösser sein als :max Zeichen.',
        'array'   => ':attribute darf nicht mehr Einträge enthalten als :max Einträge.',
    ],
    'mimes'                => ':attribute muss eine Datei des folgenden Typs sein: :values.',
    'min'                  => [
        'numeric' => ':attribute muss mindestens :min sein.',
        'file'    => ':attribute muss mindestens :min Kilobytes gross sein.',
        'string'  => ':attribute muss mindestens :min Zeichen lang sein.',
        'array'   => ':attribute muss mindestens :min Einträge enthalten.',
    ],
    'not_in'               => ':attribute ist ungültig.',
    'numeric'              => ':attribute muss eine Zahl sein.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => ':attribute enthält ein ungültiges format.',
    'required'             => ':attribute ist erforderlich.',
    'required_if'          => ':attribute ist erforderlich, wenn :other folgenden Wert hat: :value.',
    'required_unless'      => ':attribute ist erforderlich, ausser :other enthält :values.',
    'required_with'        => ':attribute ist erforderlich, wenn :values vorhanden ist.',
    'required_with_all'    => ':attribute ist erforderlich, wenn :values vorhanden ist.',
    'required_without'     => ':attribute ist erforderlich, wenn :values nicht vorhanden ist.',
    'required_without_all' => ':attribute ist erforderlich, wenn keine von :values vorhanden ist.',
    'same'                 => ':attribute und :other müssen gleich sein.',
    'size'                 => [
        'numeric' => ':attribute muss :size gross ein.',
        'file'    => ':attribute muss :size Kilobytes gross sein.',
        'string'  => ':attribute muss :size Zeichen enthalten.',
        'array'   => ':attribute muss :size Einträge enthalten.',
    ],
    'string'               => ':attribute muss eine Zeichenkette sein.',
    'timezone'             => ':attribute muss eine gültige Zeitzone sein.',
    'unique'               => ':attribute ist schon vergeben.',
    'url'                  => ':attribute Format ist ungültig.',

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
                    'associated_roles' => 'Zugeordnerte Rollen',
                    'dependencies'     => 'Abhängigkeiten',
                    'display_name'     => 'Anzeige Name',
                    'group'            => 'Gruppe',
                    'group_sort'       => 'Gruppen Sortierung',

                    'groups' => [
                        'name' => 'Gruppen Name',
                    ],

                    'name'   => 'Name',
                    'system' => 'System?',
                ],

                'roles' => [
                    'associated_permissions' => 'Zugeordnerte Berechtigungen',
                    'name'                   => 'Name',
                    'sort'                   => 'Sortierung',
                ],

                'users' => [
                    'active'                  => 'Aktiv',
                    'associated_roles'        => 'Zugeordnerte Rollen',
                    'confirmed'               => 'Bestätigt',
                    'email'                   => 'E-Mailadresse',
                    'name'                    => 'Name',
                    'other_permissions'       => 'Andere Berechtigungen',
                    'password'                => 'Passwort',
                    'password_confirmation'   => 'Passwort (Wdh.)',
                    'send_confirmation_email' => 'Bestätigungs E-Mail senden',
                ],
            ],
        ],

        'frontend' => [
            'email'                     => 'E-Mailadresse',
            'name'                      => 'Name',
            'password'                  => 'Passwort',
            'password_confirmation'     => 'Passwort (Wdh.)',
            'old_password'              => 'Altes Passwort',
            'new_password'              => 'Neues Passwort',
            'new_password_confirmation' => 'Neues Passwort (Wdh.)',
        ],
    ],

];
