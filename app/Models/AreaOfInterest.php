<?php

namespace App\Models;
use App\Models\User;
use Eloquent as Model;



/**
 * Class AreaOfInterest
 * @package App\Models
 * @version January 22, 2023, 10:47 am UTC
 *
 * @property string $name
 * @property string $referent1
 * @property string $referent2
 * @property integer $parent_id
 */
class AreaOfInterest extends Model
{


    public $table = 'area_of_interests';




    public $fillable = [
        'name',
        'referent1',
        'referent2',
        'parent_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'referent1' => 'string',
        'referent2' => 'string',
        'parent_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function child()
    {
        return $this->hasMany(
            AreaOfInterest::class,
            'parent_id',
            'id',
        );
    }
    public function user1()
    {
        return $this->hasOne(
            User::class,
            'id',
            'referent1',
        );
    }
    public function user2()
    {
        return $this->hasOne(
            User::class,
            'id',
            'referent2',
        );
    }

}
