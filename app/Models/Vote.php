<?php

namespace Falcon\Models;

use Carbon\Carbon;
use Falcon\Models\Model;

class Vote extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get all of the votes on a model
     *
     * @param  Model  $voteable
     * @return int
     */
    public static function count(Model $voteable)
    {
        return $voteable->votes()->count();
    }

    /**
     * Cast a negative vote on a model
     *
     * @param  Model  $voteable
     * @return bool
     */
    public static function negative(Model $voteable)
    {
        return (new static )->cast($voteable, -1);
    }

    /**
     * Cast a positive vote on a model
     *
     * @param  Model  $voteable
     * @return bool
     */
    public static function positive(Model $voteable)
    {
        return (new static )->cast($voteable, 1);
    }

    /**
     * Set the value attribute
     *
     * @param $value
     */
    public function setValueAttribute($value)
    {
        $this->attributes['value'] = ($value == -1) ? -1 : 1;
    }

    /**
     * Get the total sum value of votes cast
     *
     * @param  Model  $voteable
     * @return int
     */
    public static function sum(Model $voteable)
    {
        return $voteable->votes()->sum('value');
    }

    /**
     * Get the users for a relationship
     *
     * @return mixed
     */
    public function users()
    {
        return $this->belongsTo('Falcon\Models\User');
    }

    /**
     * Get all of the owning voteable models.
     *
     * @return mixed
     */
    public function voteable()
    {
        return $this->morphTo();
    }

    /**
     * Get the votes for a model during a specific range of time.
     * If not "to" parameter is set, the range is the start of
     * the first date to the end of that date (IE. 12:00AM-11:59PM).
     *
     * @param  Model $voteable
     * @param  $from
     * @param  null  $to
     * @return mixed
     */
    public static function votesByDate(Model $voteable, $from, $to = null)
    {
        $query = $voteable->votes();

        if (!empty($to)) {
            $range = [new Carbon($from), new Carbon($to)];
        } else {
            $range = [
                (new Carbon($from))->startOfDay(),
                (new Carbon($to))->endOfDay()
            ];
        }

        return $query->whereBetween('created_at', $range)->count();
    }

    /**
     * Get all of the negative votes on a model
     *
     * @param  Model  $voteable
     * @return int
     */
    public static function votesNegative(Model $voteable)
    {
        return $voteable->votes()->where('value', -1)->count();
    }

    /**
     * Get all of the positive votes on a model
     *
     * @param  Model  $voteable
     * @return int
     */
    public static function votesPositive(Model $voteable)
    {
        return $voteable->votes()->where('value', 1)->count();
    }

    /**
     * Cast a vote to a model
     *
     * @param  Model  $voteable
     * @param  int    $value
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
