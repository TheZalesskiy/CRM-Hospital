<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Repositories\UserRepository;
use \App\Repositories\PrescriptionRepository;
use \App\Models\Prescription;
use \App\Models\User;
use \Illuminate\Support\Facades\Auth;


class PrescriptionController extends Controller
{
    protected $prescriptionRepo;
    protected $userRepo;
    public function __construct(PrescriptionRepository $prescriptionRepo, UserRepository $userRepo)
    {
        $this->middleware('auth');
        $this->prescriptionRepo = $prescriptionRepo;
        $this->userRepo = $userRepo;
    }
    public function index(PrescriptionRepository $prescriptionRepo)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('user-list-prescription');
        }

        $prescriptions = $prescriptionRepo->getAll();

        return view('prescriptions.list', [
            "prescriptions" => $prescriptions,
            "footerYear" => date("Y"),
            "title" => "Moduł recepta lekarska"
        ]);
    }

    public function create(UserRepository $userRepo)
    {
        $doctors = $userRepo->getAllDoctors();
        $patients = $userRepo->getAllPatients();

        return view('prescriptions.create', [
            "patients" => $patients,
            "doctors" => $doctors,
            "footerYear" => date("Y"),
            "title" => "Moduł recepta lecarska"
        ]);
    }

    public function store(Request $request)
    {
        $prescription = new Prescription();
        $prescription->doctor_id = $request->input('doctor');
        $prescription->patient_id = $request->input('patient');
        $prescription->prescriptions = $request->input('prescriptions');
        $prescription->save();

        return redirect()->action('App\Http\Controllers\PrescriptionController@index');
    }

    public function edit($id)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $prescription = $this->prescriptionRepo->find($id);


        return  view('prescriptions.edit', [
            "doctor" => $prescription->doctor,
            "patient" => $prescription->patient,
            "prescriptions" => $prescription,
            "footerYear" => date("Y"),
        ]);
    }

    public function editStore(Request $request)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $prescription = Prescription::find($request->input('id'));
        $prescription->prescriptions = $request->input('prescriptions');
        $prescription->save();

        return redirect()->action('App\Http\Controllers\PrescriptionController@index');
    }

    public function listByUserPrescription()
    {

        $users = $this->userRepo->getPatientByPrescription(Auth::id());
        foreach ($users as $user) {
            $prescriptions = $user->patientsPrescriptions;
        }

        return view('prescriptions.list', [
            "prescriptions" => $prescriptions,
            "footerYear" => date("Y"),
            "title" => "Moduł Patienty",

        ]);
    }
}
