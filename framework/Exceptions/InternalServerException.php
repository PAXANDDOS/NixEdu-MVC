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
        error_log(\Framework\Handler::formatLog("Exception", $this->message, $this->getFile(), $this->getLine()), 3, APP_LOG);
        return "<b>Internal server error:</b> $this->message";
    }
}
