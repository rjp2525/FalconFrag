<?php
namespace Falcon\Modules\Store\Models;

use Falcon\Models\Shared\Model;
use Falcon\Modules\Store\Contracts\ProductInterface;
use Falcon\Modules\Store\Traits\ProductTrait;

class Product extends Model implements ProductInterface
{
    use ProductTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * Name of the attributes to be included in the route params.
     *
     * @var string
     */
    protected $fillable = ['user_id', 'cart_id', 'shop_id', 'price', 'tax', 'shipping', 'currency', 'quantity', 'class', 'reference_id'];
}
