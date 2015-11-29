<?php

namespace Falcon\Models\Store;

use Falcon\Models\Model;

class ProductOption extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'display_order',
        'type',
        'name',
        'options',
        'required',
        'hidden'
    ];
}
