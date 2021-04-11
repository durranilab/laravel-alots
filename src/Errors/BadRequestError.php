<?php

namespace Durranilab\Alots\Errors;

class BadRequestError extends Error
{
    public function __construct($message, $httpStatusCode)
    {
        parent::__construct($message, $httpStatusCode);
    }
}
