<?php

namespace Falcon\Models\Shared;

use Illuminate\Database\Eloquent\Model as LModel;
use Ramsey\Uuid\Uuid;
use Venturecraft\Revisionable\RevisionableTrait;

class Model extends LModel
{
    use RevisionableTrait;

    /**
     * Revision history for newly created records is disabled by default,
     * so enable it in the main extending class for all models.
     *
     * @var bool
     */
    protected $revisionCreationsEnabled = true;

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
     * @return \Ramsey\Uuid\Uuid
     */
    public function generateUUID()
    {
        return Uuid::uuid4();
    }
}
