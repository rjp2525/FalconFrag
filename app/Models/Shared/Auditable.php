<?php

namespace Falcon\Models\Shared;

use Falcon\Models\Shared\Model;

class Auditable extends Model
{
    /** Variables
     * revisionEnabled = auditing_enabled
     * originalData = original_data
     * updatedData = updated_data
     * updating = updating
     * dontKeep = dont_keep
     * doKeep = do_keep
     * dirtyData = dirty_data
     *
     * keepRevisionOf = audits_enabled
     * dontKeepRevisionOf = audits_disabled
     * revisionCreationsEnabled = enable_create_audits
     *
     ** Methods
     * revisionHistory() = auditHistory()
     **/

    /**
     * The data before it was updated
     *
     * @var array
     */
    private $original_data;

    /**
     * The new data after being updated
     *
     * @var array
     */
    private $updated_data;

    /**
     * Whether or not the data is being updated
     *
     * @var bool
     */
    private $updating;

    /**
     * The data that won't be kept
     *
     * @var array
     */
    private $dont_keep = array();

    /**
     * The data that will be kept
     *
     * @var array
     */
    private $do_keep = array();

    /**
     * The list of values that have been updated
     *
     * @var array
     */
    protected $dirty_data = array();

    /**
     * Creates the event listeners for the saving and saved events.
     * This allows revisions to be saved whenever a save is made,
     * regardless of the HTTP method.
     *
     * @return [type]
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->preSave();
        });

        static::saved(function ($model) {
            $model->postSave();
        });

        static::created(function ($model) {
            $model->postCreate();
        });

        static::deleted(function ($model) {
            $model->preSave();
            $model->postDelete();
        });
    }

    /**
     * Returns all available audit history
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function auditHistory()
    {
        return $this->morphMany(Audit::class, 'auditable');
    }

    /**
     * Invoked before a models is saved, returns false to abort the operation
     *
     * @return bool
     */
    public function preSave()
    {
        // If there is no auditEnabled, or if there is make sure it's true
        if (!isset($this->auditing_enabled) || $this->auditing_enabled) {
            $this->original_data = $this->original;
            $this->updated_data = $this->attributes;

            // Can only safely compare basic items, so for now
            // just drop any object based items (such as DateTime)
            foreach ($this->updated_data as $k => $v) {
                if (gettype($v) == 'object' && !method_exists($v, '__toString')) {
                    unset($this->original_data[$k]);
                    unset($this->updated_data[$k]);
                }
            }

            // This is ugly, but required to safe the standard model.
            // Then store the keep/dont_keep values for use later in the isAuditable method
            $this->dont_keep = isset($this->exempt_audits) ? $this->exempt_audits + $this->dont_keep : $this->dont_keep;
            $this->do_keep = isset($this->enabled_audits) ? $this->enabled_audits + $this->do_keep : $this->do_keep;

            unset($this->attributes['exempt_audits']);
            unset($this->attributes['enabled_audits']);

            $this->dirty_data = $this->getDirtyData();
            $this->updating = $this->exists();
        }
    }

    /**
     * Called after a model record is successfully saved
     *
     * @return void
     */
    public function postSave()
    {
        // Ensure the record already exists
        if ((!isset($this->auditing_enabled) || $this->auditing_enabled) && $this->updating) {
            // If the record exists, it must mean we're updating it
            $changes_to_record = $this->changedAuditableFields();
            $audits = array();

            // TODO: Add other fields for change metadata (IP address, browser fingerprint etc)
            foreach ($changes_to_record as $k => $c) {
                $audits[] = [
                    'auditable_type' => get_class($this),
                    'auditable_id'   => $this->getKey(),
                    'key'            => $k,
                    'old_value'      => array_get($this->original_data, $key),
                    'new_value'      => $this->updated_data[$key],
                    'user_id'        => $this->getUserId(),
                    'created_at'     => new \DateTime(),
                    'updated_at'     => new \DateTime()
                ];
            }

            // TODO: Change this to a create() method and remove created_at and
            // updated_at from the above change log loop
            if (count($audits) > 0) {
                $audit = new Audit;
                \DB::table($audit->getTable())->insert($audits);
            }
        }
    }

    /**
     * Called after a record is successfully created
     *
     * @return void
     */
    public function postCreate()
    {
        // Check if creations should be stored in audit history
        if (empty($this->enable_create_audits)) {
            // Don't store creations if not defined
            return false;
        }

        if ((!isset($this->auditing_enabled) || $this->auditing_enabled)) {
            // TODO: Add other fields for change metadata (IP address, browser fingerprint etc)
            $audits[] = [
                'auditable_type' => get_class($this),
                'auditable_id'   => $this->getKey(),
                'key'            => $k,
                'old_value'      => null,
                'new_value'      => $this->created_at,
                'user_id'        => $this->getUserId(),
                'created_at'     => new \DateTime(),
                'updated_at'     => new \DateTime()
            ];

            // TODO: Change this to a create() method and remove created_at and
            // updated_at from the above audit record
            $audit = new Audit;
            \DB::table($audit->getTable())->insert($audits);
        }
    }

