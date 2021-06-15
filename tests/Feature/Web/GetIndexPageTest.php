<?php

it('has index page')
    ->get('/')
    ->assertResponseOk();

it('shows index page', function () {
    $content = test()
        ->call('GET', '/')
        ->getContent();

    expect($content)->toContain('Memoji API');
});
