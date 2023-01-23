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
        //id = 1
        $super_admin = User::create([
            'name' => 'Super Admin',
            'uid' => Helper::_uid(),
            'email' => 'admin@gmail.com',
            'status' => 'active',
            'password' => Hash::make('12345678'),
        ]);
        $super_admin->save();

        //id = 2
        $employee = User::create([
            'name' => 'test Employee',
            'uid' => Helper::_uid(),
            'email' => 'employee@gmail.com',
            'status' => 'active',
            'password' => Hash::make('12345678'),
        ]);
        $employee->save();

        //id =3
        $reference = User::create([
            'name' => 'AC',
            'uid' => Helper::_uid(),
            'email' => 'ac@gmail.com',
            'status' => 'active',
            'password' => Hash::make('12345678'),
        ]);
        $reference->save();

        //id = 4
        $reference = User::create([
            'name' => 'MEM',
            'uid' => Helper::_uid(),
            'email' => 'mem@gmail.com',
            'status' => 'active',
            'password' => Hash::make('12345678'),
        ]);
        $reference->save();

        //id = 5
        $reference = User::create([
            'name' => 'SDM',
            'uid' => Helper::_uid(),
            'email' => 'sdm@gmail.com',
            'status' => 'active',
            'password' => Hash::make('12345678'),
        ]);
        $reference->save();

        //id = 6
        $reference = User::create([
            'name' => 'LA',
            'uid' => Helper::_uid(),
            'email' => 'la@gmail.com',
            'status' => 'active',
            'password' => Hash::make('12345678'),
        ]);
        $reference->save();

        //id = 7
        $reference = User::create([
            'name' => 'FE',
            'uid' => Helper::_uid(),
            'email' => 'fe@gmail.com',
            'status' => 'active',
            'password' => Hash::make('12345678'),
        ]);
        $reference->save();
    }
}
