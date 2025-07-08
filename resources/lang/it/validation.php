<?php

return [
    'required' => 'Il campo :attribute è obbligatorio.',
    'string' => 'Il campo :attribute deve essere una stringa.',
    'email' => 'Il campo :attribute deve essere un indirizzo email valido.',
    'description' => 'Il campo :attributo non deve superare la lunghezza massima',
    'max' => [
        'string' => 'Il campo :attribute non può superare :max caratteri.',
    ],
    'digits' => 'Il campo :attribute deve contenere :digits cifre.',

    'attributes' => [
        'name' => 'nome',
        'description' => 'descrizione',
        'address' => 'indirizzo',
        'city' => 'città',
        'postal_code' => 'CAP',
        'phone' => 'telefono',
        'email' => 'email',
        'opening_hours' => 'orari di apertura',
        'location' => 'posizione',
        'status' => 'stato',
        'complex_id' => 'id della struttura',
        'price_per_hour' => 'prezzo per ora',
        'type' => 'tipo',
    ],
];
