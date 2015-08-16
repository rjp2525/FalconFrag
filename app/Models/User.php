<?php

namespace Falcon\Models;

use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
//use Falcon\Modules\Vault\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
//use Falcon\Modules\Vault\Traits\HasRoleAndPermission;
use Bican\Roles\Traits\HasRoleAndPermission;
use Falcon\Models\Account\Address;
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
     * Get the votes cast by a user
     *
     * @return Collection
     */
    public function votes()
    {
        return $this->hasMany('Falcon\Models\Vote');
    }

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
                'is_billing' => false,
            ]);
        }

        return $this->addresses()->orderBy('is_primary', 'desc')->firstOrFail();
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
                'is_billing' => true,
            ]);
        }

        return $this->addresses()->orderBy('is_billing', 'desc')->firstOrFail();
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
     * Delete an address for an account
     *
     * @param  string $address
     * @return bool
     */
    public function deleteAddress($address)
    {
        return $address->delete();
    }
}
