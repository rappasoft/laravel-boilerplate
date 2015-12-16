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

    'accepted'             => ':attribute musi zostać zaakceptowany.',
    'active_url'           => ':attribute nie jest poprawnym adresem URL.',
    'after'                => ':attribute musi być datą po :date.',
    'alpha'                => ':attribute może zawierać tylko litery.',
    'alpha_dash'           => ':attribute może zawierać tylko litery, cyfry i znaki "-" oraz "_".',
    'alpha_num'            => ':attribute może zawierać tylko litery i cyfry.',
    'array'                => ':attribute musi być tablicą.',
    'before'               => ':attribute musi być datą przed :date.',
    'between'              => [
        'numeric' => ':attribute musi być liczbą z przedziału :min - :max.',
        'file'    => 'Rozmiar :attribute musi być z przedziału :min - :max kb.',
        'string'  => ':attribute musi mieć minimum :min znaków i maksimum :max znaków.',
        'array'   => 'Tablica :attribute musi mieć minimalnie :min elementów i maksymalnie :max elementów.',
    ],
    'boolean'              => ':attribute musi być ustawione na "prawda" lub "fałsz".',
    'confirmed'            => 'Potwierdzenie :attribute nie pasuje.',
    'date'                 => ':attribute nie jest poprawną datą.',
    'date_format'          => ':attribute nie pasuje do formatu daty: :format.',
    'different'            => ':attribute i :other muszą się różnić.',
    'digits'               => ':attribute musi mieć :digits cyfr.',
    'digits_between'       => ':attribute musi mieć minimalnie :min cyfr a maksymalnie :max cyfr.',
    'email'                => ':attribute musi być poprawnym adresem e-mail.',
    'exists'               => 'Wybrany :attribute istnieje lub jest niepoprawny.',
    'filled'               => 'Pole :attribute jest wymagane.',
    'image'                => ':attribute musi być obrazkiem.',
    'in'                   => 'Wybrany :attribute jest niepoprawny.',
    'integer'              => ':attribute musi być liczbą całkowitą.',
    'ip'                   => ':attribute musi być poprawnym adresem IP.',
    'json'                 => ':attribute musi być poprawnym JSONem.',
    'max'                  => [
        'numeric' => ':attribute nie może byc większe niż :max.',
        'file'    => 'Rozmiar :attribute nie może być większy niż :max kb.',
        'string'  => 'Długość :attribute nie może być dłuższa niż :max znaków.',
        'array'   => 'Tablica :attribute nie może zawierać więcej elementów niż :max.',
    ],
    'mimes'                => ':attribute musi być jednym z podanych typów: :values.',
    'min'                  => [
        'numeric' => ':attribute musi mieć wartość przynajmniej :min.',
        'file'    => 'Rozmiar :attribute musi mieć przynajmniej :min kb.',
        'string'  => 'Długość :attribute musi mieć przynajmniej :min znaków.',
        'array'   => 'Tablica :attribute musi mieć przynajmniej :min elementów.',
    ],
    'not_in'               => ':attribute jest niepoprawny.',
    'numeric'              => ':attribute musi być liczbą.',
    'regex'                => 'Format pola :attribute jest niepoprawny.',
    'required'             => 'Pole :attribute jest wymagane.',
    'required_if'          => 'Pole :attribute jest wymagane jeżeli :other wynosi :value.',
	'required_unless'      => 'Pole :attribute jest wymagane jeżeli :other nie jest :values.',
    'required_with'        => 'Pole :attribute jest wymagane jeżeli została podana któraś z wartości :values.',
    'required_with_all'    => 'Pole :attribute jest wymagane jeżeli zostały podane wartości :values.',
    'required_without'     => 'Pole :attribute jest wymagane jeżeli któraś z wartości :values nie została podana.',
    'required_without_all' => 'Pole :attribute jest wymagane jeżeli nie podano żadnej z wartości :values.',
    'same'                 => 'Pole :attribute oraz :other muszą się zgadzać.',
    'size'                 => [
        'numeric' => ':attribute musi mieć rozmiar :size.',
        'file'    => 'Rozmiar :attribute musi być :size kb.',
        'string'  => 'Długość :attribute musi być :size znaków.',
        'array'   => 'Tablica :attribute musi posiadać :size elementów.',
    ],
    'string'               => ':attribute musi być ciągiem znaków.',
    'timezone'             => ':attribute musi być poprawną strefą czasową.',
    'unique'               => ':attribute musi być unikalny.',
    'url'                  => 'Format :attribute jest niepoprawny.',

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
        'name' => 'Nazwa',
        'email' => 'E-mail',
        'password' => 'Hasło',
        'password_confirmation' => 'Potwierdzenie hasła',
        'old_password' => 'Stare hasło',
        'new_password' => 'Nowe hasło',
        'new_password_confirmation' => 'Potwierdzenie nowego hasła',
        'created_at' => 'Stworzone',
        'last_updated' => 'Ostatnio zaktualizowano',
        'actions' => 'Akcje',
        'active' => 'Aktywne',
        'confirmed' => 'Potwierdzone',
        'send_confirmation_email' => 'Wyślij E-mail z potwierdzeniem',
        'associated_roles' => 'Przypisane role',
        'other_permissions' => 'Inne uprawnienia',
        'role_name' => 'Nazwa roli',
        'role_sort' => 'Sortowanie po rolach',
        'associated_permissions' => 'Przypisane uprawnienia',
        'permission_name' => 'Nazwa uprawnienia',
        'display_name' => 'Wyświetlana nazwa',
        'system_permission' => 'Uprawnienie systemowe?',
        'permission_group_name' => 'Nazwa grupy',
        'group' => 'Grupa',
        'group-sort' => 'Sortuj po grupie',
        'dependencies' => 'Zależności',
    ],

];
