<?php

namespace App\Validators;

use App\Exceptions\MemojiNotFound;
use App\Memoji\Memoji;

class SkinToneValidator
{
    /**
     * @param  Memoji  $memoji
     * @param  string  $skinTone
     *
     * @return bool
     *
     * @throws MemojiNotFound
     */
    public static function validate(Memoji $memoji, string $skinTone): bool
    {
        $message = "Memoji skinTone with name {$skinTone} not exists.";
        if (! $memoji->getSkinTones()->has($skinTone)) {
            throw new MemojiNotFound($message);
        }

        return true;
    }
}
