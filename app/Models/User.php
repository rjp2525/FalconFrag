<?php

namespace Falcon\Models;

use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
use Bican\Roles\Traits\HasRoleAndPermission;
use Falcon\Models\Account\Address;
//use Falcon\Modules\Vault\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
//use Falcon\Modules\Vault\Traits\HasRoleAndPermission;
use Falcon\Models\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Revisionable\Laravel\RevisionableTrait;
use Sofa\Revisionable\Revisionable;

//use Falcon\Modules\Revisionable\Revisionable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract, Revisionable
{
    use Authenticatable, CanResetPassword, SoftDeletes, HasRoleAndPermission, RevisionableTrait;

    //protected $revisionEnabled = true;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Set the column to use for soft deleting.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the addresses for a user
     *
     * @return Collection
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * Update the billing address for an account
     *
     * @param  string $address
     * @return mixed
     */
    public function billingAddress($address)
    {
        if (!empty($address)) {
            $address->update([
                'is_primary' => false,
                'is_billing' => true
            ]);
        }

        return $this->addresses()->orderBy('is_billing', 'desc')->firstOrFail();
    }

    /**
     * Confirm the current user
     *
     * @return string
     */
    public function confirm()
    {
        $this->confirmation_code = null;
        $this->confirmed = true;
        $this->save();
    }

    /**
     * Create a new address for an account
     *
     * @param  array $data
     * @return mixed
     */
    public function createAddress($data)
    {
        return $this->addresses()->save(new Address($data));
    }

    /**
     * Delete an address for an account
     *
     * @param  string $address
     * @return bool
     */
    public function deleteAddress($address)
    {
        return $address->delete();
    }

    /**
     * Update an existing address for an account
     *
     * @param  string  $address
     * @param  array   $data
     * @return mixed
     */
    public function editAddress($address, $data)
    {
        return $address->update($data);
    }

    /**
     * Update the primary address for an account
     *
     * @param  string $address
     * @return mixed
     */
    public function primaryAddress($address)
    {
        if (!empty($address)) {
            $address->update([
                'is_primary' => true,
                'is_billing' => false
            ]);
        }

        return $this->addresses()->orderBy('is_primary', 'desc')->firstOrFail();
    }

    /**
     * Query scope to only return confirmed accounts
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnlyConfirmed($query)
    {
        return $query->whereConfirmed(true)->whereNull('confirmation_code');
    }

    /**
     * Get the votes cast by a user
     *
     * @return Collection
     */
    public function votes()
    {
        return $this->hasMany('Falcon\Models\Vote');
    }

    /**
     * Query scope to only return unconfirmed accounts
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnlyUnconfirmed($query)
    {
        return $query->whereConfirmed(false)->whereNotNull('confirmation_code');
    }

    /**
     * Check whether the current account is confirmed
     *
     * @return bool
     */
    public function confirmed()
    {
        return is_null($this->confirmation_code) && intval($this->confirmed) == 1;
    }

    /**
     * Check whether the current account is unconfirmed
     * TODO: Pointless function?
     *
     * @return bool
     */
    public function unconfirmed()
    {
        return !$this->confirmed();
    }

    /**
     * Accessor for the confirmation_url attribute
     *
     * @return string
     */
    public function getConfirmationUrlAttribute()
    {
        return route('client.confirm', $this->confirmation_code);
    }

    /**
     * Retrieve a user by the provided confirmation token
     *
     * @param  string $token
     * @return \Falcon\Models\
     */
    public function getByConfirmation($token)
    {
        return $this->whereConfirmationCode($token)->whereConfirmed(false)->firstOrFail();
    }
}
