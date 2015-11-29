<?php

namespace Falcon\Models\Shared;

use Falcon\Models\Shared\Model;

class Conclusion extends Model
{
    /**
     * The name of the table containing review data.
     *
     * @var string
     */
    protected $table = 'report_conclusions';

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
    protected $casts = ['meta' => 'array'];

    /**
     * Get the report that the current conclusion belongs to.
     * TODO: Test this relationship, as I previously had it named
     *       "conclusion" but it made no sense in this context.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    /**
     * Return the models that allow judging. (User model)
     * TODO: Possibly change to "judgeable" to follow standard
     *       Laravel polymorphic relationship naming conventions?
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function judge()
    {
        return $this->morphTo();
    }
}
