<?php

namespace App\Http\Controllers;

use App\Models\Disease;
use Illuminate\Http\Request;
use App\Models\User;
use \App\Repositories\UserRepository;
use \Illuminate\Support\Facades\Auth;


class PatientController extends Controller
{

    public function index(UserRepository $userRepo)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }

        $users = $userRepo->getAllPatients();


        return view('patients.list', [
            "patientsList" => $users,
            "footerYear" => date("Y"),
            "title" => "Moduł pacjentów"
        ]);
    }
    public function show(UserRepository $userRepo, $id)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $patient = $userRepo->find($id);

        return view('patients.show', [
            "patient" => $patient,
            "footerYear" => date("Y"),
            "title" => "Moduł pacjentów"
        ]);
    }

    public function listByDisease(UserRepository $userRepo, $id)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }


        $users = $userRepo->getPatientByDisease($id);

        return view('patients.list', [
            "patientsList" => $users,
            "footerYear" => date("Y"),
            "title" => "Moduł pacjentów",

        ]);
    }

    public function create()
    {

        $diseases = Disease::all();

        return view('patients.create', [
            'diseases' => $diseases,
            "footerYear" => date("Y")
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => 'sometimes|required|email|unique:users',
            'password' => ['required', 'min:5'],
            'phone' => ['required'],
            'adress' => ['required'],
            'pesel' => ['required']

        ]);

        $patient = new User;
        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        $patient->password = bcrypt($request->input('password'));
        $patient->phone = $request->input('phone');
        $patient->adress = $request->input('adress');
        $patient->pesel = $request->input('pesel');
        $patient->status = $request->input('status');
        $patient->type = 'patient';
        $patient->save();

        $patient->disease()->sync($request->input('diseases'));
        return redirect()->action('App\Http\Controllers\PatientController@index');

        return view('patients.confirm', [
            "footerYear" => date("Y"),
            "title" => "Moduł pacjentów"
        ]);
    }
    public function edit(UserRepository $userRepo, $id)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $patient = $userRepo->find($id);
        $diseases = Disease::all();

        return  view('patients.edit', [
            "diseases" => $diseases,
            "patient" => $patient,
            "footerYear" => date("Y"),
        ]);
    }


    public function editStore(Request $request)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $patient = User::find($request->input('id'));
        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        $patient->phone = $request->input('phone');
        $patient->adress = $request->input('adress');
        $patient->pesel = $request->input('pesel');
        $patient->save();

        $patient->disease()->sync($request->input('diseases'));
        return redirect()->action('App\Http\Controllers\PatientController@index');
    }

    public function delete(UserRepository $userRepo, $id)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $patient = $userRepo->delete($id);

        return redirect('patients');
    }
}
