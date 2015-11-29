<?php

namespace Falcon\Models\Servers\Multicraft;

use Falcon\Models\Shared\Model;

class CommandCache extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'multicraft_command_cache';

    /**
     * Get the owning Multicraft server
     *
     * @return mixed
     */
    public function server()
    {
        //return $this->belongsTo(Multicraft::class);
    }
}
