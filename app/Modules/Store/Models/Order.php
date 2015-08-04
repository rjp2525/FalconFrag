<?php namespace Falcon\Modules\Store\Models;

use Falcon\Models\Model;
use Falcon\Modules\Store\Contracts\OrderInterface;
use Falcon\Modules\Store\Traits\CalculationTrait;
use Falcon\Modules\Store\Traits\OrderTrait;

class Order extends Model implements OrderInterface
{
    use OrderTrait, CalculationTrait;

    //
}
