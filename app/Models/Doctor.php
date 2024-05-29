<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Doctor extends Model
{
    use HasFactory;
    public $timestamp = false;
    public $table = "doctors";

    public function user_role()
    {
        return $this->hasMany(User_role::class, 'id', 'doctorID');
    }

    public function doctor_specaility()
    {
        return $this->hasMany(DoctorSpeciality::class, 'doctor_id', 'doctorID')->with('specialities_list');
    }

    public function doctor_language()
    {
        return $this->hasMany(DoctorLanguage::class, 'doctor_id', 'doctorID')->with('languages_list');
    }
}
