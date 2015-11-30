<?php

namespace Falcon\Models\Shared;

use Falcon\Models\Shared\Model;

class Price extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prices';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Return all of the owning priceable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function priceable()
    {
        return $this->morphTo();
    }
}
