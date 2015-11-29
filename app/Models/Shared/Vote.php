<?php

namespace Falcon\Models\Shared;

use Carbon\Carbon;
use Falcon\Models\Shared\Model;
use Falcon\Models\User;

class Vote extends Model
{
    /**
     * The name of the table containing review data.
     *
     * @var string
     */
    protected $table = 'votes';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Return the number of votes casted on the specified model.
     *
     * @param  \Falcon\Models\Shared\Model $voteable
     * @return int
     */
    public static function count(Model $voteable)
    {
        return $voteable->votes()->count();
    }

    /**
     * Return the value of all votes cast on a model
     *
     * @param  \Falcon\Models\Shared\Model $voteable
     * @return int
     */
    public static function sum(Model $voteable)
    {
        return $voteable->votes()->sum('value');
    }

    /**
     * Cast a negative vote on a model.
     *
     * @param  \Falcon\Models\Shared\Model $voteable
     * @return bool
     */
    public static function negative(Model $voteable)
    {
        return (new static )->cast($voteable, -1);
    }

    /**
     * Cast a positive vote on a model.
     *
     * @param  \Falcon\Models\Shared\Model $voteable
     * @return bool
     */
    public static function positive(Model $voteable)
    {
        return (new static )->cast($voteable, 1);
    }

    /**
     * Return the number of negative votes casted on the model.
     *
     * @param  \Falcon\Models\Shared\Model $voteable
     * @return int
     */
    public static function countNegative(Model $voteable)
    {
        return $voteable->votes()->where('value', -1)->count();
    }

    /**
     * Return the number of positive votes casted on the model.
     *
     * @param  \Falcon\Models\Shared\Model $voteable
     * @return int
     */
    public static function countPositive(Model $voteable)
    {
        return $voteable->votes()->where('value', 1)->count();
    }

    /**
     * Return a collection of users that have voted
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return the votes for the specified model during a specific range of
     * time. If the "end" parameter is not set, the range is the start of the
     * start date to the end of the end of the start date. (IE. 12:00AM-11:59PM).
     *
     * @param  \Falcon\Models\Shared\Model $voteable
     * @param  string $start
     * @param  string|null $end
     * @return int
     */
    public static function votesByDate(Model $voteable, $start, $end = null)
    {
        $query = $voteable->votes();

        if (!empty($end)) {
            $range = [new Carbon($start), new Carbon($end)];
        } else {
            $range = [
                (new Carbon($start))->startOfDay(),
                (new Carbon($start))->endOfDay()
            ];
        }

        return $query->whereBetween('created_at', $range)->count();
    }

    /**
     * Return all of the owning voteable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function voteable()
    {
        return $this->morphTo();
    }

    /**
     * Cast a vote to a model.
     *
     * @param  \Falcon\Models\Shared\Model $voteable
     * @param  int $value
     * @return bool
     */
    protected function cast(Model $voteable, $value = 1)
    {
        if (!$voteable->exists) {
            return false;
        }

        $vote = new static();
        $vote->value = $value;

        return $vote->voteable()->associate($voteable)->save();
    }
}
