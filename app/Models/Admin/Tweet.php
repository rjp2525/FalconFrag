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
     * Check if a specific tweet exists in the database.
     *
     * @param  int $id
     * @return bool
     */
    public function scopeTweetExists($query, $id)
    {
        return $query->where('tweet_id', $id)->first();

        /*if ($this->tweet_id == $id) {
    return true;
    }

    return false;*/
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
