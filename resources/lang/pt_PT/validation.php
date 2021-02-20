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

    'accepted' => 'O campo :attribute deve ser aceite.',
    'active_url' => 'O campo :attribute não contém um URL válido.',
    'after' => 'O campo :attribute deverá conter uma data posterior a :date.',
    'after_or_equal' => 'O campo :attribute deverá ser igual ou posterior a :date.',
    'alpha' => 'O campo :attribute deverá conter apenas letras.',
    'alpha_dash' => 'O campo :attribute deverá conter apenas letras, números e traços.',
    'alpha_num' => 'O campo :attribute deverá conter apenas letras e números .',
    'array' => 'O campo :attribute precisa de ser um conjunto.',
    'before' => 'O campo :attribute deverá conter uma data anterior a :date.',
    'before_or_equal' => 'O campo :attribute deverá ser igual ou anterior a :date.',
    'between' => [
        'numeric' => 'O campo :attribute deverá ter um valor entre :min - :max.',
        'file' => 'O campo :attribute deverá ter um tamanho entre :min - :max kilobytes.',
        'string' => 'O campo :attribute deverá conter entre :min - :max caracteres.',
        'array' => 'O campo :attribute precisar ter entre :min - :max items.',
    ],
    'boolean' => 'O campo :attribute deverá ter o valor verdadeiro ou falso.',
    'confirmed' => 'A confirmação para o campo :attribute não coincide.',
    'date' => 'O campo :attribute não contém uma data válida.',
    'date_equals' => 'O :attribute deverá ser uma data igual a :date.',
    'date_format' => 'A data indicada para o campo :attribute não respeita o formato :format.',
    'different' => 'Os campos :attribute e :other deverão conter valores diferentes.',
    'digits' => 'O campo :attribute deverá conter :digits dígitos.',
    'digits_between' => 'O campo :attribute deverá conter entre :min a :max dígitos.',
    'dimensions' => 'O :attribute possui dimensões inválidas para a imagem.',
    'distinct' => 'O campo :attribute possui um valor duplicado.',
    'email' => 'O campo :attribute não contém um endereço de email válido.',
    'ends_with' => 'O campo :attribute deve terminar com um dos seguintes valores: :values',
    'exists' => 'O valor selecionado para o campo :attribute é inválido.',
    'file' => 'O campo :attribute deverá ser um arquivo.',
    'filled' => 'O campo :attribute é obrigatório.',
    'gt' => [
        'numeric' => 'O campo :attribute deverá ser maior que :value.',
        'file' => 'O campo :attribute deverá ter mais do que :value kilobytes.',
        'string' => 'O campo :attribute deverá ser maior que :value caracteres.',
        'array' => 'O campo :attribute deverá ter mais do que :value items.',
    ],
    'gte' => [
        'numeric' => 'O campo :attribute deverá ser igual ou maior que :value.',
        'file' => 'O campo :attribute deverá ser igual ou maior que :value kilobytes.',
        'string' => 'O campo :attribute deverá ser igual ou maior que :value caracteres.',
        'array' => 'O campo :attribute deverá ter :value ou mais items.',
    ],
    'image' => 'O campo :attribute deverá conter uma imagem.',
    'in' => 'O campo :attribute não contém um valor válido.',
    'in_array' => 'O campo :attribute não existe em :other.',
    'integer' => 'O campo :attribute deverá conter um número inteiro.',
    'ip' => 'O campo :attribute deverá conter um endereço IP válido.',
    'ipv4' => 'O campo :attribute deverá conter um endereço IPv4 válido.',
    'ipv6' => 'O campo  :attribute deverá conter um endereço IPv6 válido.',
    'json' => 'O campo :attribute deverá conter uma string JSON válida.',
    'lt' => [
        'numeric' => 'O campo :attribute deverá ser menor que :value.',
        'file' => 'O campo :attribute deverá ter menos do que :value kilobytes.',
        'string' => 'O campo :attribute deverá ser menor que :value caracteres.',
        'array' => 'O campo :attribute deverá ter menos do que :value items.',
    ],
    'lte' => [
        'numeric' => 'O campo :attribute deverá ser menor ou igual que :value.',
        'file' => 'O campo :attribute deverá ser menor ou igual que :value kilobytes.',
        'string' => 'O campo :attribute deverá ser menor ou igual que :value caracteres.',
        'array' => 'O campo :attribute deverá ter :value ou menos items.',
    ],
    'max' => [
        'numeric' => 'O campo :attribute não deverá conter um valor superior a :max.',
        'file' => 'O campo :attribute não deverá ter um tamanho superior a :max kilobytes.',
        'string' => 'O campo :attribute não deverá conter mais de :max caracteres.',
        'array' => 'O campo :attribute deve ter no máximo :max items.',
    ],
    'mimes' => 'O campo :attribute deverá conter um arquivo do tipo: :values.',
    'mimetypes' => 'O campo :attribute deverá ser um ficheiro do tipo: :values.',
    'min' => [
        'numeric' => 'O campo :attribute deverá ter um valor superior ou igual a :min.',
        'file' => 'O campo :attribute deverá ter no mínimo :min kilobytes.',
        'string' => 'O campo :attribute deverá conter no mínimo :min caracteres.',
        'array' => 'O campo :attribute deverá ter no mínimo :min items.',
    ],
    'multiple_of' => 'O campo :attribute deverá ser um múltiplo de :value',
    'not_in' => 'O campo :attribute contém um valor inválido.',
    'not_regex' => 'O formato do :attribute é inválido.',
    'numeric' => 'O campo :attribute deverá conter um valor numérico.',
    'password' => 'A palavra-passe está incorreta.',
    'present' => 'O campo :attribute deverá existir.',
    'regex' => 'O formato do valor para o campo :attribute é inválido.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_if' => 'O campo :attribute é obrigatório quando o valor do campo :other é igual a :value.',
    'required_unless' => 'O campo :attribute é obrigatório exceto :other exista em :values.',
    'required_with' => 'O campo :attribute é obrigatório quando :values está presente.',
    'required_with_all' => 'O campo :attribute é obrigatório quando um dos :values está presente.',
    'required_without' => 'O campo :attribute é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos :values está presente.',
    'same' => 'Os campos :attribute e :other deverão conter valores iguais.',
    'size' => [
        'numeric' => 'O campo :attribute deverá conter o valor :size.',
        'file' => 'O campo :attribute deverá ter o tamanho de :size kilobytes.',
        'string' => 'O campo :attribute deverá conter :size caracteres.',
        'array' => 'O campo :attribute deverá ter :size items.',
    ],
    'starts_with' => 'O campo :attribute deverá iniciar com um dos seguintes: :values.',
    'string' => 'O campo :attribute deverá ser uma string.',
    'timezone' => 'O campo :attribute deverá ter um fuso horário válido.',
    'unique' => 'O valor indicado para o campo :attribute já se encontra utilizado.',
    'uploaded' => 'O envio do campo :attribute falhou.',
    'url' => 'O formato do URL indicado para o campo :attribute é inválido.',
    'uuid' => 'O campo :attribute deverá ser um UUID válido.',

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
            'rule-name' => 'nome-regra',
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
