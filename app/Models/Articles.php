<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    public $timestamp = false;

    public function User()
    {
        return $this->hasMany(User::class, 'id', 'article_by');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'id', 'category_id');
    }

    public function Speciality()
    {
        return $this->hasMany(Speciality::class, 'id', 'speciality_id');
    }
}
