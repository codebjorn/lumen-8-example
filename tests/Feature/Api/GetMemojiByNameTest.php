<?php

use App\Exceptions\MemojiNotFound;
use Symfony\Component\HttpFoundation\Response;

it('has men memoji')
    ->get('api/men/mattew')
    ->assertResponseOk();

it('has women memoji')
    ->get('api/women/angela')
    ->assertResponseOk();

it('shows memoji by gender & name')
    ->call('GET', 'api/men/mattew')
    ->assertJsonStructure([
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
    ]);

it('not memoji by gender & name')
    ->get('api/men/unknown')
    ->assertResponseStatus(Response::HTTP_NOT_FOUND);
