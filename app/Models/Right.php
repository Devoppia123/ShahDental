<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    use HasFactory;

    protected $guards = [];

    public function role_rights()
    {
        return $this->belongsTo(Right::class, 'rights_id', 'id');
    }
}
