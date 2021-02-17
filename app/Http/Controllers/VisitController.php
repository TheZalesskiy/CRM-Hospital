<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Repositories\VisitRepository;
use \App\Repositories\UserRepository;
use \App\Models\Visit;
use \App\Models\User;
use \Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VisitController extends Controller

{
    protected $visitRepo;
    protected $userRepo;
    public function __construct(VisitRepository $visitRepo, UserRepository $userRepo)
    {
        $this->middleware('auth');
        $this->visitRepo = $visitRepo;
        $this->userRepo = $userRepo;
    }
    public function index(VisitRepository $visitRepo)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('user-list');
        }
        $visits = $visitRepo->getAll();

        return view('visits.list', [
            "visits" => $visits,
            "footerYear" => date("Y"),
            "title" => "Moduł Visyty"
        ]);
    }
    public function listByUserVisits()
    {

        $users = $this->userRepo->getPatientByVisits(Auth::id());
        foreach ($users as $user) {
            $visits = $user->patientsVisits;
        }

        return view('visits.list', [
            "visits" => $visits,
            "footerYear" => date("Y"),
            "title" => "Moduł lekarzy",

        ]);
    }

    public function create(UserRepository $userRepo)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $doctors = $userRepo->getAllDoctors();
        $patients = $userRepo->getAllPatients();

        return view('visits.create', [
            "patients" => $patients,
            "doctors" => $doctors,
            "footerYear" => date("Y"),
            "title" => "Moduł Visyty"
        ]);
    }


    public function store(Request $request)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $visit = new Visit;
        $visit->doctor_id = $request->input('doctor');
        $visit->patient_id = $request->input('patient');
        $visit->date = $request->input('date');
        $visit->save();

        $patient = User::find($visit->patient_id);
        Mail::send('emails.visit', ['visit' => $visit], function ($m) use ($visit, $patient) {
            $m->to($patient->email, $patient->name)->subject('Nowa wizyta');
        });


        return redirect()->action('App\Http\Controllers\VisitController@index');
    }

    public function delete($id)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $visit = $this->visitRepo->delete($id);

        return redirect('visits');
    }

    public function edit($id)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $visit = $this->visitRepo->find($id);


        return  view('visits.edit', [
            "doctor" => $visit->doctor,
            "patient" => $visit->patient,
            "visit" => $visit,
            "footerYear" => date("Y"),
        ]);
    }

    public function editStore(Request $request)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $visit = Visit::find($request->input('id'));
        $visit->date = $request->input('date');
        $visit->save();

        return redirect()->action('App\Http\Controllers\VisitController@index');
    }
}
