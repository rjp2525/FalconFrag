<?php

namespace Falcon\Models\Shared;

use Falcon\Models\Shared\Conclusion;
use Falcon\Models\Shared\Model;

class Report extends Model
{
    /**
     * The name of the table containing review data.
     *
     * @var string
     */
    protected $table = 'reports';

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
     * Retrieve the conclusion associated with the current report.
     * (Assuming one exists)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function conclusion()
    {
        return $this->hasOne(Conclusion::class);
    }

    /**
     * Retrieve the user who "judged" the report and gave the
     * associated conclusion.
     *
     * @return \Falcon\Models\User
     */
    public function judge()
    {
        return $this->conclusion->judge;
    }

    /**
     * Set the conclusion for a reported item.
     *
     * @param  array $data
     * @param  \Falcon\Models\User $judge
     * @return \Falcon\Models\Shared\Conclusion
     */
    public function conclude($data, $judge)
    {
        $conclusion = (new Conclusion())->fill(array_merge($data, [
            'judge_id'   => $judge->id,
            'judge_type' => get_class($judge)
        ]));

        $this->conclusion()->save($conclusion);

        return $conclusion;
    }

    /**
     * Retrieve all users that have ever judged a report
     *
     * @return array
     */
    public static function getAllJudges()
    {
        $judges = [];

        foreach (Conclusion::get() as $conclusion) {
            $judges[] = $conclusion->judge;
        }

        return $judges;
    }

    /**
     * Return all of the models that allow reporting.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function reportable()
    {
        return $this->morphTo();
    }
}
