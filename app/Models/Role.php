<?php

namespace Falcon\Models;

use Bican\Roles\Contracts\RoleHasRelations as RoleHasRelationsContract;
use Bican\Roles\Traits\RoleHasRelations;
use Bican\Roles\Traits\Slugable;
use Falcon\Models\Shared\Model;

class Role extends Model implements RoleHasRelationsContract
{
    use Slugable, RoleHasRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'level'];
}
