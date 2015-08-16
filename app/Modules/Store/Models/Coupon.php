<?php namespace Falcon\Modules\Store\Models;

use Falcon\Models\Model;
use Falcon\Modules\Store\Contracts\CouponInterface;
use Falcon\Modules\Store\Traits\CouponTrait;

class Coupon extends Model implements CouponInterface
{
    use CouponTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'coupons';

    /**
     * Fillable attributes for mass assignment.
     *
     * @var array
     */
    protected $fillable = ['code', 'value', 'discount', 'name', 'description', 'expires_at'];
}
