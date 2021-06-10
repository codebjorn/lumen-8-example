<?php

namespace App\Validators;

use App\Exceptions\MemojiNotFound;
use App\Memoji\Memoji;
use Illuminate\Support\Facades\File;

class PostureValidator
{
    /**
     * @throws MemojiNotFound
     */
    public static function validate(
        Memoji $memoji,
        string $skinTone,
        string $posture
    ): bool {
        $file = $memoji->getPosturePath($skinTone, $posture);
        $message = "Memoji posture with name {$posture} not exists.";
        if (! File::exists($file)) {
            throw new MemojiNotFound($message);
        }

        return true;
    }
}
