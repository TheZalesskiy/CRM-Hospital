<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('doctors/create', 'App\Http\Controllers\DoctorController@create');
Route::post('doctors/', 'App\Http\Controllers\DoctorController@store');
Route::get('doctors/edit/{id}', 'App\Http\Controllers\DoctorController@edit');
Route::post('doctors/edit/', 'App\Http\Controllers\DoctorController@editStore');
Route::get('doctors/', 'App\Http\Controllers\DoctorController@index');
Route::get('doctors/{id}', 'App\Http\Controllers\DoctorController@show');
Route::get('doctors/delete/{id}', 'App\Http\Controllers\DoctorController@delete');
Route::get('doctors/{id}', 'App\Http\Controllers\DoctorController@show');
Route::get('doctors/specializations/{id}', 'App\Http\Controllers\DoctorController@listBySpecialization');



Route::get('patients/', 'App\Http\Controllers\PatientController@index')->middleware('auth');
Route::get('patients/create', 'App\Http\Controllers\PatientController@create');
Route::get('patients/{id}', 'App\Http\Controllers\PatientController@show')->middleware('auth');
Route::post('patients', 'App\Http\Controllers\PatientController@store');
Route::get('patients/diseases/{id}', 'App\Http\Controllers\PatientController@listByDisease');
Route::get('patients/delete/{id}', 'App\Http\Controllers\PatientController@delete');
Route::get('patients/edit/{id}', 'App\Http\Controllers\PatientController@edit');
Route::post('patients/edit/', 'App\Http\Controllers\PatientController@editStore');




Route::get('specializations/', 'App\Http\Controllers\SpecializationController@index');
Route::get('specializations/create', 'App\Http\Controllers\SpecializationController@create');
Route::post('specializations/', 'App\Http\Controllers\SpecializationController@store');

Route::get('visits/', 'App\Http\Controllers\VisitController@index');
Route::get('visits/create', 'App\Http\Controllers\VisitController@create');
Route::post('visits/', 'App\Http\Controllers\VisitController@store');
Route::get('visits/delete/{id}', 'App\Http\Controllers\VisitController@delete');
Route::get('visits/edit/{id}', 'App\Http\Controllers\VisitController@edit');
Route::post('visits/edit/', 'App\Http\Controllers\VisitController@editStore');
Route::get('visits/user-list', 'App\Http\Controllers\VisitController@listByUserVisits')->name('user-list');




Route::get('disease/', 'App\Http\Controllers\DiseaseController@index');
Route::get('disease/create', 'App\Http\Controllers\DiseaseController@create');
Route::post('disease/', 'App\Http\Controllers\DiseaseController@store');

Route::get('prescriptions/', 'App\Http\Controllers\PrescriptionController@index');
Route::get('prescriptions/create', 'App\Http\Controllers\PrescriptionController@create');
Route::post('prescriptions/', 'App\Http\Controllers\PrescriptionController@store');
Route::get('prescriptions/edit/{id}', 'App\Http\Controllers\PrescriptionController@edit');
Route::post('prescriptions/edit/', 'App\Http\Controllers\PrescriptionController@editStore');
Route::get('prescriptions/user-list-prescription', 'App\Http\Controllers\PrescriptionController@listByUserPrescription')->name('user-list-prescription');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
