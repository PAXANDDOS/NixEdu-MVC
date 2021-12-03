<?php

namespace  Framework\Exceptions;

use Exception;

class InternalServerException extends Exception
{
    protected string $message;

    public function __construct(string $message)
    {
        $this->message = $message;
        parent::__construct();
    }

    public function __toString()
    {
        return '<b>Internal server error:</b> ' . $this->message;
    }
}
