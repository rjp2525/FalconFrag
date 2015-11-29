<?php

namespace Falcon\Models\Shared\Traits;

trait taggable
{
    /**
     * Return a collection of all tags associated with a model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }

    /**
     * Attach one or more tags to a model.
     *
     * @param  array|string $tags
     * @return $this
     */
    public function tag($tags)
    {
        $tags = $this->buildTagArray($tags);

        foreach ($tags as $tag) {
            $this->addOneTag($tag);
        }

        return $this;
    }

    /**
     * Detach one or more tags from a model.
     *
     * @param  string|arrag $tags
     * @return $this
     */
    public function untag($tags)
    {
        $tags = $this->buildTagArray($tags);

        foreach ($tags as $tag) {
            $this->removeOneTag($tag);
        }

        return $this;
    }

    /**
     * Remove all tags from a model and assign them the given ones.
     *
     * @param  string|array $tags
     * @return $this
     */
    public function retag($tags)
    {
        return $this->detag()->tag($tags);
    }

    /**
     * Remove all tags from a model. This method serves as an alias
     * for the method removeAllTags()
     *
     * @return $this
     */
    public function detag()
    {
        $this->removeAllTags();

        return $this;
    }

    /**
     * Attach a single tag to a model. If the specified tag does not
     * exist, it will be created.
     *
     * @param string $string
     */
    protected function addOneTag($string)
    {
        if ($this->onlyUseExistingTags) {
            $tag = Tag::findByName($string);

            if (empty($tag)) {
                // The specified tag was not found in the available list of tags
                // TODO: Some more elaborate error handling?
                return;
            }
        } else {
            $tag = Tag::findOrCreate($string);
        }

        if (!$this->tags instanceof Collection) {
            $this->tags = new Collection($this->tags);
        }

        if (!$this->tags->contains($tag->getKey())) {
            $this->tags()->attach($tag);
        }
    }

    /**
     * Detach a single tag from the model.
     * TODO: Correct return type?
     *
     * @param  string $string
     * @return bool
     */
    protected function removeOneTag($string)
    {
        if ($tag = Tag::findByName($string)) {
            $this->tags()->detach($tag);
        }
    }

    /**
     * Remove every tag from a model.
     * TODO: Another incorrect return type?
     *
     * @return mixed
     */
    protected function removeAllTags()
    {
        $this->tags()->sync([]);
    }

    /**
     * Retrieve all tags of a model as a string.
     *
     * @return string
     */
    public function getTagListAttribute()
    {
        return $this->makeTagList($this, 'name');
    }

    /**
     * Get all slug tags of the model as a string.
     *
     * @return string
     */
    public function getTagListNormalizedAttribute()
    {
        return $this->makeTagList('slug');
    }

    /**
     * Get all tags of a model as an array.
     *
     * @return mixed
     */
    public function getTagArrayAttribute()
    {
        return $this->makeTagArray('name');
    }

    /**
     * Get all slug tags of a model as an array.
     *
     * @return mixed
     */
    public function getTagArrayNormalizedAttribute()
    {
        return $this->makeTagArray('slug');
    }

    /**
     * Scope for a model that has all of the given tags.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array|string $tags
     * @return mixed
     */
    public function scopeWithAllTags(Builder $query, $tags)
    {
        $tags = $this->buildTagArray($tags);
        $slug = array_map([Str::class, 'slug'], $tags);
        return $query->whereHas('tags', function ($q) use ($slug) {
            $q->whereIn('slug', $slug);
        }, '=', count($slug));
    }

    /**
     * Scope for a model that has any of the given tags.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array|string $tags
     * @return mixed
     */
    public function scopeWithAnyTags(Builder $query, $tags = [])
    {
        $tags = $this->buildTagArray($tags);
        if (empty($tags)) {
            return $query->has('tags');
        }
        $slug = array_map([Str::class, 'slug'], $tags);
        return $query->whereHas('tags', function ($q) use ($slug) {
            $q->whereIn('slug', $slug);
        });
    }

    /**
     * Get all tags for the called class.
     *
     * @return mixed
     */
    public static function tagsArray()
    {
        return static::getAllTags(get_called_class());
    }

    /**
     * Get all tags for the called class as a string.
     *
     * @return string
     */
    public static function tagsList()
    {
        return $this->joinArray(static::getAllTags(get_called_class()));
    }

    /**
     * Get all tags for the given class.
     *
     * @param $className
     * @return mixed
     */
    public static function getAllTags()
    {
        return DB::table('taggables')->distinct()
            ->where('taggable_type', '=', get_class($this))
            ->join('tags', 'taggables.tag_id', '=', 'tags.id')
            ->orderBy('tags.slug')
            ->lists('tags.slug');
    }

    /**
     * Build an array of tags from a string.
     *
     * @param  array|string $tags
     * @return array
     */
    protected function buildTagArray($tags)
    {
        if (is_array($tags)) {
            return $tags;
        }

        if (is_string($tags)) {
            $tags = preg_split('#[' . preg_quote(',', '#') . ']#', $tags, null, PREG_SPLIT_NO_EMPTY);
        }

        return $tags;
    }

    /**
     * Build an array which contains all tags of the current model.
     *
     * @param string $field
     * @return mixed
     */
    protected function makeTagArray($field)
    {
        return $this->tags->lists($field, 'tag_id');
    }

    /**
     * Build a list of tags as a string.
     *
     * @param string $field
     * @return string
     */
    protected function makeTagList($field)
    {
        return $this->joinArray($this->makeTagArray($field)->toArray());
    }

    /**
     * Join the given tags into a string in which the
     * tags are delimited by the comma character.
     *
     * @param array $pieces
     * @return string
     */
    protected function joinArray(array $pieces)
    {
        return implode(substr(',', 0, 1), $pieces);
    }
}
