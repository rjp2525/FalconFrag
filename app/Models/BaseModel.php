<?php namespace Falcon\Models;

use Illuminate\Database\Eloquent\Model;
use Rhumsaa\Uuid\Uuid;

abstract class BaseModel extends Model
{

    /**
     * Indicates if the IDs are auto-incrementing
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * Create a new Eloquent model instance.
     *
     * @param  array $attributes
     * @return void
     */
    public function __construct(array $attributes = array())
    {
        $this->{$this->getKeyName()} = (string) $this->generateUUID();
        parent::__construct($attributes);
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
