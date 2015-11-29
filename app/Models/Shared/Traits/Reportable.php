<?php

namespace Falcon\Models\Shared\Traits;

use Falcon\Models\Shared\Model;
use Falcon\Models\Shared\Report;

trait Reportable
{
    /**
     * Return all reports associated with the current model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    /**
     * Save a new report on the current model.
     *
     * @param  array $data
     * @param  \Falcon\Models\Shared\Model $reportable
     * @return bool
     */
    public function report($data, Model $reportable)
    {
        $report = (new Report())->fill(array_merge($data, [
            'reporter_id'   => $reportable->id,
            'reporter_type' => get_class($reportable)
        ]));

        $this->reports()->save($report);

        return $report;
    }
}
