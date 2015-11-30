<?php

namespace Falcon\Models\Shared\Traits;

use Falcon\Models\Shared\Model;
use Falcon\Models\Shared\Review;

trait Reviewable
{
    /**
     * Retrieve all of the reviews for a model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Add a new review to a model.
     *
     * @param  array $data
     * @param  \Falcon\Models\Shared\Model $author
     * @param  Model|null $parent
     * @return \Falcon\Models\Shared\Model
     */
    public function review($data, Model $author, Model $parent = null)
    {
        return (new Review())->addReview($this, $data, $author);
    }

    /**
     * Edit a review on a model.
     *
     * @param  string $id
     * @param  array $data
     * @param  \Falcon\Models\Shared\Model|null $parent
     * @return \Falcon\Models\Shared\Model
     */
    public function editReview($id, $data, Model $parent = null)
    {
        return (new Review())->editReview($id, $data);
    }

    /**
     * Delete a review from a model.
     *
     * @param  string $id
     * @return \Falcon\Models\Shared\Model
     */
    public function deleteReview($id)
    {
        return (new Review())->deleteReview($id);
    }
}
