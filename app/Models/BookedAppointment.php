<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedAppointment extends Model
{
    use HasFactory;
    protected $table = "booked_appointments";
    protected $fillable = [
        'session',
        'patient_id',
        'doctor_id',
        'appointment_procedure',
        'branch_id',
        'mode',
        'platform',
        'id_number',
        'identity_no',
        'passport_date',
        'consultation_type',
        'appointment_reason',
        'appointment_date',
        'status'
    ];
}
