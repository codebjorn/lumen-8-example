<?php

use App\Exceptions\MemojiNotFound;
use App\Validators\NameValidator;
use Illuminate\Support\Collection;

it('validates name', function () {
    $collection = mock(Collection::class)
        ->shouldReceive('has')
        ->andReturn(true)
        ->getMock();

    $validator = NameValidator::validate($collection, 'any');

    expect($validator)->toBeTrue();
});

it('throw exception on validate of name', function () {
    $collection = mock(Collection::class)
        ->shouldReceive('has')
        ->andReturn(false)
        ->getMock();

    NameValidator::validate($collection, 'any');
})->throws(MemojiNotFound::class);


