<?php

namespace Falcon\Models\Shared;

use Falcon\Models\Shared\Model;

class Review extends Model
{
    /**
     * The name of the table containing review data.
     *
     * @var string
     */
    protected $table = 'reviews';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Add a review to a model.
     *
     * @param \Falcon\Models\Shared\Model  $reviewable
     * @param \Falcon\Models\Shared\Model  $author
     * @param array $data
     */
    public function addReview(Model $reviewable, $data, Model $author)
    {
        $review = new static();
        $review->fill(array_merge($data, [
            'author_id'   => $author->id,
            'author_type' => get_class($author)
        ]));

        $reviewable->reviews()->save($review);

        return $review;
    }

    /**
     * Returns the author of a review.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function author()
    {
        return $this->morphTo('author');
    }

    /**
     * Delete the specified review.
     *
     * @param  string $id
     * @return bool|null
     */
    public function deleteReview($id)
    {
        return static::find($id)->delete();
    }

    /**
     * Update the specified review in storage.
     *
     * @param  string $id
     * @param  array $data
     * @return bool|int
     */
    public function editReview($id, $data)
    {
        $review = static::find($id);
        $review->update($data);

        return $review;
    }

    /**
     * Return all of the owning reviewable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function reviewable()
    {
        return $this->morphTo();
    }
}
