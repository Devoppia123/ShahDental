<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sublaborder extends Model
{
    use HasFactory;
    function Laborder(){
        return $this->hasMany(Laborder::class,'id','laborder_id');
    }
}
