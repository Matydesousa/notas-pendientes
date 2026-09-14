<?php

return [
    'required' => 'El campo :attribute es obligatorio.',
    'string' => 'El campo :attribute debe ser texto.',
    'min' => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
    ],
    'max' => [
        'string' => 'El campo :attribute no debe superar :max caracteres.',
    ],

    'attributes' => [
        'title' => 'titulo',
        'description' => 'descripcion',
        'completed' => 'estado',
    ],
];
