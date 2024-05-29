<?php

namespace App\Traits;

use App\Models\AppointmentSchedule;

trait Avaliable_dates
{

    public function unavaliable_dates($doctor_id)
    {
        $unavailableDates = AppointmentSchedule::where('doctor_id', $doctor_id)
            ->pluck('schedule_date')
            ->toArray();

        $formattedDates = array_map(function ($date) {
            return date('d-m-Y', strtotime($date));
        }, $unavailableDates);

        return response()->json(['dates' => $formattedDates]);
    }
}
