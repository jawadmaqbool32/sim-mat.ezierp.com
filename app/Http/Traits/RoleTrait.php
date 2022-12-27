<?php

namespace App\Http\Traits;

use App\Models\Role;
use App\Models\UserRole;

/**
 * 
 */
trait RoleTrait
{
    public function hasPermission($permission)
    {
        if (auth()->user()->role->name == 'superadmin') {
            return true;
        }
        return Role::where('id', auth()->user()->role->id)
            ->whereHas('permissions', function ($query) use ($permission) {
                $query->where('name', $permission);
            })->exists();
    }
    public function hasRole($role)
    {
        return auth()->user()->role->name == $role;
    }

    public function role()
    {
        return $this->hasOneThrough(
            Role::class,
            UserRole::class,
            'user_id',
            'id',
            'id',
            'role_id',
        );
    }
}
