<?php

namespace Falcon\Models\Shop;

use Falcon\Models\Shared\Model;
use Falcon\Models\Shared\Price;
use Falcon\Models\Shared\Traits\Reviewable;
use Falcon\Models\Shop\Category;
use Falcon\Models\Shop\Option;

class Product extends Model
{
    use Reviewable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'description_short', 'description', 'options'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['options' => 'array'];

    /**
     * $options = [
     *     'field_id' => $field_id,
     *     'name' => $name,
     *     'type' => $type, // text, email, password, link, textarea, dropdown, checkbox
     *     'description' => $description,
     *     'options' => [],
     *     'required' => false
     * ];
     */

    /**
     * Return all the views for the current product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    /*public function reviews()
    {
    return $this->morphMany(Review::class, 'reviewable');
    }*/

    /**
     * Return the prices associated with the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function prices()
    {
        return $this->morphOne(Price::class, 'priceable');
    }

    /**
     * Return the options available for the current product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    /**
     * Get the category that this project is associated with.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
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
     * Retrieve a product by slug.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string $slug
     * @return mixed
     */
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }
}
