<?php

namespace Durranilab\Alots\Facades;

use Illuminate\Support\Facades\Facade;

class Alots extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'alots';
    }
}
