<?php

namespace Falcon\Modules\Cart;

use Illuminate\Support\Collection;

class ItemCollection extends Collection
{
    /**
     * Get the sum of a price times the quantity.
     *
     * @return mixed|null
     */
    public function getPriceSum()
    {
        return $this->price * $this->quantity;
    }

    public function __get($name)
    {
        if ($this->has($name)) {
            return $this->get($name);
        }

        return;
    }
}
