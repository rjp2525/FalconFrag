<?php

namespace rjp2525\Audit;

use Illuminate\Support\Facades\Facade;

class AuditFacade extends Facade
{
    /**
     * Get the package facade accessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'audit';
    }
}
