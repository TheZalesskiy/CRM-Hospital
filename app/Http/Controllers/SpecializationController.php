<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use \App\Repositories\SpecializationRepository;
use Symfony\Component\CssSelector\Node\Specificity;
use \Illuminate\Support\Facades\Auth;


class SpecializationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(SpecializationRepository $specializationRepo)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $specializations = $specializationRepo->getAll();

        return view('specializations.list', [
            "specializations" => $specializations,
            "footerYear" => date("Y"),
            "title" => "Moduł specialization"
        ]);
    }

    public function create()
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        return view('specializations.create', ["footerYear" => date("Y")]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->type != 'doctor' && Auth::user()->type != 'admin') {
            return redirect()->route('login');
        }
        $specialization = new Specialization();
        $specialization->name = $request->input('name');
        $specialization->save();
        return redirect()->action('App\Http\Controllers\SpecializationController@index');
    }
}
