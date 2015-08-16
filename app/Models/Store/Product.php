<?php

namespace Falcon\Models\Store;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Falcon\Models\Model;
use Falcon\Models\Review;
use Falcon\Models\Vote;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements SluggableInterface
{
    use SluggableTrait, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'hidden' => 'boolean',
        'config_options' => 'array',
        'upgrades' => 'array',
        'downgrades' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description_short',
        'description_long',
        'config_options' => 'array',
        'hidden',
        'upgrades',
        'downgrades',
    ];

    /**
     * The URL slug column configuration.
     *
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'title',
        'save_to' => 'slug',
        'unique' => false,
        'on_update' => true,
    ];

    /**
     * Set the column to use for soft deleting.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the category the product belongs to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('Falcon\Models\Store\Category');
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
     * Get the votes on a product
     *
     * @return mixed
     */
    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }

    /**
     * Get the reviews for a product
     *
     * @return mixed
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Add a review for a product
     *
     * @param  array      $data
     * @param  Model      $author
     * @param  Model|null $parent
     * @return static
     */
    public function review($data, Model $author, Model $parent = null)
    {
        return (new Review())->addReview($this, $data, $author);
    }

    /**
     * Update a review on a product
     *
     * @param  string     $id
     * @param  array      $data
     * @param  Model|null $parent
     * @return mixed
     */
    public function editReview($id, $data, Model $parent = null)
    {
        return (new Review())->editReview($id, $data);
    }

    /**
     * Delete a review from a product
     *
     * @param  string $id
     * @return mixed
     */
    public function deleteReview($id)
    {
        return (new Review())->deleteReview($id);
    }
}
