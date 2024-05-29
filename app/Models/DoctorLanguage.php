<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorLanguage extends Model
{
    use HasFactory;
    protected $timestamp = false;
    public $table = "doctor_languages";


    public function language()
    {
        return $this->belongsTo(DoctorLanguage::class, 'doctorID', 'doctor_id');
    }

    public function languages_list()
    {
        return $this->hasMany(Language::class, 'id', 'language_id');
    }
}
