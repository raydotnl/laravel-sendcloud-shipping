<?php

namespace DenizTezcan\SendCloud\Facades;

use Illuminate\Support\Facades\Facade;

class SendCloud extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shipping-sendcloud';
    }
}
