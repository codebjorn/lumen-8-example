<?php

use Symfony\Component\HttpFoundation\Response;

it('has men gender memojies')
    ->get('api/men')
    ->assertResponseOk();

it('has women gender memojies')
    ->get('api/women')
    ->assertResponseOk();

it('shows gender memojies')
    ->call('GET', 'api/men')
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

it('not shows gender memojies')
    ->get('api/other')
    ->assertResponseStatus(Response::HTTP_NOT_FOUND);
