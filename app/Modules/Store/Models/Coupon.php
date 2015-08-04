<?php namespace Falcon\Modules\Store\Models;

use Falcon\Models\Model;
use Falcon\Modules\Store\Contracts\CouponInterface;
use Falcon\Modules\Store\Traits\CouponTrait;

class Coupon extends Model implements CouponInterface
{
    use CouponTrait;

    //
}
