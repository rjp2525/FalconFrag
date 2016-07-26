<?php

namespace Falcon\Models\Traits;

use Falcon\Models\Collections\Nestable as NestableCollection;

trait Nestable
{
    /**
     * Return a custom nested collection
     *
     * @param  array $models
     * @return \Falcon\Models\Collections\Nestable
     */
    public function newCollection(array $models = array())
    {
        return new NestableCollection($models);
    }
}
