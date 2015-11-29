<?php

namespace Falcon\Models\Store;

use Falcon\Models\Shared\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['slug', 'title', 'description', 'hidden', 'display_order'];

    /**
     * Get the products in the category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('Falcon\Models\Store\Product');
    }

    /**
     * Retrieve a category by slug name
     *
     * @param  string $slug
     * @return \Illuminate\Database\Eloquent\Model|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function scopeBySlug($query, $slug)
    {
        return $query->where('slug', $slug)->firstOrFail();
    }

    /**
     * Retrieve a category by slug name
     *
     * @param  string $slug
     * @return \Illuminate\Database\Eloquent\Model|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function scopeVisible($query)
    {
        return $query->where('hidden', false);
    }

    /**
     * Retrieve a category by slug name
     *
     * @return \Illuminate\Database\Eloquent\Model|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }

    /**
     * Get the parent category of a category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('Falcon\Models\Store\Category', 'parent_id');
    }

    /**
     * Get the child categories of a category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('Falcon\Models\Store\Category', 'parent_id');
    }

    /**
     * Retrieve a category by slug name
     *
     * @return \Illuminate\Database\Eloquent\Model|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function scopeMain($query)
    {
        return $query->where('parent_id', null);
    }
}
