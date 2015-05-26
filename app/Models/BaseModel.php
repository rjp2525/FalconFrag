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
     * Save the model to the database.
     *
     * @param  array  $options
     * @return bool
     */
    public function save(array $options = array())
    {
        $this->generatePrimaryKey();
        return parent::save($options);
    }

    /**
     * Generate a UUID for the user if one doesn't exist
     *
     * @return void
     */
    private function generatePrimaryKey()
    {
        if (!$this->{$this->getKeyName()}) {
            $this->{getKeyName()} = (string) $this->generateUUID();
        }
    }

    /**
     * Generate a new version 4 (random) UUID.
     *
     * @return \Rhumsaa\Uuid\Uuid
     */
    private function generateUUID()
    {
        return UUID::uuid4();
    }
}
