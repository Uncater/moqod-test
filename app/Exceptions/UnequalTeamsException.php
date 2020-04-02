<?php

namespace App\Exceptions;

use Throwable;

class UnequalTeamsException extends \Exception
{
    const MESSAGE = 'All teams should be equal';

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, $code, $previous);
    }
}
