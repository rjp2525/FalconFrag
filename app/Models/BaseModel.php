<?php namespace Falcon\Models;

use Illuminate\Database\Eloquent\Model;
use Rhumsaa\Uuid\Uuid;

class BaseModel extends Model
{

    /**
     * Indicates if the IDs are auto-incrementing
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Attach to the "creating" Model Event to provide a UUID
         * for the `id` field (provided by $model->getKeyName())
         */
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) $model->generateUUID();
        });
    }

    /**
     * Generate a new version 4 (random) UUID.
     *
     * @return \Rhumsaa\Uuid\Uuid
     */
    public function generateUUID()
    {
        return UUID::uuid4();
    }
}
