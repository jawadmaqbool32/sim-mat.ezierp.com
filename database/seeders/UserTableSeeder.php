<?php

namespace Database\Seeders;

use App\Core\Helper;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'name' => 'Testing',
            'uid' => Helper::_uid(),
            'email' => 'admin@gmail.com',
            'status' => 'active',
            'password' => Hash::make('12345678'),
        ]);
        $super_admin->save();
    }
}
