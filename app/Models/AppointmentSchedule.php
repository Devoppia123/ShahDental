<?php

namespace App\Models;

use App\Traits\Avaliable_dates;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor_id', 'schedule_date', 'start_time', 'end_time', 'status'
    ];
}
