<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\MandatoryQuestion;
use App\Models\AreaOfInterest;
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
            'name' => 'Sim-Mat',
            'address' => 'Some address lorem ipsum',
            'url' => 'https://sim-mat.pk',
            'facebook' => 'simmat.facebook.com',
            'instagram' => '@simmat',
            'whatsapp' => '',
            'email' => 'simmat@gmail.com',
            'contact' => '1231231234',

        ]);

        $mandatory_questions = [
            [
                'name' => 'A quale servizio di Materias sei interessato?',
                'type' => 2,
            ],
            [
                'name' => 'Titolo della Tecnologia',
                'type' => 1,
            ],
            [
                'name' => 'Acronimo del titolo della tecnologia',
                'type' => 1,
            ],
            [
                'name' => 'Keyword (min. 6 parole)',
                'type' => 2,
            ],
            [
                'name' => "Sintesi dell' Idea/tecnologia proposta (max 2000 caratteri)",
                'type' => 1,
            ],
            [
                'name' => "Qual è l'area di interesse?",
                'type' => 2,
            ],
            [
                'name' => 'Qual è il TRL della tecnologia proposta?',
                'type' => 2,
            ],
            [
                'name' => 'La tecnologia presentata è un upgrade di un prodotto già esistente o è una tecnologia ex-novo?',
                'type' => 2,
            ],
        ];
        foreach ($mandatory_questions as $questions) {
            MandatoryQuestion::create([
                'name' => $questions['name'],
                'type' => $questions['type'],
            ]);
        };

        $area_of_interests = [

            [
                'name' => 'Health Sciences',
                'referent1' => Null,
                'referent2' => Null,
                'parent_id' => Null,
            ],
            [
                'name' => 'Medicine(MEDI)',
                'referent1' => 3,
                'referent2' => 4,
                'parent_id' => 1,
            ],
            [
                'name' => 'Health Professions (HEAL)',
                'referent1' => 3,
                'referent2' => 4,
                'parent_id' => 1,
            ],
            [
                'name' => 'Life Sciences',
                'referent1' => Null,
                'referent2' => Null,
                'parent_id' => Null,
            ],
            [
                'name' => 'Agricultural and Biological Sciences (AGRI)',
                'referent1' => 3,
                'referent2' => 4,
                'parent_id' => 4,
            ],
            [
                'name' => 'Biochemistry, Genetics and Molecular Biology (BIOC)',
                'referent1' => 3,
                'referent2' => 4,
                'parent_id' => 4,
            ],
            [
                'name' => '	Immunology and Microbiology (IMMU)',
                'referent1' => 4,
                'referent2' => 3,
                'parent_id' => 4,
            ],
            [
                'name' => 'harmacology, Toxicology and Pharmaceutics (PHAR)',
                'referent1' => 3,
                'referent2' => 4,
                'parent_id' => 4,
            ],
            [
                'name' => 'Physical Sciences',
                'referent1' => Null,
                'referent2' => Null,
                'parent_id' => Null,
            ],
            [
                'name' => 'Chemical Engineering (CENG)',
                'referent1' => 5,
                'referent2' => 6,
                'parent_id' => 9,
            ],
            [
                'name' => 'Chemistry (CHEM)',
                'referent1' => 5,
                'referent2' => 4,
                'parent_id' => 9,
            ],
            [
                'name' => 'Energy(ENER)',
                'referent1' => 6,
                'referent2' => 7,
                'parent_id' => 9,
            ],
            [
                'name' => 'Engineering(ENGI)',
                'referent1' => 6,
                'referent2' => 7,
                'parent_id' => 9,
            ],
            [
                'name' => 'Environmental Science(ENVI)',
                'referent1' => 6,
                'referent2' => 5,
                'parent_id' => 9,
            ],
            [
                'name' => 'Materials Science(MATE)',
                'referent1' => 6,
                'referent2' => 5,
                'parent_id' => 9,
            ],
            [
                'name' => 'Others',
                'referent1' => Null,
                'referent2' => Null,
                'parent_id' => Null,
            ],
            [
                'name' => 'Other',
                'referent1' => Null,
                'referent2' => Null,
                'parent_id' => 16,
            ],
        ];

        foreach ($area_of_interests as $interest) {
            AreaOfInterest::create([
                'name' => $interest['name'],
                'referent1' => $interest['referent1'],
                'referent2' => $interest['referent2'],
                'parent_id' => $interest['parent_id'],
            ]);
        };

    }
}
