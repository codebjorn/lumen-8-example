<?php

namespace App\Validators;

use App\Exceptions\MemojiNotFound;
use App\Memoji\MemojiRepository;

class GenderValidator
{
    /**
     * @param  string  $name
     * @param  MemojiRepository  $repository
     *
     * @return bool
     *
     * @throws MemojiNotFound
     */
    public static function validate(string $name, MemojiRepository $repository): bool
    {
        if (! $repository->offsetExists($name)) {
            throw new MemojiNotFound('Gender not exists');
        }

        return true;
    }
}
