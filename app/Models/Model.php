<?php

namespace Falcon\Models;

use Illuminate\Database\Eloquent\Model as LModel;
use Ramsey\Uuid\Uuid;

class Model extends LModel
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
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
        return Uuid::uuid4();
    }
}
