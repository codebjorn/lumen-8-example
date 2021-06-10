<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Path
    |--------------------------------------------------------------------------
    |
    | Path to memojies folder
    |
    */
    'path' => resource_path('memojies'),

    /*
    |--------------------------------------------------------------------------
    | Gender Men for memojies
    |--------------------------------------------------------------------------
    |
    | Stack here all memojies that has gender men
    |
    */
    'men' => [
        'mattew' => [
            'name' => 'Mattew',
        ],
        'justin' => [
            'name' => 'Justin',
        ],
        'ed' => [
            'name' => 'Ed',
        ],
        'donald' => [
            'name' => 'Donald',
        ],
        'chris' => [
            'name' => 'Chris',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Gender Women for memojies
    |--------------------------------------------------------------------------
    |
    | Stack here all memojies that has gender women
    |
    */
    'women' => [
        'angela' => [
            'name' => 'Angela',
            'postures' => ['lovely']
        ],
        'ariana' => [
            'name' => 'Ariana',
        ],
        'helen' => [
            'name' => 'Helen',
        ],
        'jennifer' => [
            'name' => 'Jennifer',
        ],
        'mary' => [
            'name' => 'Mary',
        ]
    ],
];
