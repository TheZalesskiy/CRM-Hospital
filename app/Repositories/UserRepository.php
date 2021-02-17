<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getAllDoctors()
    {
        return $this->model->where('type', 'doctor')->orderBY('name', 'asc')->get();
    }

    public function getAllPatients()
    {
        return $this->model->where('type', 'patient')->orderBY('name', 'asc')->get();
    }

    public function getDoctorsStatistics()
    {
        return DB::table('users')->select(DB::raw('count(*) as user_count, status'))->where('type', 'doctor')->groupBy('status')->get();
    }

    public function getDoctorsBySpecializations($id)
    {
        return $this->model->where('type', 'doctor')->whereHas(
            'specializations',
            function ($q) use ($id) {
                $q->where('specializations.id', $id);
            }
        )->orderBy('name', 'asc')->get();
    }
    public function getPatientByDisease($id)
    {
        return $this->model->where('type', 'patient')->whereHas(
            'diseases',
            function ($q) use ($id) {
                $q->where('diseases.id', $id);
            }
        )->orderBy('name', 'asc')->get();
    }
    public function getPatientByVisits($id)

    {

        return $this->model->select('users.*')->join('visits', 'patient_id', 'users.id')->where('patient_id', $id)->get();
    }

    public function getPatientByPrescription($id)

    {

        return $this->model->select('users.*')->join('prescriptions', 'patient_id', 'users.id')->where('patient_id', $id)->get();
    }
}
