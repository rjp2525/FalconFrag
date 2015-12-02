<?php

namespace Falcon\Models\Shop;

use Falcon\Models\Shared\Model;
use Falcon\Models\Shared\Price;
use Falcon\Models\Shop\Product;

class Option extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'product_options';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Retrieve the product that the option belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Return the prices for the current option
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function prices()
    {
        return $this->morphOne(Price::class);
    }

    /**
     * Retrieve the options ordered by the display_order.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }

    /**
     * Build an option HTML element
     *
     * @return mixed
     */
    public function buildElement()
    {
        if (!$this->hidden) {
            return;
        }

        if ($this->type == 'text') {
            return '<input type="text" id="' . $this->field_id . '" name="' . $this->field_id . '" class="form-input">';
        }
    }
}
