<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Repositories\DiseaseRepository;
use App\Models\Disease;

class DiseaseController extends Controller
{
    public function index(DiseaseRepository $diseaseRepo)
    {

        $diseases = $diseaseRepo->getAll();

        return view('disease.list', [
            "diseases" => $diseases,
            "footerYear" => date("Y"),
            "title" => "Moduł Choroby"
        ]);
    }

    public function create()
    {

        return view('disease.create', ["footerYear" => date("Y")]);
    }

    public function store(Request $request)
    {

        $disease = new Disease();
        $disease->name = $request->input('name');
        $disease->save();
        return redirect()->action('App\Http\Controllers\DiseaseController@index');
    }
}
