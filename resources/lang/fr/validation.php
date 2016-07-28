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
    'active_url'           => 'Le champ :attribute n\'est pas une URL valide.',
    'after'                => 'Le champ :attribute doit être une date postérieure à :date.',
    'alpha'                => 'Le champ :attribute ne peut contenir que des lettres.',
    'alpha_dash'           => 'Le champ :attribute ne peut contenir que des lettres, des chiffres ou bien des tirets.',
    'alpha_num'            => 'Le champ :attribute ne peut contenir que des lettres ou des chiffres.',
    'array'                => 'Le champ :attribute doit être un tableau.',
    'before'               => 'Le champ :attribute doit être une date antérieure à :date.',
    'between'              => [
        'numeric' => 'La valeur :attribute doit être comprise entre :min et :max.',
        'file'    => 'La taille du fichier :attribute doit être comprise entre :min et :max kilobytes.',
        'string'  => 'La taille de la chaine :attribute doit être comprise entre :min et :max caractères.',
        'array'   => 'Le tableau :attribute doit contenir entre :min et :max éléments.',
    ],
    'boolean'              => 'Le champ :attribute doit être vrai ou faux.',
    'confirmed'            => 'La confirmation du champ :attribute ne correspond pas.',
    'date'                 => 'Le champ :attribute n\'est pas une date valide.',
    'date_format'          => 'Le champ :attribute ne correspond pas au format :format.',
    'different'            => 'Le champ :attribute et le champ :other doivent être différents.',
    'digits'               => 'Le champ :attribute doit contenir :digits chiffres.',
    'digits_between'       => 'Le champ :attribute doit avoir entre :min et :max chiffres.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'Le champ :attribute doit être une adresse email valide.',
    'exists'               => 'Le champ :attribute n\'existe pas.',
    'file'                 => 'Le champ :attribute doit être un fichier.',
    'filled'               => 'Le champ :attribute est obligatoire.',
    'image'                => 'Le champ :attribute doit être une image.',
    'in'                   => 'Le champ :attribute est invalide.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'Le champ :attribute doit être un entier.',
    'ip'                   => 'Le champ :attribute doit être une adresse IP valide.',
    'json'                 => 'Le champ :attribute doit être une chaine JSON valide.',
    'max'                  => [
        'numeric' => 'Le champ :attribute doit être inférieur à :max.',
        'file'    => 'La taille du fichier :attribute ne peut être supérieure à :max kilobytes.',
        'string'  => 'Le champ :attribute doit contenir moins de :max caractères.',
        'array'   => 'Le tableau :attribute doit avoir moins de :max éléments.',
    ],
    'mimes'                => 'Le fichier :attribute doit être du type : :values.',
    'min'                  => [
        'numeric' => 'Le champ :attribute doit être supérieur à :min.',
        'file'    => 'Le taille du fichier :attribute doit être supérieure à :min kilobytes.',
        'string'  => 'Le champ :attribute doit contenir plus de :min caractères.',
        'array'   => 'Le tableau :attribute doit avoir plus de :min éléments.',
    ],
    'not_in'               => 'Le champ :attribute est invalide.',
    'numeric'              => 'Le champ :attribute doit être un nombre.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'Le format du champ :attribute est invalide.',
    'required'             => 'Le champ :attribute est obligatoire.',
    'required_if'          => 'Le champ :attribute est obligatoire lorsque :other est :value.',
    'required_unless'      => 'Le champ :attribute est obligatoire sauf si :other est :value.',
    'required_with'        => 'Le champ :attribute est obligatoire lorsque :values a une valeur.',
    'required_with_all'    => 'Le champ :attribute est obligatoire lorsque :values existe.',
    'required_without'     => 'Le champ :attribute est obligatoire lorsque :values n\'a pas de valeur.',
    'required_without_all' => 'Le champ :attribute est obligatoire lorsque :values n\'existe pas.',
    'same'                 => 'Le champ :attribute et :other doivent être identiques.',
    'size'                 => [
        'numeric' => 'Le champ :attribute doit avoir une taille de :size.',
        'file'    => 'La taille du fichier :attribute doit être de :size kilobytes.',
        'string'  => 'Le champ :attribute doit comporter :size caractères.',
        'array'   => 'Le tableau :attribute doit contenir :size éléments.',
    ],
    'string'               => 'Le champ :attribute doit être une chaine de caractères.',
    'timezone'             => 'Le champ :attribute doit être une zone de temps valide.',
    'unique'               => 'Le champ :attribute existe déjà.',
    'url'                  => 'Le format du champ :attribute est invalide.',

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
                    'dependencies' => 'Dépendances',
                    'display_name' => 'Nom affiché',
                    'group' => 'Groupe',
                    'group_sort' => 'Ordre du groupe',

                    'groups' => [
                        'name' => 'Nom du groupe',
                    ],

                    'name' => 'Nom',
                    'system' => 'Système ?',
                ],

                'roles' => [
                    'associated_permissions' => 'Permissions associées',
                    'name' => 'Nom',
                    'sort' => 'Ordre',
                ],

                'users' => [
                    'active' => 'Actif',
                    'associated_roles' => 'Rôles associés',
                    'confirmed' => 'Confirmé',
                    'email' => 'Adresse email',
                    'name' => 'Nom',
                    'other_permissions' => 'Autres permissions',
                    'password' => 'Mot de passe',
                    'password_confirmation' => 'Confirmation',
                    'send_confirmation_email' => 'Envoyer un email de confirmation',
                ],
            ],
        ],

        'frontend' => [
            'email' => 'Adresse email',
            'name' => 'Nom',
            'password' => 'Mot de passe',
            'password_confirmation' => 'Confirmation',
            'old_password' => 'Ancien mot de passe',
            'new_password' => 'Nouveau mot de passe',
            'new_password_confirmation' => 'Confirmation du nouveau mot de passe',
        ],
    ],

];
