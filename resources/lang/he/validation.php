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

    'accepted'             => 'השדה :attribute חייב להכיל תקין.',
    'active_url'           => 'השדה :attribute אינו קישור תקין.',
    'after'                => 'השדה :attribute חייב להכיל תאריך אחרי :date.',
    'after_or_equal'       => 'השדה :attribute חייב להכיל התאריך :date או מאוחר יותר.',
    'alpha'                => 'השדה :attribute יכול להכיל אותיות בלבד.',
    'alpha_dash'           => 'השדה :attribute יכול להכיל אותיות, מספרים ומקפים בלבד.',
    'alpha_num'            => 'השדה :attribute יכול להכיל אותיות ומספרים בלבד.',
    'array'                => 'השדה :attribute חייב להכיל מערך.',
    'before'               => 'השדה :attribute חייב להכיל תאריך לפני :date.',
    'before_or_equal'      => 'השדה :attribute חייב להכיל התאריך :date או מוקדם יותר.',
    'between'              => [
        'numeric' => 'השדה :attribute חייב להכיל בין :min ל-:max.',
        'file'    => 'השדה :attribute חייב להכיל בין :min ל-:max קילובייט.',
        'string'  => 'השדה :attribute חייב להכיל בין :min ל-:max תווים.',
        'array'   => 'השדה :attribute חייב להכיל בין :min ל-:max פריטים.',
    ],
    'boolean'              => 'השדה :attribute חייב להכיל אמת או שקר.',
    'confirmed'            => 'אימות :attribute לא מתאים.',
    'date'                 => 'השדה :attribute אינו תאריך תקין.',
    'date_format'          => 'השדה :attribute לא תואם את הפורמט :format.',
    'different'            => 'השדה :attribute ו-:other חייבים להיות שונים זה מזה.',
    'digits'               => 'השדה :attribute חייב להכיל באורך :digits ספרות.',
    'digits_between'       => 'השדה :attribute חייב להכיל בין :min ל-:max digits.',
    'dimensions'           => 'מימדי התמונה בשדה :attribute לא תקינים.',
    'distinct'             => 'יש כפילות בשדה :attribute.',
    'email'                => 'השדה :attribute חייב להכיל כתובת דוא"ל תקינה.',
    'exists'               => 'נבחר :attribute לא תקין.',
    'file'                 => 'השדה :attribute חייב להכיל קובץ.',
    'filled'               => 'השדה :attribute לא יכול להיות ריק.',
    'image'                => 'השדה :attribute חייב להכיל תמונה.',
    'in'                   => 'נבחר :attribute לא תקין.',
    'in_array'             => 'השדה :attribute לא קיים ב :other.',
    'integer'              => 'השדה :attribute חייב להכיל מספר שלם.',
    'ip'                   => 'השדה :attribute חייב להכיל כתובת IP תקינה.',
    'ipv4'                 => 'השדה :attribute חייב להכיל כתובת IPv4 תקינה.',
    'ipv6'                 => 'השדה :attribute חייב להכיל כתובת IPv6 תקינה.',
    'json'                 => 'השדה :attribute חייב להכיל מחרוזת JSON.',
    'max'                  => [
        'numeric' => 'השדה :attribute לא יכול להיות גדול מ-:max.',
        'file'    => 'השדה :attribute לא יכול להיות גדול מ-:max קילובייט.',
        'string'  => 'השדה :attribute לא יכול להיות גדול מ-:max תווים.',
        'array'   => 'השדה :attribute לא יכול להכיל יותר מ-:max פריטים.',
    ],
    'mimes'                => 'השדה :attribute חייב להיות קובץ מהסוג: :values.',
    'mimetypes'            => 'השדה :attribute חייב להיות קובץ מהסוג: :values.',
    'min'                  => [
        'numeric' => 'השדה :attribute חייב להכיל לפחות :min.',
        'file'    => 'השדה :attribute חייב להכיל לפחות :min קילובייט.',
        'string'  => 'השדה :attribute חייב להכיל לפחות :min תווים.',
        'array'   => 'השדה :attribute חייב להכיל לפחות :min פריטים.',
    ],
    'not_in'               => 'נבחר :attribute לא תקין.',
    'numeric'              => 'השדה :attribute חייב להיות מספר.',
    'present'              => 'השדה :attribute חייב להיות נוכח.',
    'regex'                => 'השדה :attribute מכיל פורמט לא תקין.',
    'required'             => 'השדה :attribute הוא שדה חובה.',
    'required_if'          => 'השדה :attribute הוא שדה חובה כאשר :other הינו :value.',
    'required_unless'      => 'השדה :attribute הוא שדה חובה אלא אם :other הינו :values.',
    'required_with'        => 'השדה :attribute הוא שדה חובה כאשר :values קיים.',
    'required_with_all'    => 'השדה :attribute הוא שדה חובה כאשר :values קיים.',
    'required_without'     => 'השדה :attribute הוא שדה חובה כאשר :values אינו קיים.',
    'required_without_all' => 'השדה :attribute הוא שדה חובה כאשר אף אחד מהערכים :values קיימים.',
    'same'                 => 'השדה :attribute והשדה :other חייבים להתאים זה לזה.',
    'size'                 => [
        'numeric' => 'השדה :attribute חייב להיות :size.',
        'file'    => 'השדה :attribute חייב להיות :size קילובייט.',
        'string'  => 'השדה :attribute חייב להיות :size תווים.',
        'array'   => 'השדה :attribute חייב להכיל :size פריטים.',
    ],
    'string'               => 'השדה :attribute חייב להיות מחרוזת.',
    'timezone'             => 'השדה :attribute חייב להיות איזור זמן.',
    'unique'               => ':attribute זה כבר נתפס.',
    'uploaded'             => 'הקובץ :attribute לא הועלה.',
    'url'                  => 'הפורמט בשדה :attribute לא תקין.',

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
                    'associated_roles' => 'תפקידים משוייכים',
                    'dependencies'     => 'דרישות סף',
                    'display_name'     => 'שם לתצוגה',
                    'group'            => 'קבוצה',
                    'group_sort'       => 'מיון קבוצות',

                    'groups' => [
                        'name' => 'שם קבוצה',
                    ],

                    'name'       => 'שם',
                    'first_name' => 'שם פרטי',
                    'last_name'  => 'שם משפחה',
                    'system'     => 'מערכת',
                ],

                'roles' => [
                    'associated_permissions' => 'הרשאות משוייכות',
                    'name'                   => 'שם',
                    'sort'                   => 'מיון',
                ],

                'users' => [
                    'active'                  => 'פעיל',
                    'associated_roles'        => 'תפקידים משוייכים',
                    'confirmed'               => 'מאומת',
                    'email'                   => 'כתובת דוא"ל',
                    'name'                    => 'שם',
                    'last_name'               => 'שם משפחה',
                    'first_name'              => 'שם פרטי',
                    'other_permissions'       => 'הרשאות אחרות',
                    'password'                => 'סיסמה',
                    'password_confirmation'   => 'אימות סיסמה',
                    'send_confirmation_email' => 'שליחת מייל אימות',
                    'timezone'                  => 'איזור זמן',
                ],
            ],
        ],

        'frontend' => [
            'avatar'                    => 'תמונה',
            'email'                     => 'כתובת דוא"ל',
            'first_name'                => 'שם פרטי',
            'last_name'                 => 'שם משפחה',
            'name'                        => 'שם מלא',
            'password'                  => 'סיסמה',
            'password_confirmation'     => 'אימות סיסמה',
            'phone' => 'Phone',
            'message' => 'Message',
            'new_password'              => 'סיסמה חדשה',
            'new_password_confirmation' => 'אימות סיסמה חדשה',
            'old_password'              => 'סיסמה ישנה',
            'timezone'                    => 'איזור זמן',
        ],
    ],

];
