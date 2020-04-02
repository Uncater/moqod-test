<?php

namespace App\Exceptions;

use Throwable;

class BadTeamDrainInputException extends \Exception
{
    const MESSAGE = 'Please provide only numeric values for team members drain';

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, $code, $previous);
    }
}
