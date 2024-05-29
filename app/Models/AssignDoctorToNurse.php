<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignDoctorToNurse extends Model
{
    use HasFactory;

    protected $fillable = [
        'nurse_id',
        'doctor_id',
    ];

    public function User()
    {
        return $this->hasMany(User::class, 'id', 'nurse_id');
    }
}
