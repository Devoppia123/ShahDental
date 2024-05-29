<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorSpeciality extends Model
{
    use HasFactory;

    protected $timestamp = false;
    public $table = "doctor_specialities";

    public function speciality()
    {
        return $this->belongsTo(DoctorSpeciality::class, 'doctorID', 'doctor_id');
    }

    public function specialities_list()
    {
        return $this->hasMany(Speciality::class, 'id', 'speciality_id');
    }
}
