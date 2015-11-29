<?php

namespace Falcon\Models\Shared;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The name of the table containing review data.
     *
     * @var string
     */
    protected $table = 'images';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['meta' => 'array'];
}
