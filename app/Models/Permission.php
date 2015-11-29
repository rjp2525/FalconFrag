<?php

namespace Falcon\Models;

use Bican\Roles\Contracts\PermissionHasRelations as PermissionHasRelationsContract;
use Bican\Roles\Traits\PermissionHasRelations;
use Bican\Roles\Traits\Slugable;
use Falcon\Models\Shared\Model;

class Permission extends Model implements PermissionHasRelationsContract
{
    use Slugable, PermissionHasRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'model'];
}
