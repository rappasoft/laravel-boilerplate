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

    'accepted'             => ':attribute deve essere accettato.',
    'active_url'           => ':attribute deve essere un URL valido.',
    'after'                => ':attribute deve essere dopo :date.',
    'alpha'                => ':attribute può contenere solo lettere.',
    'alpha_dash'           => ':attribute può contenere lettere, numeri e trattini.',
    'alpha_num'            => ':attribute può contenere solo lettere e numeri.',
    'array'                => ':attribute deve essere un array.',
    'before'               => ':attribute deve essere una data prima di :date.',
    'between'              => [
        'numeric' => ':attribute deve essere tra :min e :max.',
        'file'    => ':attribute deve essere tra :min e :max kilobytes.',
        'string'  => ':attribute deve avere tra :min e :max caratteri.',
        'array'   => ':attribute deve avere tra :min e :max elementi.',
    ],
    'boolean'              => ':attribute deve essere vero o falso.',
    'confirmed'            => ':attribute deve essere identico alla conferma.',
    'date'                 => ':attribute non è una data valida.',
    'date_format'          => ':attribute non corrisponde al formato di data :format.',
    'different'            => ':attribute e :other devono essere diversi.',
    'digits'               => ':attribute deve avere :digits cifre.',
    'digits_between'       => ':attribute deve avere tra :min and :max cifre.',
    'email'                => ':attribute deve essere un indirizzo email valido.',
    'exists'               => ':attribute non è valido.',
    'filled'               => ':attribute è richiesto.',
    'image'                => ":attribute deve essere un'immagine.",
    'in'                   => ':attribute non è valido.',
    'integer'              => ':attribute deve essere un numero intero.',
    'ip'                   => ':attribute deve essere un indirizzo IP valido.',
    'json'                 => ':attribute deve essere a valid JSON string.',
    'max'                  => [
        'numeric' => ':attribute non può essere più grande di :max.',
        'file'    => ':attribute non può essere più grande di :max kilobytes.',
        'string'  => ':attribute non può essere più lungo di :max caratteri.',
        'array'   => ':attribute non può avere più di :max elementi.',
    ],
    'mimes'                => ':attribute deve essere un file del tipo: :values.',
    'min'                  => [
        'numeric' => ':attribute deve essere almeno :min.',
        'file'    => ':attribute deve essere di almeno :min kilobytes.',
        'string'  => ':attribute deve essere lungo almeno :min caratteri.',
        'array'   => ':attribute deve avere almeno :min elementi.',
    ],
    'not_in'               => ':attribute non è valido.',
    'numeric'              => ':attribute deve essere un numero.',
    'regex'                => ':attribute ha un formato non valido.',
    'required'             => ':attribute è richiesto.',
    'required_if'          => ':attribute è rihiesto quando :other è :value.',
    'required_with'        => ':attribute è richiesto quando :values è presente.',
    'required_with_all'    => ':attribute è richiesto quando :values è presente.',
    'required_without'     => ':attribute è richiesto quando :values non è presente.',
    'required_without_all' => ':attribute è richiesto quando non è presente nessuno tra :values.',
    'same'                 => ':attribute and :other must match.',
    'size'                 => [
        'numeric' => ':attribute deve essere :size.',
        'file'    => ':attribute deve essere grande :size kilobytes.',
        'string'  => ':attribute deve essere lungo :size caratteri.',
        'array'   => ':attribute deve contenere :size elementi.',
    ],
    'string'               => ':attribute deve essere una stringa di testo.',
    'timezone'             => ':attribute deve essere una zona valida.',
    'unique'               => ':attribute è già presente.',
    'url'                  => ':attribute non è valido.',

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
        'name' => 'Nome',
        'email' => 'E-mail',
        'password' => 'Password',
        'password_confirmation' => 'Conferma password',
        'old_password' => 'Vecchia password',
        'new_password' => 'Nuova password',
        'new_password_confirmation' => 'Conferma nuova password',
        'created_at' => 'Creato',
        'last_updated' => 'Ultimo aggiornamento',
        'actions' => 'Azioni',
        'active' => 'Attivo',
        'confirmed' => 'Confermato',
        'send_confirmation_email' => 'Invia e-mail di conferma',
        'associated_roles' => 'Ruoli associati',
        'other_permissions' => 'Altri permessi',
        'role_name' => 'Nome del ruolo',
        'role_sort' => 'Ordine per ruolo',
        'associated_permissions' => 'Permessi associati',
        'permission_name' => 'Nome permesso',
        'display_name' => 'Nome visualizzato',
        'system_permission' => 'Permesso di sistema?',
        'permission_group_name' => 'Nome gruppo',
        'group' => 'Gruppo',
        'group-sort' => 'Ordine per gruppo',
        'dependencies' => 'Dipendenze',
    ],
];
