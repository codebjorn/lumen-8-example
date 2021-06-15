<?php

use Symfony\Component\HttpFoundation\Response;

it('has memoji men with happy posture')
    ->get('api/men/mattew/white/happy')
    ->assertResponseOk();

it('has memoji women with lovely posture')
    ->get('api/women/angela/white/lovely')
    ->assertResponseOk();

it('shows memoji by happy posture',)
    ->call('GET', 'api/men/mattew/white/happy')
    ->assertHeader('content-type', 'image/png');

it('not memoji by gender & name')
    ->get('api/men/unknown')
    ->assertResponseStatus(Response::HTTP_NOT_FOUND);
