<?php

namespace Falcon\Models\Shared;

use Falcon\Models\Shared\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    /**
     * The name of the table containing review data.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Set the tag name and slug attributes on the model.
     *
     * @param string $name
     */
    public function setNameAttribute($name)
    {
        $name = trim($name);
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    /**
     * Find a tag by the specified name and if it doesn't exist
     * then create a new one.
     *
     * @param  string $name
     * @return \Falcon\Models\Shared\Model
     */
    public static function findOrCreate($name)
    {
        if (!$tag = static::findByName($name)) {
            $tag = static::create(compact('name'));
        }

        return $tag;
    }

    /**
     * Find a tag by the specified name
     *
     * @param  string $name
     * @return Model|Builder|null
     */
    public static function findByName($name)
    {
        return static::where('slug', Str::slug($name))->first();
    }

    /**
     * Get the name attribute from the model.
     *
     * @return mixed
     */
    public function __toString()
    {
        return $this->getAttribute('name');
    }

    /**
     * Return all of the owning taggable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function taggable()
    {
        return $this->morphTo();
    }
}
