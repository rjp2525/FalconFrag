<?php

namespace Falcon\Models\Vault;

use Falcon\Models\Shared\Model;
use Falcon\Modules\Vault\Contracts\PermissionHasRelations as PermissionHasRelationsContract;
use Falcon\Modules\Vault\Traits\PermissionHasRelations;
use Falcon\Modules\Vault\Traits\Sluggable;

class Permission extends Model implements PermissionHasRelationsContract
{
    use Sluggable, PermissionHasRelations;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'node', 'description', 'model'];
}
