<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Section

        $sections = [
            'Performed Adtivities',
            'IP',
            'Proof-of-Concpt',
            'Market Analysis'
        ];
        foreach ($sections as $section) {
            Section::create([
                'name' => $section
            ]);
        }
    }
}
