<?php namespace Falcon\Models\Forum;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

    protected $table = 'forum_replies';

    public function category()
    {
        return $this->belongsTo('Falcon\Models\Forum\Category');
    }

    public function thread()
    {
        return $this->belongsTo('Falcon\Models\Forum\Thread');
    }

    public function author()
    {
        return $this->belongsTo('Falcon\Models\User');
    }

    // TODO: Favorites/Upvote/Downvote

}
