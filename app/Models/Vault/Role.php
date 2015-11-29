<?php

namespace Falcon\Models\Vault;

use Falcon\Models\Shared\Model;
use Falcon\Modules\Vault\Contracts\RoleHasRelations as RoleHasRelationsContract;
use Falcon\Modules\Vault\Traits\RoleHasRelations;
use Falcon\Modules\Vault\Traits\Sluggable;

class Role extends Model implements RoleHasRelationsContract
{
    use Sluggable, RoleHasRelations;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'node', 'description', 'level'];
}
