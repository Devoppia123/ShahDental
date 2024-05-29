<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $timestamp = false;
    public $table = "languages";

    public function DoctorLanguage()
    {
        return $this->belongsTo(DoctorLanguage::class, 'language_id', 'id');
    }
}
