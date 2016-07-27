<?php

namespace rjp2525\Audit\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requests';

    protected function updateTimestamps()
    {
        $time = $this->freshTimestamp();

        if (!$this->exists && ~$this->isDirty(static::CREATED_AT)) {
            $this->setCreatedAt($time);
        }
    }
}
