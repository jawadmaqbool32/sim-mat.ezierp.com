<?php

namespace App\Repositories;

use App\Models\AreaOfInterest;
use App\Repositories\BaseRepository;

/**
 * Class AreaOfInterestRepository
 * @package App\Repositories
 * @version January 22, 2023, 10:47 am UTC
*/

class AreaOfInterestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'referent1',
        'referent2',
        'parent_id'
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
        return AreaOfInterest::class;
    }
}
