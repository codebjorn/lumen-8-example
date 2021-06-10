<?php

namespace App\Exceptions;

use Exception;
use JetBrains\PhpStorm\Pure;
use Throwable;

class MemojiNotFound extends Exception
{
    /**
     * MemojiNotFound constructor.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  Throwable|null  $previous
     */
    #[Pure]
    public function __construct(
        $message = '',
        $code = 404,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