    /**
     * Called when a record is deleted
     *
     * @return void
     */
    public function postDelete()
    {
        // If auditing is enabled, the record is a soft delete and the
        // deleted_at field can be recorded then store the deleted record
        if ((!isset($this->auditing_enabled) || $this->auditing_enabled) && $this->isSoftDelete() && $this->isAuditable('deleted_at')) {
            // TODO: Add other fields for change metadata (IP address, browser fingerprint etc)
            $audits[] = [
                'auditable_type' => get_class($this),
                'auditable_id'   => $this->getKey(),
                'key'            => $k,
                'old_value'      => null,
                'new_value'      => $this->deleted_at,
                'user_id'        => $this->getUserId(),
                'created_at'     => new \DateTime(),
                'updated_at'     => new \DateTime()
            ];

            // TODO: Change this to a create() method and remove created_at and
            // updated_at from the above audit record
            $audit = new Audit;
            \DB::table($audit->getTable())->insert($audits);
        }
    }

    /**
     * Attempt to get the ID of the user logged in. If a user is not
     * logged in, assume it was a system action and return null.
     *
     * @return mixed
     */
    private function getUserId()
    {
        try {
            if (Auth::check()) {
                return Auth::user()->getAuthIdentifier();
            }
        } catch (Exception $e) {
            return null;
        }

        return null;
    }

    /**
     * Get all of the changes made are enabled for. Returns
     * an array with the fields changed and the new data.
     *
     * @return array
     */
    private function changedAuditableFields()
    {
        $changes_to_record = array();

        foreach ($this->dirty_data as $k => $v) {
            // Check to make sure the field is auditable and double check
            // that it's actually new data (in case dirty_data is actually clean)
            if ($this->isAuditable($k) && !is_array($v)) {
                if (!isset($this->original_data[$k]) || $this->original_data[$k] != $this->updated_data[$k]) {
                    $changes_to_record[$k] = $v;
                }
            } else {
                // These are not needed and since they can contain quite a bit of data, trash them
                unset($this->updated_data[$k]);
                unset($this->original_data[$k]);
            }
        }

        return $changes_to_record;
    }

    /**
     * Check if a field should be audited
     *
     * @param  string $key
     * @return bool
     */
    private function isAuditable($key)
    {
        // If the field is explicitly auditable, return true.
        // If the field is not explicitly auditable, return false.
        // If neither condition is met, only return true if there are
        // no auditable fields are specified.
        if (isset($this->do_keep) && in_array($key, $this->do_keep)) {
            return true;
        }
        if (isset($this->dont_keep) && in_array($key, $this->dont_keep)) {
            return false;
        }

        return empty($this->do_keep);
    }

    /**
     * Check if soft deletes are enabled on the model
     *
     * @return bool
     */
    private function isSoftDelete()
    {
        // Check flag variable used in Laravel 4.2+
        if (isset($this->forceDeleting)) {
            return !$this->forceDeleting;
        }

        // Otherwise, check for flag used in older versions
        if (isset($this->softDelete)) {
            return $this->softDelete;
        }

        return false;
    }

    /**
     * Get formatted strings for the auditable fields
     *
     * @return mixed
     */
    public function getAuditFormattedFields()
    {
        return $this->audit_formatted_fields;
    }

    /**
     * Get formatted strings for the auditable field names
     *
     * @return mixed
     */
    public function getAuditFormattedFieldNames()
    {
        return $this->audit_formatted_field_names;
    }

    /**
     * When displaying revision history and a foreign key is updated rather
     * than displaying the ID, this method can be overridden in the model.
     * By default it will just fall back to the model ID.
     *
     * @return string
     */
    public function identifiableName()
    {
        return $this->getKey();
    }

    /**
     * If the audit null string cannot be determined, this will
     * be used instead. It can be overridden within the model.
     *
     * @return string
     */
    public function getAuditNullString()
    {
        return isset($this->audit_null_string) ? $this->audit_null_string : 'nothing';
    }

    /**
     * When there is no audit string or value can't be figured out,
     * this value is used instead. Can be overridden in the model.
     *
     * @return string
     */
    public function getAuditUnknownString()
    {
        return isset($this->audit_unknown_string) ? $this->audit_unknown_string : 'unknown';
    }

    /**
     * Disable an audit field temporarily
     * TODO: Need to add to array longhanded, due to a
     * PHP bug https://bugs.php.net/bug.php?id=42030
     *
     * @param  mixed $field
     * @return void
     */
    public function disableAuditField($field)
    {
        if (!isset($this->audits_disabled)) {
            $this->audits_disabled = array();
        }

        if (is_array($field)) {
            foreach ($field as $f) {
                $this->disableAuditField($f);
            }
        } else {
            $disabled = $this->audits_disabled;
            $disabled[] = $field;
            $this->audits_disabled = $disabled;
            unset($disabled);
        }
    }
}
