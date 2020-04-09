<?php

namespace Bhavinjr\Alots\Errors;

use Exception;

class Error extends Exception
{
    protected $httpStatusCode;

    public function __construct($message, $httpStatusCode)
    {
        $this->message = $message;

        $this->httpStatusCode = $httpStatusCode;
    }

    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }
}
