<?php

namespace App\Validators;

use App\Exceptions\MemojiNotFound;
use App\Memoji\MemojiRepository;

class GenderValidator
{
    /**
     * @param  string  $name
     *
     * @return bool
     *
     * @throws MemojiNotFound
     */
    public static function validate(string $name): bool
    {
        $repository = app(MemojiRepository::class);
        if (! $repository->offsetExists($name)) {
            throw new MemojiNotFound('Gender not exists');
        }

        return true;
    }
}
