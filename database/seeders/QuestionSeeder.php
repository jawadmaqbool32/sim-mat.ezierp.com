<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'section' => 1,
                'question' => 'La tecnologia è innovativa?',
                'score' => 8,
                'correct_answer' => 1,
                'third_option' => 'Se sì, quali sono gli elementi di novità ',
                'show_third_for' => 1,
                'third_option_is' => 1,
            ],
            [
                'section' => 1,
                'question' => 'Il Know-how per sviluppare la tecnologia è interno alla PMI?',
                'score' => 10,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],
            [
                'section' => 1,
                'question' => 'Sono già state svolte delle attività di R&D per sviluppare la tecnologia?',
                'score' => 8,
                'correct_answer' => 1,
                'third_option' => 'Se si quali',
                'show_third_for' => 1,
                'third_option_is' => 1,
            ],
            [
                'section' => 1,
                'question' => 'La tecnologia è facilmente scalabile (volumi produttivi, strumentazione e costo materie prime)?',
                'score' => 7,
                'correct_answer' => 1,
                'third_option' => 'Motiva la risposta',
                'show_third_for' => Null,
                'third_option_is' => 1,
            ],
            [
                'section' => 1,
                'question' => 'Il processo produttivo su scala di laboratorio è replicabile? ',
                'score' => 7,
                'correct_answer' => 1,
                'third_option' => 'n.d ',
                'show_third_for' => Null,
                'third_option_is' => 2,
            ],
            [
                'section' => 2,
                'question' => "E' stato condotto uno studio di priorità / analisi della letteratura?",
                'score' => 5,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],
            [
                'section' => 2,
                'question' => 'Esiste un brevetto o è stata depositata una domanda di brevetto? (marchio, software)___altre forme di IP',
                'score' => 5,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],
            [
                'section' => 2,
                'question' => 'quale____La IP presente è in proprietà esclusiva del soggetto proponente?',
                'score' => 3,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],
            [
                'section' => 2,
                'question' => 'La IP presente è stata estesa ad altri Paesi?',
                'score' => 3,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],
            [
                'section' => 2,
                'question' => 'In caso di domanda di brevetto il rapporto di ricerca è positivo?',
                'score' => 4,
                'correct_answer' => 1,
                'third_option' => 'N.D.',
                'show_third_for' => Null,
                'third_option_is' => 2,
            ],
            [
                'section' => 2,
                'question' => 'Il proponente ha già pubblicato/divulgato i risultati della ricerca (papers scientifici, articoli di giornali …)',
                'score' => 0,
                'correct_answer' => 1,
                'third_option' => 'Se sì, inserisci il DOI della pubblicazione',
                'show_third_for' => 1,
                'third_option_is' => 1,
            ],
            [
                'section' => 3,
                'question' => "C'è la possibilità di realizzare un prototipo in maniera autonoma?",
                'score' => 7,
                'correct_answer' => 1,
                'third_option' => 'Se no, perchè',
                'show_third_for' => 2,
                'third_option_is' => 1,
            ],
            [
                'section' => 3,
                'question' => 'Hai una sezione dedicata a R&D? e strumentazioni di laboratorio? ',
                'score' => 6,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],
            [
                'section' => 3,
                'question' => 'Sono già stati individuati dei profili che possono essere dedicati allo sviluppo della tecnologia',
                'score' => 4,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],
            [
                'section' => 3,
                'question' => 'Il team è composto da personale di Ricerca con competenze tecnico-scientifiche di alto livello',
                'score' => 5,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],
            [
                'section' => 3,
                'question' => "E' stato definito il percorso da seguire per ottenere una certificazione/registrazione del prodotto?",
                'score' => 4,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],
            [
                'section' => 4,
                'question' => "E' disponibile un'analisi di mercato?",
                'score' => 5,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],
            [
                'section' => 4,
                'question' => "E' disponibile un'analisi dei competitors?",
                'score' => 5,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],
            [
                'section' => 4,
                'question' => "La tecnologia impatta sui temi dell'agenda 2030?",
                'score' => 5,
                'correct_answer' => 1,
                'third_option' => Null,
                'show_third_for' => Null,
                'third_option_is' => Null,
            ],

        ];

        foreach ($questions as $question) {
            Question::create([
                    'section' => $question['section'],
                    'question' => $question['question'],
                    'score' => $question['score'],
                    'correct_answer' => $question['correct_answer'],
                    'third_option' => $question['third_option'],
                    'show_third_for' => $question['show_third_for'],
                    'third_option_is' => $question['third_option_is'],
            ]);
        };
    }
}
