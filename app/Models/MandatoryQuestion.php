<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class MandatoryQuestion
 * @package App\Models
 * @version January 21, 2023, 9:04 am UTC
 *
 * @property string $name
 * @property integer $type
 */
class MandatoryQuestion extends Model
{


    public $table = 'mandatory_questions';
    



    public $fillable = [
        'name',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'type' => 'required'
    ];

    
}
