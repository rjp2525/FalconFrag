<?php namespace Falcon\Modules\Store\Models;

use Faclon\Modules\Store\Traits\CalculationTrait;
use Falcon\Models\Model;
use Falcon\Modules\Store\Contracts\CartInterface;
use Falcon\Modules\Store\Traits\CartTrait;

class Cart extends Model implements CartInterface
{
    use CartTrait, CalculationTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'store_carts';

    /**
     * Fillable attributes for mass assignment.
     *
     * @var array
     */
    protected $fillable = ['user_id'];
}
