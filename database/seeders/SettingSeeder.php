<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'logo' => 'logo.jpeg',
            'name' => 'AdorableKids',
            'address' => 'Some address lorem ipsum',
            'url' => 'https://adorablekids.pk',
            'facebook' => 'adorablekids.facebook.com',
            'instagram' => '@adorablekids',
            'whatsapp' => '',
            'email' => 'jawadmaqbool32@gmail.com',
            'contact' => '03445909505',

        ]);
    }
}
