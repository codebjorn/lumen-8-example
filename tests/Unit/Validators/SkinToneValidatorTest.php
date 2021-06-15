<?php

use App\Exceptions\MemojiNotFound;
use App\Memoji\Memoji;
use App\Validators\SkinToneValidator;
use Illuminate\Support\Collection;

it('validates skinTone', function () {
    $memoji = mock(Memoji::class)
        ->shouldReceive('getSkinTones')
        ->andReturn(Collection::make(['white' => [], 'black' => []]))
        ->getMock();

    $validator = SkinToneValidator::validate($memoji, 'white');

    expect($validator)->toBeTrue();
});

it('throw exception on validates skinTone', function () {
    $memoji = mock(Memoji::class)
        ->shouldReceive('getSkinTones')
        ->andReturn(Collection::make(['white' => [], 'black' => []]))
        ->getMock();

    SkinToneValidator::validate($memoji, 'any');
})->throws(MemojiNotFound::class);


