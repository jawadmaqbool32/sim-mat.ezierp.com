<?php

namespace App\Repositories;

use App\Models\MandatoryQuestion;
use App\Repositories\BaseRepository;

/**
 * Class MandatoryQuestionRepository
 * @package App\Repositories
 * @version January 21, 2023, 9:04 am UTC
*/

class MandatoryQuestionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        // 'type'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MandatoryQuestion::class;
    }
}
