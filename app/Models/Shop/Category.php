<?php

namespace Falcon\Models\Shop;

use Falcon\Models\Shared\Model;
use Falcon\Models\Shop\Product;
use Falcon\Models\Traits\Nestable as NestableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use NestableTrait, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'store_categories';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Return all of the products within this category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Retrieve a category by the given slug.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string $slug
     * @return \Illuminate\Database\Eloquent\Builder|null
     */
    public function scopeBySlug($query, $slug)
    {
        return $this->where('slug', $slug);
    }

    /**
     * Return only the visible product categories.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVisible($query)
    {
        return $query->where('hidden', false);
    }

    /**
     * Retrieve the categories ordered by the display_order.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }

    /**
     * Retrieve the category that this subcategory is a child of.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Retrieve the subcategories of the current category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Return the topmost product categories.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder|null
     */
    public function scopeMain($query)
    {
        return $query->where('parent_id', null);
    }
}
