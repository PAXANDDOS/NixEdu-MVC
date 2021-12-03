<?php

namespace  Framework\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
        parent::__construct();
    }

    public function __toString()
    {
        return '<b>An error has occured:</b> ' . $this->message;
    }
}
