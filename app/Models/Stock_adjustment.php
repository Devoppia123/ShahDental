<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_adjustment extends Model
{
    use HasFactory;
    public function invertoryitem(){
        return $this->hasMany(Invertoryitem::class,'id','item_id');
    }
}
