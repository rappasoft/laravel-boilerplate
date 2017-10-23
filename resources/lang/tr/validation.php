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

    'accepted'   => ':attribute kabul edilmelidir.',
    'active_url' => ':attribute geçerli bir URL olmalıdır.',
    'after'      => ':attribute değeri, :date tarihinden daha sonraki bir tarih olmalıdır.',
    'after_or_equal' => ':attribute değeri, :date tarihinden daha sonraki veya aynı tarih olmalıdır.',
    'alpha'      => ':attribute sadece harflerden oluşmalıdır.',
    'alpha_dash' => ':attribute sadece harfler, rakamlar ve tirelerden oluşmalıdır.',
    'alpha_num'  => ':attribute sadece harfler ve rakamlar içermelidir.',
    'array'      => ':attribute dizi olmalıdır.',
    'before'     => ':attribute değeri, :date tarihinden daha önceki bir tarih olmalıdır.',
    'before_or_equal' => ':attribute değeri, :date tarihinden daha önceki veya aynı tarih olmalıdır.',
    'between'    => [
        'numeric' => ':attribute :min - :max arasında olmalıdır.',
        'file'    => ':attribute :min - :max arasındaki kilobayt değeri olmalıdır.',
        'string'  => ':attribute :min - :max arasında karakterden oluşmalıdır.',
        'array'   => ':attribute :min - :max arasında nesneye sahip olmalıdır.',
    ],
    'boolean'        => ':attribute alanı sadece doğru veya yanlış olabilir.',
    'confirmed'      => ':attribute tekrarı eşleşmiyor.',
    'date'           => ':attribute geçerli bir tarih olmalıdır.',
    'date_format'    => ':attribute :format biçimi ile eşleşmiyor.',
    'different'      => ':attribute ile :other birbirinden farklı olmalıdır.',
    'digits'         => ':attribute :digits rakam olmalıdır.',
    'digits_between' => ':attribute :min ile :max arasında rakam olmalıdır.',
    'dimensions'     => ':attribute geçersiz resim ölçülerine sahiptir.',
    'distinct'       => ':attribute alanı tekrarlanan bir değere sahiptir.',
    'email'          => ':attribute doğru bir e-posta olmalıdır.',
    'exists'         => 'Seçili olan :attribute geçersiz.',
    'file'           => ':attribute dosya olmalıdır.',
    'filled'         => ':attribute alanı bir değer içermelidir.',
    'image'          => ':attribute resim dosyası olmalıdır.',
    'in'             => ':attribute değeri geçersiz.',
    'in_array'       => ':attribute değeri :other içinde mevcut değil.',
    'integer'        => ':attribute rakam olmalıdır.',
    'ip'             => ':attribute geçerli bir IP adresi olmalıdır.',
    'ipv4'           => ':attribute geçerli bir IPV4 adresi olmalıdır.',
    'ipv6'           => ':attribute geçerli bir IPV6 adresi olmalıdır.',
    'json'           => ':attribute geçerli bir JSON dizesi olmalıdır.',
    'max'            => [
        'numeric' => ':attribute değeri :max değerinden büyük olmamalıdır.',
        'file'    => ':attribute değeri :max kilobayt değerinden büyük olmamalıdır.',
        'string'  => ':attribute değeri en fazla :max karakter uzunluğunda olmalıdır.',
        'array'   => ':attribute değeri :max adedinden fazla nesneye sahip olmamalıdır.',
    ],
    'mimes' => ':attribute dosya biçimi :values olmalıdır.',
    'mimetypes'  => ':attribute dosya biçimi :values olmalıdır.',
    'min'   => [
        'numeric' => ':attribute değeri en az :min değerinde olmalıdır.',
        'file'    => ':attribute değeri en az :min kilobayt değerinde olmalıdır.',
        'string'  => ':attribute değeri en az :min karakter uzunluğunda olmalıdır.',
        'array'   => ':attribute en az :min nesneye sahip olmalıdır.',
    ],
    'not_in'               => 'Seçili :attribute geçersiz.',
    'numeric'              => ':attribute rakam olmalıdır.',
    'present'              => ':attribute alanı var olmalıdır.',
    'regex'                => ':attribute biçimi geçersiz.',
    'required'             => ':attribute alanı gereklidir.',
    'required_if'          => ':attribute alanı, :other :value değerine sahip olduğunda zorunludur.',
    'required_unless'      => ':attribute alanı, :other :values değerine sahip olmadığında zorunludur.',
    'required_with'        => ':attribute alanı :values varken zorunludur.',
    'required_with_all'    => ':attribute alanı :values varken zorunludur.',
    'required_without'     => ':attribute alanı :values yokken zorunludur.',
    'required_without_all' => ':attribute alanı :values yokken zorunludur.',
    'same'                 => ':attribute ile :other eşleşmelidir.',
    'size'                 => [
        'numeric' => ':attribute :size olmalıdır.',
        'file'    => ':attribute :size kilobayt olmalıdır.',
        'string'  => ':attribute :size karakter olmalıdır.',
        'array'   => ':attribute :size nesneye sahip olmalıdır.',
    ],
    'string'   => ':attribute karakterlerden oluşmalıdır.',
    'timezone' => ':attribute geçerli bir zaman bölgesi olmalıdır.',
    'unique'   => ':attribute daha önceden kayıt edilmiş.',
    'uploaded' => ':attribute yüklenirken hata oluştu.',
    'url'      => ':attribute biçimi geçersiz.',

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
                    'associated_roles' => 'İlişkilendirilmiş Roller',
                    'dependencies'     => 'Bağımlılıklar',
                    'display_name'     => 'Görüntülenen İsim',
                    'group'            => 'Grup',
                    'group_sort'       => 'Grup Sıralama',

                    'groups' => [
                        'name' => 'Grup İsmi',
                    ],

                    'name'       => 'İsim',
                    'first_name' => 'Ad',
                    'last_name'  => 'Soyad',
                    'system'     => 'Sistem',
                ],

                'roles' => [
                    'associated_permissions' => 'İlişkilendirilmiş Yetkiler',
                    'name'                   => 'İsim',
                    'sort'                   => 'Sırala',
                ],

                'users' => [
                    'active'                  => 'Aktif',
                    'associated_roles'        => 'İlişkilendirilmiş Roller',
                    'confirmed'               => 'Onaylandı',
                    'email'                   => 'E-posta Adresi',
                    'name'                    => 'İsim',
                    'last_name'               => 'Soyad',
                    'first_name'              => 'Ad',
                    'other_permissions'       => 'Diğer Yetkiler',
                    'password'                => 'Parola',
                    'password_confirmation'   => 'Parola Onayı',
                    'send_confirmation_email' => 'Onay E-Postası gönder',
                ],
            ],
        ],

        'frontend' => [
            'email'                     => 'E-posta Adresi',
            'first_name'                => 'Ad',
            'last_name'                 => 'Soyad',
            'name'                        => 'Full Name',
            'password'                  => 'Parola',
            'password_confirmation'     => 'Parola Onay',
            'phone' => 'Phone',
            'message' => 'Message',
            'old_password'              => 'Eski Parola',
            'new_password'              => 'Yeni Parola',
            'new_password_confirmation' => 'Yeni Parola Onay',
        ],
    ],

];
