<?php

use App\Exceptions\MemojiNotFound;
use App\Memoji\MemojiRepository;
use App\Validators\GenderValidator;

it('validates gender', function () {
    $repository = mock(MemojiRepository::class)
        ->shouldReceive('offsetExists')
        ->andReturn(true)
        ->getMock();

    $validator = GenderValidator::validate('any', $repository);

    expect($validator)->toBeTrue();
});

it('throw exception on validate of gender', function () {
    $repository = mock(MemojiRepository::class)
        ->shouldReceive('offsetExists')
        ->andReturn(false)
        ->getMock();

    GenderValidator::validate('any', $repository);
})->throws(MemojiNotFound::class);
