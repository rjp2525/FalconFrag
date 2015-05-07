<?php namespace Falcon\Models\User;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $table = 'user_addresses';

    public function user()
    {
        return $this->belongsTo('Falcon\Models\User');
    }

    public function getPrimary()
    {
        return $this->where('primary', true)->first();
    }

    public function getBilling()
    {
        return $this->where('billing', true)->first();
    }

}
