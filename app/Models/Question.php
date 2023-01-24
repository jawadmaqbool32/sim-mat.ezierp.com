<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Question
 * @package App\Models
 * @version January 24, 2023, 6:49 am UTC
 *
 * @property integer $section
 * @property string $question
 * @property integer $score
 * @property integer $correct_answer
 * @property string $third_option
 * @property integer $show_third_for
 * @property integer $third_option_is
 */
class Question extends Model
{

    use HasFactory;

    public $table = 'questions';




    public $fillable = [
        'section',
        'question',
        'score',
        'correct_answer',
        'third_option',
        'show_third_for',
        'third_option_is'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'section' => 'integer',
        'question' => 'string',
        'score' => 'integer',
        'correct_answer' => 'integer',
        'third_option' => 'string',
        'show_third_for' => 'integer',
        'third_option_is' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'section' => 'required',
        'question' => 'required',
        'score' => 'required',
        'correct_answer' => 'required',
        'third_option' => 'nullable',
        'show_third_for' => 'nullable',
        'third_option_is' => 'nullable'
    ];



    public function sectionrel()
    {
        return $this->hasOne(
            Section::class,
            'id',
            'section',
        );
    }
}
