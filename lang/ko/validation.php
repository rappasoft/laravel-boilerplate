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

    'accepted' => ':attribute 을(를) 수락해야 합니다.',
    'active_url' => ':attribute 은(는) 올바른 URL이 아닙니다.',
    'after' => ':attribute 은(는) :date 이후의 날짜여야 합니다.',
    'after_or_equal' => ':attribute 은(는) :date 이후 또는 다음 날짜여야 합니다.',
    'alpha' => ':attribute 에는 문자만 포함될 수 있습니다.',
    'alpha_dash' => ':attribute 에는 문자, 숫자, 대시 및 밑줄만 사용할 수 있습니다.',
    'alpha_num' => ':attribute 에는 문자와 숫자만 포함될 수 있습니다.',
    'array' => ':attribute 은(는) 배열이어야 합니다.',
    'before' => ':attribute 은(는) :date 이전 날짜여야 합니다.',
    'before_or_equal' => ':attribute 는 :date 이전 또는 이전 날짜여야 합니다.',
    'between' => [
        'numeric' => ':attribute 은(는) :min 에서 :max 사이여야 합니다.',
        'file' => ':attribute 은(는) :min 에서 :max kilobytes 사이여야 합니다.',
        'string' => ':attribute 은(는) :min 과 :max 문자 사이여야 합니다.',
        'array' => ':attribute 은(는) :min 과 :max 항목 사이에 있어야 합니다.',
    ],
    'boolean' => ':attribute 필드는 true 또는 false여야 합니다.',
    'confirmed' => ':attribute 확인이 일치하지 않습니다.',
    'date' => ':attribute 은(는) 유효한 날짜가 아닙니다.',
    'date_equals' => ':attribute 은(는) :date 와 같은 날짜여야 합니다.',
    'date_format' => ':attribute 가 :format 형식과 일치하지 않습니다.',
    'different' => ':attribute 와 :other 는 달라야 합니다.',
    'digits' => ':attribute 은(는) :digits 자리여야 합니다.',
    'digits_between' => ':attribute 는 :min 에서 :max 자리 사이여야 합니다.',
    'dimensions' => ':attribute 이미지 사이즈가 잘못되었습니다.',
    'distinct' => ':attribute 필드에 중복된 값이 있습니다.',
    'email' => ':attribute 은(는) 올바른 이메일 주소여야 합니다.',
    'ends_with' => ':attribute 은(는) 다음 중 하나로 끝나야 합니다: :values.',
    'exists' => '선택한 :attribute 이 잘못되었습니다.',
    'file' => ':attribute 은(는) 파일이어야 합니다.',
    'filled' => ':attribute 필드에는 값이 있어야 합니다.',
    'gt' => [
        'numeric' => ':attribute 은(는) :value 보다 커야 합니다.',
        'file' => ':attribute 은(는) :value kilobytes 보다 커야 합니다.',
        'string' => ':attribute 은(는) :value 문자보다 커야 합니다.',
        'array' => ':attribute 에는 :value 항목이 여러 개 있어야 합니다.',
    ],
    'gte' => [
        'numeric' => ':attribute 은(는) :value 보다 크거나 같아야 합니다.',
        'file' => ':attribute 은(는) :value kilobytes 보다 크거나 같아야 합니다.',
        'string' => ':attribute 은(는) :value 문자보다 크거나 같아야 합니다.',
        'array' => ':attribute 에는 :value 항목 이상이 있어 합니다.',
    ],
    'image' => ':attribute 은(는) 이미지여야 합니다.',
    'in' => '선택한 :attribute 이(가) 잘못되었습니다.',
    'in_array' => ':attribute 필드는 :other 에 존재하지 않습니다.',
    'integer' => ':attribute 은(는) 정수여야 합니다.',
    'ip' => ':attribute 은(는) 올바른 IP 주소여야 합니다.',
    'ipv4' => ':attribute 은(는) 유효한 IPv4 주소여야 합니다.',
    'ipv6' => ':attribute 은(는) 유효한 IPv6 주소여야 합니다.',
    'json' => ':attribute 은(는) 유효한 JSON 문자열이어야 합니다.',
    'lt' => [
        'numeric' => ':attribute 은(는) :value 보다 작아야 합니다.',
        'file' => ':attribute 은(는) :value kilobytes 보다 작아야 합니다.',
        'string' => ':attribute 은(는) :value 문자보다 작아야 합니다.',
        'array' => ':attribute 에는 :value 보다 작은 항목이 있어야 합니다.',
    ],
    'lte' => [
        'numeric' => ':attribute 은(는) :value 보다 작거나 같아야 합니다.',
        'file' => ':attribute 은(는) :value kilobytes 보다 작거나 같아야 합니다.',
        'string' => ':attribute 은(는) :value 문자보다 작거나 같아야 합니다.',
        'array' => ':attribute 은(는) :value 항목을 초과할 수 없습니다.',
    ],
    'max' => [
        'numeric' => ':attribute 은(는) :max 보다 클 수 없습니다.',
        'file' => ':attribute 은(는) :max kilobytes 보다 클 수 없습니다.',
        'string' => ':attribute 은(는) :max 문자보다 클 수 없습니다.',
        'array' => ':attribute 은(는) :max 항목을 초과할 수 없습니다.',
    ],
    'mimes' => ':attribute 은(는) 해당 형식의 파일이어야 합니다: :values.',
    'mimetypes' => ':attribute 은(는) 파일 형식이어야 합니다: :values.',
    'min' => [
        'numeric' => ':attribute 는 최소 :min 이상이어야 합니다.',
        'file' => ':attribute 은(는) 최소 :min kilobytes 이어야 합니다.',
        'string' => ':attribute 은(는) 최소 :min 자 이상이어야 합니다..',
        'array' => ':attribute 에는 :min 이상의 항목이 있어야 합니다.',
    ],
    'multiple_of' => ':attribute 은(는) :value 의 배수여야 합니다.',
    'not_in' => '선택한 :attribute 이(가) 잘못되었습니다.',
    'not_regex' => ':attribute 형식이 잘못되었습니다.',
    'numeric' => ':attribute 은(는) 숫자여야 합니다.',
    'password' => '비밀번호가 올바르지 않습니다.',
    'present' => ':attribute 필드가 있어야 합니다.',
    'regex' => ':attribute 형식이 올바르지 않습니다.',
    'required' => ':attribute 의 필드는 필수입니다.',
    'required_if' => ':other 이(가) :value 인 경우 :attribute 필드가 필요합니다.',
    'required_unless' => ':other 이(가) :values 에 없다면, :attribute 필드가 필요합니다.',
    'required_with' => ':values 이(가) 존재하는 경우, :attribute 필드가 필요합니다.',
    'required_with_all' => ':values 이(가) 존재하는 경우, :attribute 필드가 필요합니다.',
    'required_without' => ':values 이(가) 존재하지 않는 경우, :attribute 필드가 필요합니다.',
    'required_without_all' => ':values 이(가) 존재하지 않는 경우, :attribute 필드가 필요합니다.',
    'same' => ':attribute 와 :other 이(가) 일치해야 합니다.',
    'size' => [
        'numeric' => ':attribute 의 크기는 :size 이어야 합니다.',
        'file' => ':attribute 의 크기는 :size kilobytes 이어야 합니다.',
        'string' => ':attribute 는 :size 문자여야 합니다.',
        'array' => ':attribute 에는 :size 항목이 포함되어야 합니다.',
    ],
    'starts_with' => ':attribute 은 다음 중 하나로 시작해야 합니다: :values.',
    'string' => ':attribute 은(는) 문자열이어야 합니다.',
    'timezone' => ':attribute 은(는) 유효한 영역이여야 합니다.',
    'unique' => ':attribute 이(가) 이미 사용되었습니다.',
    'uploaded' => ':attribute 을 업로드하지 못했습니다.',
    'url' => ':attribute 형식이 잘못되었습니다.',
    'uuid' => ':attribute 은(는) 유효한 UUID 여야 합니다.',

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
