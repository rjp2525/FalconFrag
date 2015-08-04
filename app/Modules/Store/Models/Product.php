<?php namespace Falcon\Modules\Store\Models;

use Falcon\Models\Model;
use Falcon\Modules\Store\Contracts\ProductInterface;
use Falcon\Modules\Store\Traits\ProductTrait;

class Product extends Model implements ProductInterface
{
    use ProductTrait;

    //
}
