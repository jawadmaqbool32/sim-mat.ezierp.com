<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section' => $this->faker->randomDigitNotNull,
        'question' => $this->faker->text,
        'score' => $this->faker->randomDigitNotNull,
        'correct_answer' => $this->faker->word,
        'third_option' => $this->faker->text,
        'show_third_for' => $this->faker->word,
        'third_option_is' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
