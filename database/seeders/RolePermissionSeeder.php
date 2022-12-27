<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'view permission',
            'create permission',
            'edit permission',
            'delete permission',
            'view role',
            'create role',
            'edit role',
            'delete role',
            'view user',
            'create user',
            'edit user',
            'delete user',
            'view product',
            'create product',
            'edit product',
            'delete product',
            'view category',
            'create category',
            'edit category',
            'delete category',
        ];
        $roles = [
            'superadmin'
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }
        UserRole::create([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
