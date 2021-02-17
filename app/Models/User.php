<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'adress',
        'status',
        'pesel',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctorsVisits()
    {

        return $this->hasMany(Visit::class, 'doctor_id');
    }

    public function patientsVisits()
    {

        return $this->hasMany(Visit::class, 'patient_id');
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class, 'specializations_users');
    }
    public function disease()
    {
        return $this->belongsToMany(Disease::class, 'diseases_users');
    }
    public function doctorsPrescriptions()
    {

        return $this->hasMany(Prescription::class, 'doctor_id');
    }

    public function patientsPrescriptions()
    {

        return $this->hasMany(Prescription::class, 'patient_id');
    }
}
