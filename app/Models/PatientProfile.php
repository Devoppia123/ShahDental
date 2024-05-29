<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'gender',
        'dob',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'mrn'
    ];
}
