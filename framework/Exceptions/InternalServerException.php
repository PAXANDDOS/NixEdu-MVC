<?php

namespace  Framework\Exceptions;

class InternalServerException extends \Exception
{
    protected $message;

    public function __construct(string $message)
    {
        $this->message = $message;
        parent::__construct();
    }

    public function __toString()
    {
        return "<b>Internal server error:</b> $this->message";
    }
}
