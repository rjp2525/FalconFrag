<?php

namespace Falcon\Modules\Vault\Traits;

use Falcon\Models\Shared\Model;
use Falcon\Models\Vault\Permission;

trait HasRoleAndPermission
{
    /**
     * Property for caching roles.
     *
     * @var \Illuminate\Database\Eloquent\Collection|null
     */
    protected $roles;

    /**
     * Property for caching permissions.
     *
     * @var \Illuminate\Database\Eloquent\Collection|null
     */
    protected $permissions;

    /**
     * User belongs to many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(config('vault.models.role'))->withTimestamps();
    }

    /**
     * Get all roles as collection.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRoles()
    {
        return (!$this->roles) ? $this->roles = $this->roles()->get() : $this->roles;
    }

    /**
     * Check if the user has a role or roles.
     *
     * @param int|string|array $role
     * @param bool $all
     * @return bool
     */
    public function is($role, $all = false)
    {
        if ($this->isPretendEnabled()) {return $this->pretend('is');}

        return $this->{$this->getMethodName('is', $all)}($this->getArrayFrom($role));
    }

    /**
     * Check if the user has at least one role.
     *
     * @param array $roles
     * @return bool
     */
    protected function isOne(array $roles)
    {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {return true;}
        }

        return false;
    }

    /**
     * Check if the user has all roles.
     *
     * @param array $roles
     * @return bool
     */
    protected function isAll(array $roles)
    {
        foreach ($roles as $role) {
            if (!$this->hasRole($role)) {return false;}
        }

        return true;
    }

    /**
     * Check if the user has role.
     *
     * @param int|string $role
     * @return bool
     */
    protected function hasRole($role)
    {
        return $this->getRoles()->contains($role) || $this->getRoles()->contains('node', $role);
    }

    /**
     * Attach role to a user.
     *
     * @param int|\Falcon\Models\Vault\Role $role
     * @return null|bool
     */
    public function attachRole($role)
    {
        return (!$this->getRoles()->contains($role)) ? $this->roles()->attach($role) : true;
    }

    /**
     * Detach role from a user.
     *
     * @param int|\Falcon\Models\Vault\Role $role
     * @return int
     */
    public function detachRole($role)
    {
        return $this->roles()->detach($role);
    }

    /**
     * Detach all roles from a user.
     *
     * @return int
     */
    public function detachAllRoles()
    {
        return $this->roles()->detach();
    }

    /**
     * Get role level of a user.
     *
     * @return int
     */
    public function level()
    {
        return ($role = $this->getRoles()->sortByDesc('level')->first()) ? $role->level : 0;
    }

    /**
     * Get all permissions from roles.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function rolePermissions()
    {
        if (!$roles = $this->getRoles()->lists('id')->toArray()) {$roles = [];}

        return Permission::select(['permissions.*', 'permission_role.created_at as pivot_created_at', 'permission_role.updated_at as pivot_updated_at'])
            ->join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')->join('roles', 'roles.id', '=', 'permission_role.role_id')
            ->whereIn('roles.id', $roles)->orWhere('roles.level', '<', $this->level())
            ->groupBy('permissions.id');
    }

    /**
     * User belongs to many permissions.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userPermissions()
    {
        return $this->belongsToMany(config('vault.models.permission'))->withTimestamps();
    }

    /**
     * Get all permissions as collection.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPermissions()
    {
        return (!$this->permissions) ? $this->permissions = $this->rolePermissions()->get()->merge($this->userPermissions()->get()) : $this->permissions;
    }

    /**
     * Check if the user has a permission or permissions.
     *
     * @param int|string|array $permission
     * @param bool $all
     * @return bool
     */
    public function can($permission, $all = false)
    {
        if ($this->isPretendEnabled()) {return $this->pretend('can');}

        return $this->{$this->getMethodName('can', $all)}($this->getArrayFrom($permission));
    }

    /**
     * Check if the user has at least one permission.
     *
     * @param array $permissions
     * @return bool
     */
    protected function canOne(array $permissions)
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission)) {return true;}
        }

        return false;
    }

    /**
     * Check if the user has all permissions.
     *
     * @param array $permissions
     * @return bool
     */
    protected function canAll(array $permissions)
    {
        foreach ($permissions as $permission) {
            if (!$this->hasPermission($permission)) {return false;}
        }

        return true;
    }

    /**
     * Check if the user has a permission.
     *
     * @param int|string $permission
     * @return bool
     */
    protected function hasPermission($permission)
    {
        return $this->getPermissions()->contains($permission) || $this->getPermissions()->contains('node', $permission);
    }

    /**
     * Check if the user is allowed to manipulate with entity.
     *
     * @param string $providedPermission
     * @param \Illuminate\Database\Eloquent\Model $entity
     * @param bool $owner
     * @param string $ownerColumn
     * @return bool
     */
    public function allowed($providedPermission, Model $entity, $owner = true, $ownerColumn = 'user_id')
    {
        if ($this->isPretendEnabled()) {return $this->pretend('allowed');}

        if ($owner === true && $entity->{$ownerColumn} == $this->id) {return true;}

        return $this->isAllowed($providedPermission, $entity);
    }

    /**
     * Check if the user is allowed to manipulate with provided entity.
     *
     * @param string $providedPermission
     * @param \Illuminate\Database\Eloquent\Model $entity
     * @return bool
     */
    protected function isAllowed($providedPermission, Model $entity)
    {
        foreach ($this->getPermissions() as $permission) {
            if ($permission->model != '' && get_class($entity) == $permission->model
                && ($permission->id == $providedPermission || $permission->node === $providedPermission)
            ) {return true;}
        }

        return false;
    }

    /**
     * Attach permission to a user.
     *
     * @param int|\Falcon\Models\Vault\Permission $permission
     * @return null|bool
     */
    public function attachPermission($permission)
    {
        return (!$this->getPermissions()->contains($permission)) ? $this->userPermissions()->attach($permission) : true;
    }

    /**
     * Detach permission from a user.
     *
     * @param int|\Falcon\Models\Vault\Permission $permission
     * @return int
     */
    public function detachPermission($permission)
    {
        return $this->userPermissions()->detach($permission);
    }

    /**
     * Detach all permissions from a user.
     *
     * @return int
     */
    public function detachAllPermissions()
    {
        return $this->userPermissions()->detach();
    }

    /**
     * Check if pretend option is enabled.
     *
     * @return bool
     */
    private function isPretendEnabled()
    {
        return (bool) config('vault.pretend.enabled');
    }

    /**
     * Allows to pretend or simulate package behavior.
     *
     * @param string $option
     * @return bool
     */
    private function pretend($option)
    {
        return (bool) config('vault.pretend.options.' . $option);
    }

    /**
     * Get method name.
     *
     * @param string $methodName
     * @param bool $all
     * @return string
     */
    private function getMethodName($methodName, $all)
    {
        return ((bool) $all) ? $methodName . 'All' : $methodName . 'One';
    }

    /**
     * Get an array from argument.
     *
     * @param int|string|array $argument
     * @return array
     */
    private function getArrayFrom($argument)
    {
        return (!is_array($argument)) ? preg_split('/ ?[,|] ?/', $argument) : $argument;
    }

    /**
     * Handle dynamic method calls.
     *
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (starts_with($method, 'is')) {
            return $this->is(snake_case(substr($method, 2), config('vault.separator')));
        } elseif (starts_with($method, 'can')) {
            return $this->can(snake_case(substr($method, 3), config('vault.separator')));
        } elseif (starts_with($method, 'allowed')) {
            return $this->allowed(snake_case(substr($method, 7), config('vault.separator')), $parameters[0], (isset($parameters[1])) ? $parameters[1] : true, (isset($parameters[2])) ? $parameters[2] : 'user_id');
        }

        return parent::__call($method, $parameters);
    }
}
