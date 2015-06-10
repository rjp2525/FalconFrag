<?php

namespace Falcon\Modules\Vault\Traits;

trait Sluggable
{
    /**
     * Set slug attribute.
     *
     * @param string $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['node'] = str_slug($value, config('vault.separator'));
    }
}
