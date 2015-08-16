<?php

namespace Falcon\Models\Traits;

use Falcon\Models\Vote;

trait Voteable
{
    /**
     * Get all of the votes for the model
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }
}
