<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAssign extends Model
{
    use HasFactory;
    protected $guards = [];

    public function role_rights()
    {
        return $this->hasMany(Right::class, 'id', 'rights_id');
    }

    public function show_roles()
    {
        return $this->hasMany(Roles::class, 'id', 'role_id');
    }
}
