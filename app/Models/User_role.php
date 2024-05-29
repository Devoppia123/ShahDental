<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    use HasFactory;
    public $table = "users";

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctorID', 'id');
    }
}
