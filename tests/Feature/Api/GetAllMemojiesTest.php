<?php

it('has all memojies')
    ->get('api/all')
    ->assertResponseOk();

it('shows all memojies')
    ->call('GET', 'api/all')
    ->assertJsonStructure([
        '*' => [
            'name',
            'slug',
            'gender',
            'url',
            'skinTones' => [
                '*' => [
                    'url',
                    'postures'
                ],
            ]
        ]
    ]);
