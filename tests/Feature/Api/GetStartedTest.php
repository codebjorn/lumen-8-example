<?php

it('has api start page')
    ->get('api')
    ->assertResponseOk();

it('shows api start page')
    ->call('GET', 'api')
    ->assertJsonStructure([
        'message',
        'url'
    ]);
