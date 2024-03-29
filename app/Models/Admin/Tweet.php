<?php

namespace Falcon\Models\Admin;

use Falcon\Models\Shared\Model;

class Tweet extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tweets';

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
    protected $casts = ['data' => 'object'];

    /**
     * Get the data attribute as an object instead of a string.
     *
     * @param  string $value
     * @return object
     */
    public function getDataAttribute($value)
    {
        return json_decode($value);
    }

    /**
     * Check if a specific tweet exists in the database.
     *
     * @param  int $id
     * @return bool
     */
    public function tweetExists($id)
    {
        return $this->where('tweet_id', $id)->first();
    }

    /**
     * Retrieve any replies to mentions.
     *
     * @param  int $id
     * @return bool
     */
    public function getReplies($id)
    {
        return $this->where('reply_to_tweet_id', $id)->get();
    }

    /**
     * Retrieve the mention tweets.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetMentions($query)
    {
        return $query->where('mention', true);
    }

    /**
     * Retrieve the tweets that are replies to another tweet.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetReplies($query)
    {
        return $query->where('reply', true);
    }

    /**
     * Retrieve the normal tweets.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetNormal($query)
    {
        return $query->where('normal', true);
    }
}
