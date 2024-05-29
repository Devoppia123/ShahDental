<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    public $timestamp = false;
    public $table = "specialities";


    public function DoctorSpeciality()
    {
        return $this->belongsTo(DoctorSpeciality::class,  'speciality_id', 'id');
    }


    
    public function Articles()
    {
        return $this->belongsTo(Articles::class,  'speciality_id', 'id');
    }
}
