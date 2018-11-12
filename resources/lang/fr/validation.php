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

    'accepted'             => 'Le champ :attribute doit être accepté.',
    'active_url'           => "Le champ :attribute n'est pas une URL valide.",
    'after'                => 'Le champ :attribute doit être une date postérieure au :date.',
    'after_or_equal'       => 'Le champ :attribute doit être une date postérieure ou égale au :date.',
    'alpha'                => 'Le champ :attribute doit seulement contenir des lettres.',
    'alpha_dash'           => 'Le champ :attribute doit seulement contenir des lettres, des chiffres et des tirets.',
    'alpha_num'            => 'Le champ :attribute doit seulement contenir des chiffres et des lettres.',
    'array'                => 'Le champ :attribute doit être un tableau.',
    'before'               => 'Le champ :attribute doit être une date antérieure au :date.',
    'before_or_equal'      => 'Le champ :attribute doit être une date antérieure ou égale au :date.',
    'between'              => [
        'numeric' => 'La valeur de :attribute doit être comprise entre :min et :max.',
        'file'    => 'La taille du fichier de :attribute doit être comprise entre :min et :max kilo-octets.',
        'string'  => 'Le texte :attribute doit contenir entre :min et :max caractères.',
        'array'   => 'Le tableau :attribute doit contenir entre :min et :max éléments.',
    ],
    'boolean'              => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed'            => 'Le champ de confirmation :attribute ne correspond pas.',
    'date'                 => "Le champ :attribute n'est pas une date valide.",
    'date_format'          => 'Le champ :attribute ne correspond pas au format :format.',
    'different'            => 'Les champs :attribute et :other doivent être différents.',
    'digits'               => 'Le champ :attribute doit contenir :digits chiffres.',
    'digits_between'       => 'Le champ :attribute doit contenir entre :min et :max chiffres.',
    'dimensions'           => 'Les dimensions de l\'image :attribute ne sont pas conformes.',
    'distinct'             => 'Le champ :attribute doit être une valeur unique.',
    'email'                => 'Le champ :attribute doit être une adresse email valide.',
    'exists'               => 'Le champ :attribute n\'existe pas.',
    'file'                 => 'Le champ :attribute doit être un fichier.',
    'filled'               => 'Le champ :attribute est obligatoire.',
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
    'image'                => 'Le champ :attribute doit être une image.',
    'in'                   => 'Le champ :attribute est invalide.',
    'in_array'             => "Le champ :attribute n'existe pas dans :other.",
    'integer'              => 'Le champ :attribute doit être un entier.',
    'ip'                   => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4'                 => 'Le champ :attribute doit être une adresse IPv4 valide.',
    'ipv6'                 => 'Le champ :attribute doit être une adresse IPv6 valide.',
    'json'                 => 'Le champ :attribute doit être un document JSON valide.',
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
        'numeric' => 'La valeur de :attribute ne peut être supérieure à :max.',
        'file'    => 'La taille du fichier de :attribute ne peut pas dépasser :max kilo-octets.',
        'string'  => 'Le texte de :attribute ne peut contenir plus de :max caractères.',
        'array'   => 'Le tableau :attribute ne peut contenir plus de :max éléments.',
    ],
    'mimes'                => 'Le champ :attribute doit être un fichier de type : :values.',
    'mimetypes'            => 'Le champ :attribute doit être un fichier de type : :values.',
    'min'                  => [
        'numeric' => 'La valeur de :attribute doit être supérieure ou égale à :min.',
        'file'    => 'La taille du fichier de :attribute doit être supérieure à :min kilo-octets.',
        'string'  => 'Le texte :attribute doit contenir au moins :min caractères.',
        'array'   => 'Le tableau :attribute doit contenir au moins :min éléments.',
    ],
    'not_in'               => "Le champ :attribute sélectionné n'est pas valide.",
    'not_regex'            => 'The :attribute format is invalid.',
    'numeric'              => 'Le champ :attribute doit contenir un nombre.',
    'present'              => 'Le champ :attribute doit être présent.',
    'regex'                => 'Le format du champ :attribute est invalide.',
    'required'             => 'Le champ :attribute est obligatoire.',
    'required_if'          => 'Le champ :attribute est obligatoire lorsque :other est :value.',
    'required_unless'      => 'Le champ :attribute est obligatoire sauf si :other est :value.',
    'required_with'        => 'Le champ :attribute est obligatoire lorsque :values a une valeur.',
    'required_with_all'    => 'Le champ :attribute est obligatoire lorsque :values existe.',
    'required_without'     => 'Le champ :attribute est obligatoire lorsque :values n\'a pas de valeur.',
    'required_without_all' => 'Le champ :attribute est obligatoire lorsque :values n\'existe pas.',
    'same'                 => 'Les champs :attribute et :other doivent être identiques.',
    'size'                 => [
        'numeric' => 'Le champ :attribute doit avoir une taille de :size.',
        'file'    => 'La taille du fichier de :attribute doit être de :size kilo-octets.',
        'string'  => 'Le texte de :attribute doit contenir :size caractères.',
        'array'   => 'Le tableau :attribute doit contenir :size éléments.',
    ],
    'string'               => 'Le champ :attribute doit être une chaîne de caractères.',
    'timezone'             => 'Le champ :attribute doit être un fuseau horaire valide.',
    'unique'               => 'La valeur du champ :attribute est déjà utilisée.',
    'uploaded'             => 'Le fichier du champ :attribute n\'a pu être téléchargé.',
    'url'                  => 'Le format de \'URL de :attribute n\'est pas valide.',
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
                    'associated_roles' => 'Rôles associés',
                    'dependencies'     => 'Dépendances',
                    'display_name'     => 'Nom affiché',
                    'group'            => 'Groupe',
                    'group_sort'       => 'Ordre du groupe',

                    'groups' => [
                        'name' => 'Nom du groupe',
                    ],

                    'name'   => 'Nom complet',
                    'first_name' => 'Prénom',
                    'last_name'  => 'Nom',
                    'system' => 'Système',
                ],

                'roles' => [
                    'associated_permissions' => 'Permissions associées',
                    'name'                   => 'Nom',
                    'sort'                   => 'Ordre',
                ],

                'users' => [
                    'active'                  => 'Actif',
                    'associated_roles'        => 'Rôles associés',
                    'confirmed'               => 'Confirmé',
                    'email'                   => 'Adresse email',
                    'name'                    => 'Nom complet',
                    'first_name'              => 'Prénom',
                    'last_name'               => 'Nom',
                    'other_permissions'       => 'Autres permissions',
                    'password'                => 'Mot de passe',
                    'password_confirmation'   => 'Confirmation du mot de passe',
                    'send_confirmation_email' => 'Envoyer un email de confirmation',
                ],
            ],
        ],

        'frontend' => [
            'avatar'                    => 'Avatar',
            'email'                     => 'Adresse email',
            'last_name'                 => 'Nom',
            'first_name'                => 'Prénom',
            'name'                      => 'Nom complet',
            'password'                  => 'Mot de passe',
            'password_confirmation'     => 'Confirmation',
            'phone'                     => 'Téléphone',
            'message'                   => 'Message',
            'new_password'              => 'Nouveau mot de passe',
            'new_password_confirmation' => 'Confirmation du nouveau mot de passe',
            'old_password'              => 'Ancien mot de passe',
            'timezone'                  => 'Fuseau Horaire',
        ],
    ],

];
