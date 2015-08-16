<?php

namespace Falcon\Models;

use Falcon\Models\Model;

class Review extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get all of the owning voteable models.
     *
     * @return mixed
     */
    public function reviewable()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->morphTo('author');
    }

    public function addReview(Model $reviewable, $data, Model $author)
    {
        $review = new static();
        $review->fill(array_merge($data, [
            'author_id' => $author->id,
            'author_type' => get_class($author),
        ]));

        $reviewable->reviews()->save($review);

        return $review;
    }

    public function editReview($id, $data)
    {
        $review = static::find($id);
        $review->update($data);

        return $review;
    }

    public function deleteReview($id)
    {
        return static::find($id)->delete();
    }
}
