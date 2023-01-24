<?php

namespace App\Repositories;

use App\Models\Section;
use App\Repositories\BaseRepository;

/**
 * Class SectionRepository
 * @package App\Repositories
 * @version January 24, 2023, 5:57 am UTC
*/

class SectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Section::class;
    }
}
