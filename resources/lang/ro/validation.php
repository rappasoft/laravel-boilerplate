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

    'accepted' => ':attribute trebuie acceptat.',
    'active_url' => ':attribute nu este un URL valid.',
    'after' => ':attribute trebuie sa fie o data inainte de :date.',
    'after_or_equal' => ':attribute trebuie sa fie o data inainte de sau egala cu :date.',
    'alpha' => ':attribute poate contine doar litere.',
    'alpha_dash' => ':attribute poate contine doar litere, numere, puncte sau underscore.',
    'alpha_num' => ':attribute poate contine doar litere si numere.',
    'array' => ':attribute trebuie sa fie un array.',
    'before' => ':attribute trebuie sa fie o data inainte de :date.',
    'before_or_equal' => ':attribute trebuie sa fie o data inainte de sau egala cu :date.',
    'between' => [
        'numeric' => ':attribute trebuie sa fie intre :min si :max.',
        'file' => ':attribute trebuie sa fie intre :min si :max kilobytes.',
        'string' => ':attribute trebuie sa fie intre :min si :max caractere.',
        'array' => ':attribute trebuie sa fie intre :min si :max obiecte.',
    ],
    'boolean' => ':attribute trebuie sa fie adevarat sau fals.',
    'confirmed' => ':attribute confirmarea nu se potriveste.',
    'date' => ':attribute nu este o data valida.',
    'date_equals' => ':attribute trebuie sa fie o data egala cu :date.',
    'date_format' => ':attribute nu se potriveste cu formatul :format.',
    'different' => ':attribute si :other trebuie sa fie diferite.',
    'digits' => ':attribute trebuie sa contina :digits cifre.',
    'digits_between' => ':attribute trebuie sa contina intre :min si :max cifre.',
    'dimensions' => ':attribute are dimensiunile imaginii invalide.',
    'distinct' => ':attribute campul are valoare duplicat.',
    'email' => ':attribute trebuie sa fie o adresa de email valida.',
    'ends_with' => ':attribute trebuie sa se termine cu una din urmatoarele valori: :values.',
    'exists' => 'Atributul selectat :attribute este invalid.',
    'file' => ':attribute trebuie sa fie un fisier.',
    'filled' => ':attribute trebuie sa aibe o valoare.',
    'gt' => [
        'numeric' => ':attribute trebuie sa fie mai mare sau egal cu :value.',
        'file' => ':attribute trebuie sa fie mai mare de :value kilobytes.',
        'string' => ':attribute trebuie sa contina mai mult de :value caractere.',
        'array' => ':attribute trebuie sa aiba mai mult de :value obiecte.',
    ],
    'gte' => [
        'numeric' => ':attribute trebuie sa fie mai mare sau egal cu :value.',
        'file' => ':attribute trebuie sa aiba cel putin :value kilobytes.',
        'string' => ':attribute trebuie sa contina cel putin :value caractere.',
        'array' => ':attribute trebuie sa aiba cel putin :value obiecte.',
    ],
    'image' => ':attribute trebuie sa fie o imagine.',
    'in' => 'Atributul selectat :attribute este invalid.',
    'in_array' => 'Campul :attribute nu exista in :other.',
    'integer' => ':attribute trebuie sa fie o valoare intreaga.',
    'ip' => ':attribute trebuie sa fie o adresa IP valida.',
    'ipv4' => ':attribute trebuie sa fie o adresa IPv4 valida.',
    'ipv6' => ':attribute trebuie sa fie o adresa IPv6 valida.',
    'json' => ':attribute trebuie sa fie un string JSON valid.',
    'lt' => [
        'numeric' => ':attribute trebuie sa fie mai mic decat :value.',
        'file' => ':attribute trebuie sa aiba mai putin de :value kilobytes.',
        'string' => ':attribute trebuie sa contina mai putin de :value caractere.',
        'array' => ':attribute trebuie sa aiba mai putin de :value obiecte.',
    ],
    'lte' => [
        'numeric' => ':attribute trebuie sa fie mai mic sau egal decat :value.',
        'file' => ':attribute trebuie sa aiba o dimensiune de cel mult :value kilobytes.',
        'string' => ':attribute trebuie sa contina cel mult :value caractere.',
        'array' => ':attribute nu trebuie sa aiba mai mult de :value obiecte.',
    ],
    'max' => [
        'numeric' => ':attribute nu poate fi mai mare decat :max.',
        'file' => ':attribute nu poate depasi dimensiunea de :max kilobytes.',
        'string' => ':attribute nu poate sa contina mai mult de :max caractere.',
        'array' => ':attribute nu poate avea mai mult de :max obiecte.',
    ],
    'mimes' => ':attribute trebuie sa fie un fisier de tipul: :values.',
    'mimetypes' => ':attribute trebuie sa fie un fisier de tipul: :values.',
    'min' => [
        'numeric' => ':attribute trebuie sa fie cel putin :min.',
        'file' => ':attribute trebuie sa aiba cel putin :min kilobytes.',
        'string' => ':attribute trebuie sa contina cel putin :min caractere.',
        'array' => ':attribute trebuie sa aiba cel putin :min obiecte.',
    ],
    'multiple_of' => ':attribute trebuie sa fie un multiplu de :value',
    'not_in' => 'Atributul selectat :attribute este invalid.',
    'not_regex' => 'Formatul :attribute este invalid.',
    'numeric' => ':attribute trebuie sa fie un numar.',
    'password' => 'Parola este incorecta.',
    'present' => ':attribute trebuie sa fie prezent.',
    'regex' => 'Formatul :attribute este invalid.',
    'required' => 'Campul :attribute este obligatoriu.',
    'required_if' => 'Campul :attribute este obligatoriu cand :other este :value.',
    'required_unless' => 'Campul :attribute este obligatoriu cu exceptia cand :other se afla in :values.',
    'required_with' => 'Campul :attribute este obligatoriu cand :values este prezenta.',
    'required_with_all' => 'Campul :attribute este obligatoriu cand :values sunt prezente.',
    'required_without' => 'Campul :attribute este obligatoriu cand :values nu este prezent.',
    'required_without_all' => 'Campul :attribute este obligatoriu cand niciunul dintre :values nu este prezent.',
    'same' => ':attribute si :other trebuie sa fie la fel.',
    'size' => [
        'numeric' => ':attribute trebuie sa fie :size.',
        'file' => ':attribute trebuie sa aiba :size kilobytes.',
        'string' => ':attribute trebuie sa contina :size caractere.',
        'array' => ':attribute trebuie sa contina :size obiecte.',
    ],
    'starts_with' => ':attribute trebuie sa inceapa cu una din urmatoarele valori: :values.',
    'string' => ':attribute trebuie sa fie un sir de caractere.',
    'timezone' => ':attribute trebuie sa fie o zona de timp valida.',
    'unique' => ':attribute este deja folosit.',
    'uploaded' => ':attribute nu a putut fi uploadat.',
    'url' => 'Formatul :attribute este invalid.',
    'uuid' => ':attribute trebuie sa fie un UUID valid.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
