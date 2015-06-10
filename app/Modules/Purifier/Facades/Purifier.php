<?php

namespace Falcon\Modules\Purifier\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Falcon\Modules\Purifier\Purifier
 */
class Purifier extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'purifier';
    }
}
