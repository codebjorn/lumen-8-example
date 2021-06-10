<?php

namespace App\Validators;

use App\Exceptions\MemojiNotFound;
use Illuminate\Support\Collection;

class NameValidator
{
    /**
     * @param  Collection  $gender
     * @param  string  $name
     *
     * @return bool
     *
     * @throws MemojiNotFound
     */
    public static function validate(Collection $gender, string $name): bool
    {
        if (! $gender->has($name)) {
            throw new MemojiNotFound("Memoji with name {$name} not exists.");
        }

        return true;
    }
}
