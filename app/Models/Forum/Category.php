<?php namespace Falcon\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'forum_categories';

    public function threads()
    {
        return $this->hasMany('Falcon\Models\Forum\Thread');
    }

    public function threads_paginated()
    {
        return $this->hasMany('Falcon\Models\Forum\Thread')
                    ->orderBy('sticky', 'desc')
                    ->orderBy('order', 'desc')
                    ->paginate(25);
    }

    public function replies()
    {
        return $this->hasMany('Falcon\Models\Forum\Reply');
    }

    public function total_threads()
    {
        return $this->threads()->count();
    }

    public function total_replies()
    {
        return $this->replies()->count();
    }

}
