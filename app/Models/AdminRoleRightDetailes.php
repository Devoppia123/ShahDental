<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRoleRightDetailes extends Model
{
    public $table = "admin_role_right_detailes";
    function AdminRoleRights(){
        return $this->belongsTo(AdminRoleRights::class,'id','role_right_id');
    }
}
