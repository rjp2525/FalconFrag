<?php

namespace Falcon\Models;

use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
//use Falcon\Modules\Vault\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;
//use Falcon\Modules\Vault\Traits\HasRoleAndPermission;
use Bican\Roles\Traits\HasRoleAndPermission;
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
}
