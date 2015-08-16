<?php

namespace Falcon\Models\Account;

use Falcon\Models\Account\Country;
use Falcon\Models\Model;

class Address extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'addresses';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get all of the owning addressable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function addressable()
    {
        return $this->morphTo();
    }

    /**
     * Get the country for the address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the name attribute
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return sprintf('%s %s %s %s', $this->name_prefix, $this->name_suffix, $this->first_name, $this->last_name);
    }

    /**
     * Get the address attribute
     *
     * @return string
     */
    public function getAddressAttribute()
    {
        return sprintf('%s %s %s', $this->city, $this->state, $this->postcode);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($address) {
            if (empty($address->id)) {
                $default = 'US';
                $country = Country::where('cca2', $default)->first(['id']);
                $address->country_id = $country->id;
            }
        });
    }
}
