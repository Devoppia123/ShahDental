<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminRoleRights;

class AdminroleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=new AdminRoleRights();
        $user->role_id=1;
        $user->role_name="doctor";
        $user->role_assign_name="View Patient Profiles";
        $user->status=1;
        $user->save();
    }
}
