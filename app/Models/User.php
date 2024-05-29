<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function article_by()
    {
        return $this->belongsTo(Articles::class, 'article_by', 'id');
    }

    public function appointment_schedule()
    {
        return $this->hasMany(AppointmentSchedule::class, 'doctor_id', 'id');
    }

    public function appointment_schedule_api()
    {
        $month = request()->segment(3);
        $year = request()->segment(4);
        return $this->hasMany(AppointmentSchedule::class, 'doctor_id', 'id')
            ->whereRaw("DATE_FORMAT(schedule_date, '%Y-%m') = ?", ["$year-$month"])
            ->with('api_data')
            ->get();
    }

    public function assign_doctor_to_nurse()
    {
        return $this->hasMany(AssignDoctorToNurse::class, 'nurse_id', 'id');
    }
}
