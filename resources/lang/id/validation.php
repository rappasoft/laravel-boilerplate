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
    'accepted'             => ':attribute harus diterima.',
    'active_url'           => ':attribute bukan URL yang benar.',
    'after'                => ':attribute harus tanggal setelah :date.',
    'after_or_equal'       => ':attribute harus berupa tanggal setelah atau sama dengan tanggal :date.',
    'alpha'                => ':attribute hanya boleh berisi huruf.',
    'alpha_dash'           => ':attribute hanya boleh berisi huruf, angka, dan strip.',
    'alpha_num'            => ':attribute hanya boleh berisi huruf dan angka.',
    'array'                => ':attribute harus berupa sebuah array.',
    'before'               => ':attribute harus tanggal sebelum :date.',
    'before_or_equal'      => ':attribute harus berupa tanggal sebelum atau sama dengan tanggal :date.',
    'between'              => [
        'numeric' => ':attribute harus diantara :min dan :max.',
        'file'    => ':attribute harus diantara :min dan :max kilobytes.',
        'string'  => ':attribute harus diantara :min dan :max karakter.',
        'array'   => ':attribute harus diantara :min dan :max item.',
    ],
    'boolean'              => ':attribute harus berupa true atau false',
    'confirmed'            => 'Konfirmasi :attribute tidak cocok.',
    'date'                 => ':attribute bukan tanggal yang benar.',
    'date_format'          => ':attribute tidak cocok dengan format :format.',
    'different'            => ':attribute dan :other harus berbeda.',
    'digits'               => ':attribute harus berupa angka :digits.',
    'digits_between'       => ':attribute harus antara angka :min dan :max.',
    'dimensions'           => ':attribute tidak memiliki dimensi gambar yang benar.',
    'distinct'             => ':attribute memiliki nilai yang duplikat.',
    'email'                => ':attribute harus berupa alamat surel yang benar.',
    'exists'               => ':attribute yang dipilih tidak benar.',
    'file'                 => ':attribute harus berupa sebuah berkas.',
    'filled'               => ':attribute wajib diisi.',
    'image'                => ':attribute harus berupa gambar.',
    'in'                   => ':attribute yang dipilih tidak benar.',
    'in_array'             => ':attribute tidak terdapat dalam :other.',
    'integer'              => ':attribute harus merupakan bilangan bulat.',
    'ip'                   => ':attribute harus berupa alamat IP yang benar.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => ':attribute harus berupa JSON string yang benar.',
    'max'                  => [
        'numeric' => ':attribute seharusnya tidak lebih dari :max.',
        'file'    => ':attribute seharusnya tidak lebih dari :max kilobytes.',
        'string'  => ':attribute seharusnya tidak lebih dari :max karakter.',
        'array'   => ':attribute seharusnya tidak lebih dari :max item.',
    ],
    'mimes'                => ':attribute harus dokumen berjenis : :values.',
    'mimetypes'            => ':attribute harus dokumen berjenis : :values.',
    'min'                  => [
        'numeric' => ':attribute harus minimal :min.',
        'file'    => ':attribute harus minimal :min kilobytes.',
        'string'  => ':attribute harus minimal :min karakter.',
        'array'   => ':attribute harus minimal :min item.',
    ],
    'not_in'               => ':attribute yang dipilih tidak benar.',
    'numeric'              => ':attribute harus berupa angka.',
    'present'              => ':attribute wajib ada.',
    'regex'                => 'Format :attribute tidak benar.',
    'required'             => ':attribute wajib diisi.',
    'required_if'          => ':attribute wajib diisi bila :other adalah :value.',
    'required_unless'      => ':attribute wajib diisi kecuali :other memiliki nilai :values.',
    'required_with'        => ':attribute wajib diisi bila terdapat :values.',
    'required_with_all'    => ':attribute wajib diisi bila terdapat :values.',
    'required_without'     => ':attribute wajib diisi bila tidak terdapat :values.',
    'required_without_all' => ':attribute wajib diisi bila tidak terdapat ada :values.',
    'same'                 => ':attribute dan :other harus sama.',
    'size'                 => [
        'numeric' => ':attribute harus berukuran :size.',
        'file'    => ':attribute harus berukuran :size kilobyte.',
        'string'  => ':attribute harus berukuran :size karakter.',
        'array'   => ':attribute harus mengandung :size item.',
    ],
    'string'               => ':attribute harus berupa string.',
    'timezone'             => ':attribute harus berupa zona waktu yang benar.',
    'unique'               => ':attribute sudah ada sebelumnya.',
    'uploaded'             => ':attribute gagal diunggah.',
    'url'                  => 'Format :attribute tidak benar.',

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
                    'associated_roles' => 'Asosiasi Peran',
                    'dependencies'     => 'Dependensi',
                    'display_name'     => 'Nama Tampilan',
                    'group'            => 'Grup',
                    'group_sort'       => 'Urut Grup',

                    'groups' => [
                        'name' => 'Nama Grup',
                    ],

                    'name'   => 'Nama',
                    'system' => 'Sistem?',
                ],

                'roles' => [
                    'associated_permissions' => 'Asosiasi Izin',
                    'name'                   => 'Nama',
                    'sort'                   => 'Urutkan',
                ],

                'users' => [
                    'active'                  => 'Aktif',
                    'associated_roles'        => 'Asosiasi Peran',
                    'confirmed'               => 'Dikonfirmasi',
                    'email'                   => 'Alamat E-mail',
                    'name'                    => 'Nama',
                    'other_permissions'       => 'Izin Lain',
                    'password'                => 'Sandi',
                    'password_confirmation'   => 'Sandi Konfirmasi',
                    'send_confirmation_email' => 'Kirim E-mail Konfirmasi',
                ],
            ],
        ],

        'frontend' => [
            'email'                     => 'Alamat E-mail',
            'name'                      => 'Nama',
            'password'                  => 'Sandi',
            'password_confirmation'     => 'Konfirmasi Sandi',
            'phone' => 'Phone',
            'message' => 'Message',
            'old_password'              => 'Sandi Lama',
            'new_password'              => 'Sandi Baru',
            'new_password_confirmation' => 'Konfirmasi Sandi Baru',
        ],
    ],

];
