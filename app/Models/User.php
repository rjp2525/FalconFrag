<?php namespace Falcon\Models;

use Falcon\Models\Forum\Thread;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'company', 'username', 'email', 'password', 'activation_code'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Set the column to use for soft deleting
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function profile()
    {
        return $this->hasOne('Falcon\Models\User\Profile');
    }

    public function address()
    {
        return $this->hasMany('Falcon\Models\User\Address');
    }

    public function forum_threads()
    {
        return $this->hasMany('Falcon\Models\Forum\Thread');
    }

    public function forum_replies()
    {
        return $this->hasMany('Falcon\Models\Forum\Reply');
    }

    public function getForumThreads(Thread $thread)
    {
        $stack = [];
        foreach ($this->replies as $reply) {
            array_push($stack, $reply->thread_id);
        }

        $threads = [];
        foreach (array_unique($stack) as $id) {
            array_push($threads, $thread->find($id));
        }

        return $threads;
    }

}
