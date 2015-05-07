<?php namespace Falcon\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

    protected $table = 'forum_threads';

    public function category()
    {
        return $this->belongsTo('Falcon\Models\Forum\Category');
    }

    public function replies()
    {
        return $this->hasMany('Falcon\Models\Forum\Reply');
    }

    public function replies_paginated()
    {
        return $this->hasMany('Falcon\Models\Forum\Reply')
                    ->orderBy('created_at', 'desc')
                    ->paginate(15);
    }

    public function author()
    {
        return $this->belongsTo('Falcon\Models\User');
    }

    public function reply_count()
    {
        return $this->replies()->count();
    }

    // TODO: Favorites/Upvotes/Downvotes

}
