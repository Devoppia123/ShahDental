<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;

class AdminRoleRights extends Model
{
    use HasFactory;
    public $table = "admin_role_rights";
    function role_assign(){
        $done=request()->route()->parameters();

        return $this->hasMany(AdminRoleRightDetailes::class,'role_right_id','id')->where('user_id',$done);
    }
}
