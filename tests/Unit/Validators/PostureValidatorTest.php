<?php

use App\Exceptions\MemojiNotFound;
use App\Memoji\Memoji;
use App\Validators\PostureValidator;
use Illuminate\Support\Facades\File;

uses(TestCase::class);

it('validates posture', function () {
    $memoji = mock(Memoji::class)
        ->shouldReceive('getPosturePath')
        ->andReturn('any')
        ->getMock();

    File::shouldReceive('exists')
        ->once()
        ->andReturn(true);

    $validator = PostureValidator::validate($memoji, 'any', 'any');

    expect($validator)->toBeTrue();
});

it('throw exception on validate of posture', function () {
    $memoji = mock(Memoji::class)
        ->shouldReceive('getPosturePath')
        ->andReturn('any')
        ->getMock();

    File::shouldReceive('exists')
        ->once()
        ->andReturn(false);

    PostureValidator::validate($memoji, 'any', 'any');
})->throws(MemojiNotFound::class);


