<?php

use App\Exceptions\MemojiNotFound;
use Symfony\Component\HttpFoundation\Response;

it('is men memoji has black skin tone')
    ->get('api/men/mattew/black')
    ->assertResponseOk();

it('is men memoji has white skin tone')
    ->get('api/men/mattew/white')
    ->assertResponseOk();

it('shows memoji by skin tone')
    ->call('GET', 'api/men/mattew/black')
    ->assertJsonStructure([
        'url',
        'postures'
    ]);

it('not memoji by skin tone')
    ->get('api/men/mattew/green')
    ->assertResponseStatus(Response::HTTP_NOT_FOUND);
