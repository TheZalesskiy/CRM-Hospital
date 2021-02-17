<?php

namespace App\Repositories;

use App\Models\Disease;

class DiseaseRepository extends BaseRepository
{
    public function __construct(Disease $model)
    {
        $this->model = $model;
    }
}
