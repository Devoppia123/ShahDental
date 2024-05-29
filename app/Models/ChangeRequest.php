<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'from_date',
        'to_date',
        'reason',
    ];
}
