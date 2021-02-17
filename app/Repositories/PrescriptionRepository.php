<?php

namespace App\Repositories;

use App\Models\Prescription;

class PrescriptionRepository extends BaseRepository
{
    public function __construct(Prescription $model)
    {
        $this->model = $model;
    }
}
