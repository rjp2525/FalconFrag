<?php namespace Falcon\Modules\Store\Models;

use Falcon\Models\Model;
use Falcon\Modules\Store\Contracts\TransactionInterface;
use Falcon\Modules\Store\Traits\TransactionTrait;

class Transaction extends Model implements TransactionInterface
{
    use TransactionTrait;

    //
}
