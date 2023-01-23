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
            'view employee',
            'create employee',
            'edit employee',
            'delete employee',
            'view product',
            'create product',
            'edit product',
            'delete product',
            'view category',
            'create category',
            'edit category',
            'delete category',
            'view voucher type',
            'create voucher type',
            'edit voucher type',
            'delete voucher type',
            'view voucher',
            'create voucher',
            'edit voucher',
            'delete voucher',
            'place order',
            'add stock',
            'view order',
            'cancel order',
            'mark paid',
            'order refund',
            'view stocks',
            'view sales',
        ];
        $roles = [
            'superadmin',
            'employee',
            'reference',
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'status' => 'active'
            ]);
        }
        UserRole::create([
            'user_id' => 1,
            'role_id' => 1
        ]);
        UserRole::create([
            'user_id' => 2,
            'role_id' => 2
        ]);
        UserRole::create([
            'user_id' => 3,
            'role_id' => 3
        ]);
        UserRole::create([
            'user_id' => 4,
            'role_id' => 3
        ]);
        UserRole::create([
            'user_id' => 5,
            'role_id' => 3
        ]);
        UserRole::create([
            'user_id' => 6,
            'role_id' => 3
        ]);
        UserRole::create([
            'user_id' => 7,
            'role_id' => 3
        ]);
    }
}
