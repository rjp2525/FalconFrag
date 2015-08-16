<?php

namespace Falcon\Models\Account;

use Falcon\Models\Model;

class Country extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'a2', 'a3', 'currency', 'calling_code', 'capital', 'latitude', 'longitude'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'currency' => 'array',
        'calling_code' => 'array',
    ];
}
