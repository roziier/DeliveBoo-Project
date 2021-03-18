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

    'accepted' => 'La :attribute deve essere accettato.',
    'active_url' => "L':attribute non è un URL valido.",
    'after' => 'Il :attribute deve essere una data successiva un :date.',
    'after_or_equal' => 'Il :attribute deve essere una data successiva o uguale un :date.',
    'alpha' => 'Il :attribute può contenere solo lettere.',
    'alpha_dash' => 'Il :attribute può contenere solo lettere, numeri, trattini e trattini bassi.',
    'alpha_num' => 'Il :attribute può contenere solo lettere e numeri.',
    'array' => 'Il :attribute deve essere un array.',
    'before' => 'Il :attribute deve essere una data precedente un :date.',
    'before_or_equal' => 'Il :attribute deve essere una data precedente o uguale un :date.',
    'between' => [
        'numeric' => 'Il :attribute deve essere compreso tra :min e :max.',
        'file' => 'Il :attribute deve essere compreso tra :min e :max kilobytes.',
        'string' => 'Il :attribute deve essere compreso tra :min e :max caratteri.',
        'array' => 'Il :attribute deve have compreso tra :min e :max elementi.',
    ],
    'boolean' => 'Il campo :attribute deve essere true o false.',
    'confirmed' => 'La conferma della :attribute non corrisponde.',
    'date' => 'La :attribute non è una data valida.',
    'date_equals' => 'La :attribute deve essere una data uguale :date.',
    'date_format' => 'La :attribute non corrisponde al formato :format.',
    'different' => 'Il :attribute e :other devono essere diversi.',
    'digits' => 'Il :attribute deve essere :digits cifre.',
    'digits_between' => 'Il :attribute deve essere compreso tra :min e :max cifre.',
    'dimensions' => 'Il :attribute has invalid image dimensions.',
    'distinct' => 'Il campo :attribute  has un duplicate value.',
    'email' => ":attribute deve essere un indirizzo email valido.",
    'ends_with' => 'Il :attribute deve finire con uno dei seguenti valori: :values.',
    'exists' => 'Il selected :attribute è invalid.',
    'file' => 'Il :attribute deve essere un file.',
    'filled' => 'Il campo :attribute deve avere un valore.',
    'gt' => [
        'numeric' => 'Il :attribute deve essere maggiore di :value.',
        'file' => 'Il :attribute deve essere maggiore di :value kilobytes.',
        'string' => 'Il :attribute deve essere maggiore di :value caratteri.',
        'array' => 'Il :attribute deve have more di :value elementi.',
    ],
    'gte' => [
        'numeric' => 'Il :attribute deve essere maggiore di or equal :value.',
        'file' => 'Il :attribute deve essere maggiore di or equal :value kilobytes.',
        'string' => 'Il :attribute deve essere maggiore di or equal :value caratteri.',
        'array' => 'Il :attribute deve have :value elementi or more.',
    ],
    'image' => "Il :attribute deve essere un'immmagine.",
    'in' => 'Il selected :attribute non è valido.',
    'in_array' => 'Il campo :attribute non esiste in :other.',
    'integer' => 'Il :attribute deve essere un numero intero.',
    'ip' => 'Il :attribute deve essere un valido indirizzo IP .',
    'ipv4' => 'Il :attribute deve essere un valido indirizzo IPv4 .',
    'ipv6' => 'Il :attribute deve essere un valido indirizzo IPv6 .',
    'json' => 'Il :attribute deve essere un valida stringa JSON.',
    'lt' => [
        'numeric' => 'Il :attribute deve essere minore di :value.',
        'file' => 'Il :attribute deve essere minore di :value kilobytes.',
        'string' => 'Il :attribute deve essere minore di :value caratteri.',
        'array' => 'Il :attribute deve have minore di :value elementi.',
    ],
    'lte' => [
        'numeric' => 'Il :attribute deve essere minore di or equal :value.',
        'file' => 'Il :attribute deve essere minore di or equal :value kilobytes.',
        'string' => 'Il :attribute deve essere minore di or equal :value caratteri.',
        'array' => 'Il :attribute deve not have more di :value elementi.',
    ],
    'max' => [
        'numeric' => 'Il :attribute non può essere maggiore di :max.',
        'file' => 'Il :attribute non può essere maggiore di :max kilobytes.',
        'string' => 'Il :attribute non può essere maggiore di :max caratteri.',
        'array' => 'Il :attribute  non può avere più di :max elementi.',
    ],
    'mimes' => 'Il :attribute deve essere un file of type: :values.',
    'mimetypes' => 'Il :attribute deve essere un file of type: :values.',
    'min' => [
        'numeric' => 'Il :attribute deve esse
        re at least :min.',
        'file' => 'Il :attribute deve essere at least :min kilobytes.',
        'string' => 'Il :attribute deve essere at least :min caratteri.',
        'array' => 'Il :attribute deve have at least :min elementi.',
    ],
    'not_in' => 'Il selected :attribute è non valido.',
    'not_regex' => 'Il :attribute format è non valido.',
    'numeric' => 'Il :attribute deve essere un numero.',
    'password' => 'Il password è incorretta.',
    'present' => 'Il campo :attribute deve essere present.',
    'regex' => 'Il :attribute format è non valido.',
    'required' => 'Il campo :attribute è richiesto.',
    'required_if' => 'Il campo :attribute è richiesto quando :other è :value.',
    'required_unless' => 'Il campo :attribute è richiesto minore :other è in :values.',
    'required_with' => 'Il campo :attribute  è richiesto quando :values è present.',
    'required_with_all' => 'Il campo :attribute  è richiesto quando :values are present.',
    'required_without' => 'Il campo :attribute  è richiesto quando :values è not present.',
    'required_without_all' => 'Il campo :attribute  è richiesto quando nessuno dei valori :values sono presenti.',
    'same' => 'Il :attribute e :other deve match.',
    'size' => [
        'numeric' => 'Il :attribute deve essere :size.',
        'file' => 'Il :attribute deve essere :size kilobytes.',
        'string' => 'Il :attribute deve essere :size caratteri.',
        'array' => 'Il :attribute deve contain :size elementi.',
    ],
    'starts_with' => 'Il :attribute deve iniziare con uno dei seguenti valori: :values.',
    'string' => 'Il :attribute deve essere una stringa di testo.',
    'timezone' => 'Il :attribute deve essere una timezone valida.',
    'unique' => ':attribute già stato utilizzato.',
    'uploaded' => 'Il :attribute caricamento fallito.',
    'url' => 'Il :attribute format non è valido.',
    'uuid' => 'Il :attribute deve essere un UUID valido.',

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
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
