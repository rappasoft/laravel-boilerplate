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

    'accepted' => ':attribute باید پذیرفته شود.',
    'active_url' => ':attribute یک نشانی معتبر اینترنتی نیست',
    'after' => ':attribute باید یک تاریخ بعد از :date باشد.',
    'after_or_equal' => ':attribute باید یک تاریخ مساوی یا بعد از :date باشد.',
    'alpha' => ':attribute می‌تواند فقط شامل حروف باشد.',
    'alpha_dash' => ':attribute می‌تواند فقط شامل حروف، اعداد و - باشد.',
    'alpha_num' => ':attribute می‌تواند فقط شامل حروف و اعداد باشد.',
    'array' => ':attribute باید یک آرایه باشد.',
    'before' => ':attribute باید یک تاریخ قبل از :date باشد.',
    'before_or_equal' => ':attribute باید یک تاریخ مساوی یا قبل از :date باشد.',
    'between' => [
        'numeric' => ':attribute باید بین :min و :max باشد.',
        'file' => ':attribute باید بین :min و :max کیلو بایت باشد.',
        'string' => ':attribute باید بین :min و :max نویسه‌ها باشد.',
        'array' => ':attribute باید شامل :min و :max آیتم‌ها باشد.',
    ],
    'boolean' => ':attribute فیلد باید درست باشد یا نادرست باشد',
    'confirmed' => ':attribute تأییدیه مطابقت ندارد',
    'date' => ':attribute یک تاریخ معتبر نیست.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => ':attribute با قالب :format تطابق ندارد.',
    'different' => ':attribute و :other باید متفاوت باشند.',
    'digits' => ':attribute باید :digits رقم داشته باشد.',
    'digits_between' => ':attribute باید بین :min و :max رقم داشته باشد.',
    'dimensions' => ':attribute ابعاد نامعتبر دارد.',
    'distinct' => ':attribute فیلد مقدار تکراری دارد.',
    'email' => ':attribute باید یک رایانامه معتبر باشد.',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => ':attribute انتخاب شده نامعتبر است.',
    'file' => ':attribute باید یک فایل باشد.',
    'filled' => ':attribute فیلد باید یک مقدار داشته باشد.',
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
    'image' => ':attribute باید یک تصویر باشد.',
    'in' => ':attribute انتخاب شده نامعتبر است.',
    'in_array' => ':attribute فیلد در :other. وجود ندارد',
    'integer' => ':attribute باید عددی باشد.',
    'ip' => ':attribute باید یک آدرس آی.پی معتبر باشد.',
    'ipv4' => ':attribute باید یک آدرس IPv4 معتبر باشد.',
    'ipv6' => ':attribute باید یک آدرس IPv6 معتبر باشد.',
    'json' => ':attribute باید یک رشته json معتبر باشد.',
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
        'numeric' => ':attribute نباید بزرگتر از :max باشد.',
        'file' => ':attribute نباید بزرگتر از :max کیلوبایت باشد.',
        'string' => ':attribute نباید بیشتر از :max نویسه داشته باشد.',
        'array' => ':attribute نباید بیشتر از :max عدد آیتم داشته باشد.',
    ],
    'mimes' => ':attribute باید یک فایل با نوع: :values باشد.',
    'mimetypes' => ':attribute باید یک فایل با نوع: :values باشد.',
    'min' => [
        'numeric' => ':attribute باید حداقل :min باشد.',
        'file' => ':attribute باید حداقل :min کیلوبایت باشد.',
        'string' => ':attribute باید حداقل :min نویسه داشته باشد.',
        'array' => ':attribute باید حداقل :min آیتم داشته باشد.',
    ],
    'not_in' => ':attribute نامعتبر است.',
    'numeric' => ':attribute باید یک عدد باشد.',
    'present' => ':attribute فیلد باید موجود باشد.',
    'regex' => ':attribute قالب نامعتبر است.',
    'required' => ':attribute فیلد مورد نیاز است.',
    'required_if' => ':attribute فیلد مورد نیاز است وقتی که :other برابر با :value باشد.',
    'required_unless' => ':attribute فیلد مورد نیاز است مگر اینکه :other داخل :values باشد.',
    'required_with' => ':attribute فیلد مورد نیاز است وقتی که :values موجود است.',
    'required_with_all' => ':attribute فیلد مورد نیاز است وقتی که :values موجود است.',
    'required_without' => ':attribute فیلد مورد نیاز است وقتی که :values موجود نیست.',
    'required_without_all' => ':attribute فیلد مورد نیاز است وقتی که هیچکدام از :values موجود نباشد.',
    'same' => ':attribute و :other باید تطابق داشته باشند.',
    'size' => [
        'numeric' => ':attribute باید :size باشد.',
        'file' => ':attribute باید :size کیلو بایت باشد.',
        'string' => ':attribute باید :size نویسه‌ای باشد.',
        'array' => ':attribute باید شامل :size آیتم باشد.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => ':attribute باید یک رشته باشد.',
    'timezone' => ':attribute باید یک منطقه زمانی باشد.',
    'unique' => ':attribute قبلا گرفته شده است.',
    'uploaded' => ':attribute بارگذاری نشد.',
    'url' => ':attribute قالب نامعتبر است.',
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
                    'associated_roles' => 'نقش‌های مرتبط',
                    'dependencies' => 'وابستگی‌ها',
                    'display_name' => 'نام',
                    'group' => 'گروه',
                    'group_sort' => 'نوع گروه',

                    'groups' => [
                        'name' => 'نام گروه',
                    ],

                    'name' => 'نام',
                    'first_name' => 'نام',
                    'last_name' => 'نام خانوادگی',
                    'system' => 'سامانه',
                ],

                'roles' => [
                    'associated_permissions' => 'مجوزها',
                    'name' => 'نام',
                    'sort' => 'مرتب سازی',
                ],

                'users' => [
                    'active' => 'فعال',
                    'associated_roles' => 'نقش‌ها',
                    'confirmed' => 'تائید شده؟',
                    'email' => 'رایانامه',
                    'name' => 'نام',
                    'last_name' => 'نام خانوادگی',
                    'first_name' => 'نام',
                    'other_permissions' => 'دیگر مجوزها',
                    'password' => 'گذرواژه',
                    'password_confirmation' => 'تکرار گذرواژه',
                    'send_confirmation_email' => 'ارسال ایمیل تاییدیه',
                    'timezone' => 'منطقه زمانی',
                    'language' => 'زبان',
                ],
            ],
        ],

        'frontend' => [
            'avatar' => 'آواتار',
            'email' => 'رایانامه',
            'first_name' => 'نام',
            'last_name' => 'نام خانوادگی',
            'name' => 'نام',
            'password' => 'گذرواژه',
            'password_confirmation' => 'تکرار گذرواژه',
            'phone' => 'تلفن',
            'message' => 'پیام',
            'new_password' => 'گذرواژه جدید',
            'new_password_confirmation' => 'تکرار گذرواژه جدید',
            'old_password' => 'گذرواژه قبلی',
            'timezone' => 'منطقه زمانی',
            'language' => 'زبان',
        ],
    ],
];
