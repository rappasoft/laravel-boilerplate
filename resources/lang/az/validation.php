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

    'accepted' => ':attribute qəbul edilməlidir.',
    'active_url' => ':attribute URL adresi deyil.',
    'after' => ':attribute tarixi :date tarixindən sonra olan tarix olmalıdır.',
    'after_or_equal' => ':attribute tarixi :date tarixindən sonra və ya eyni tarix olmalıdır.',
    'alpha' => ':attribute yalnız hərflərdən təşkil edilməlidir.',
    'alpha_dash' => ':attribute yalnız hərflər,rəqəmlər,defis və altdanxətt təşkil edə bilər.',
    'alpha_num' => ':attribute yalnız hərflər və rəqəmlərdən təşkil edilməlidir.',
    'array' => ':attribute arraydan təşkil edilməlidir.',
    'before' => ':attribute tarixi :date tarixindən öncə olmalıdır.',
    'before_or_equal' => ':attribute tarixi :date tarixindən öncə və ya eyni olmalıdır.',
    'between' => [
        'numeric' => ':attribute :min və :max intervalı arasında olmalıdır',
        'file' => ':attribute faylının həcmi :min və :max kilobayt intervalında olmalıdır .',
        'string' => ':attribute  :min və :max intervalında yerləşməlidir.',
        'array' => ':attribute :min və :max atributu arasında yerləşməlidir.',
    ],
    'boolean' => ':attribute xanası doğru və ya yanlış ifadələrindən biri olmalıdır.',
    'confirmed' => ':attribute təsdiqlənməsi doğru deyil.',
    'date' => ':attribute doğru tarix formatında deyil.',
    'date_equals' => ':attribute tarixi :date tarixi ilə eyni olmalıdır.',
    'date_format' => ':attribute izlənən formatla eyni deyil :format.',
    'different' => ':attribute və :other fərqli olmalıdır.',
    'digits' => ':attribute :digits rəqəm olmalıdır.',
    'digits_between' => ':attribute  :min və :max aralığında rəqəm olmalıdır.',
    'dimensions' => ':attribute yanlış şəkil ölçüsünə malikdir.',
    'distinct' => ':attribute dublikat dəyərə malikdir.',
    'email' => ':attribute .doğru email ünvanı olmalıdır.',
    'ends_with' => ':attribute sonluğu :values dəyərini təşkil etməlidir',
    'exists' => 'Seçilmiş :attribute doğru deyil.',
    'file' => ':attribute fayl olmalıdır.',
    'filled' => ':attribute dəyərə malik olmalıdır.',
    'gt' => [
        'numeric' => ':attribute dəyəri :value dəyərindən böyük olmalıdır.',
        'file' => ':attribute ölçüsü :value kilobaytdan böyük olmalıdır.',
        'string' => ':attribute :value simvoldan çox olmalıdır.',
        'array' => ' :attribute :value sayından daha çox əşyaya malik olmalıdır.',
    ],
    'gte' => [
        'numeric' => ':attribute dəyəri :value dəyərinə bərabər və ta daha çox olmalıdır.',
        'file' => ':attribute fayl ölçüsü :value kilobaytdan çox olmalıdır.',
        'string' => ':attribute mətni :value simvoldan çox və ya bərabər olmalıdır',
        'array' => ':attribute ən az :value sayıda əşyaya bərabər və ya daha çox olmalıdır.',
    ],
    'image' => ':attribute şəkil olmalıdır.',
    'in' => 'Seçilmiş :attribute keçərli deyil.',
    'in_array' => ':attribute bölməsi :other massivide mövcud deyil.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
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
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
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
                    'associated_roles' => 'Əlaqələnmiş Rollar',
                    'dependencies' => 'Asılılıqlar',
                    'display_name' => 'Görünüş adı',
                    'group' => 'Qrup',
                    'group_sort' => 'Qrup Sralaması',

                    'groups' => [
                        'name' => 'Qrup adı',
                    ],

                    'name' => 'Ad',
                    'first_name' => 'Adınız',
                    'last_name' => 'Soyadınlz',
                    'system' => 'Sistem',
                ],

                'roles' => [
                    'associated_permissions' => 'Birləşmiş icazələr',
                    'name' => 'Ad',
                    'sort' => 'Sıra',
                ],

                'users' => [
                    'active' => 'Aktiv',
                    'associated_roles' => 'Birləşmiş rollar',
                    'confirmed' => 'Təsdiqləndi',
                    'email' => 'E-mail ünvanı',
                    'name' => 'Ad',
                    'last_name' => 'Soyadınız',
                    'first_name' => 'Adınız',
                    'other_permissions' => 'Digət icazələr',
                    'password' => 'Şifrə',
                    'password_confirmation' => 'Şifrəni təkrarla',
                    'send_confirmation_email' => 'Təsdiqləmə emaili göndər',
                    'timezone' => 'Vaxt Qurşağı',
                    'language' => 'Dil',
                ],
            ],
        ],

        'frontend' => [
            'avatar' => 'Avatar yerləşməsi',
            'email' => 'Email ünvanı',
            'first_name' => 'Adınız',
            'last_name' => 'Soyadınız',
            'name' => 'Tam Adınız',
            'password' => 'Şifrə',
            'password_confirmation' => 'Şifrə təsdiqi',
            'phone' => 'Telefon',
            'message' => 'Mesaj',
            'new_password' => 'Yeni Şifrə',
            'new_password_confirmation' => 'Yeni şifrə təsdiqi',
            'old_password' => 'Köhnə şifrə',
            'timezone' => 'Vaxt Qurşağı',
            'language' => 'Dil',
        ],
    ],
];
