<?php

namespace App\Http\Controllers\Api;

use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Specialization;
use \App\Repositories\UserRepository;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;


class DoctorController extends BaseController
{

    public function index(UserRepository $userRepo)
    {
        $users = $userRepo->getAllDoctors();

        return $users->toJson();
    }

    public function show(UserRepository $userRepo, $id)
    {
        $doctor = $userRepo->find($id);

        return $doctor->toJson();
    }
}
