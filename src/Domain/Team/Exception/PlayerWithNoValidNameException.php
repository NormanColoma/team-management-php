<?php


namespace App\Domain\Team\Exception;


use Exception;
use Throwable;

class PlayerWithNoValidNameException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}