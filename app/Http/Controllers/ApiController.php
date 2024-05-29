<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmRegistration;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ApiController extends Controller
{
    public function ApiDataInsert()
    {
        $response = Http::get('https://getphr.com/api/show_hospital/6');


        $posts = json_decode($response->body());

        // echo "<pre>";


        // $store_id = [];

        // foreach ($posts as $list) {
        //     foreach ($list->two_factor as $get_id) {
        //         // echo "<pre>";
        //         // print_r($get_id->id);
        //         $store_id[] = $get_id->id;
        //     }
        // }
        // print_r($posts);

        // exit;

        return view('apidate', compact('posts'));


        // foreach ($posts as $list) {

        //     $lists = (array)$list;

        //     ApiDataInsert::updateOrCreate(
        //         ['patientID' => $lists['patientID']],
        //         [
        //             'patientID' => $lists['patientID'],
        //             'email' => $lists['email'],
        //             // 'password' => Hash::make($lists['password']),
        //             'password' => $lists['password'],
        //             'gender' => $lists['gender'],
        //             'country' => $lists['country'],
        //             'fullName' => $lists['fullName'],
        //             'icppno' => $lists['icppno'],
        //             'dob' => $lists['dob'],
        //             'age' => $lists['age'],
        //             'primaryPhone' => $lists['primaryPhone'],
        //             'address' => $lists['address'],
        //             'address1' => $lists['address1'],
        //             'city' => $lists['city'],
        //             'state' => $lists['state'],
        //             'MRN' => $lists['MRN'],
        //             'pTime' => $lists['pTime'],
        //             'iscomplete' => $lists['iscomplete'],
        //             'hospital_domain' => $lists['hospital_domain'],
        //             'Hospital_id' => $lists['Hospital_id'],
        //             // 'is_new' => $lists['new_patient'],
        //         ]
        //     );
        // }

        // dd('data store');
    }

    public function register_patient(Request $request)
    {
        $add = new User();
        $add->name = $request->input('name');
        $add->email = $request->input('email');
        $add->password = Hash::make($request->input('password'));
        $add->role_type = 10;
        $password = $request->input('password');
        Session(['password' => $password]);
        $add->save();
        return redirect("/api/confirmation_email/$add->id");
    }

    public function confirmation_email($patient_id)
    {
        $patient_info = DB::table('users')->where('id', $patient_id)->first();
        Mail::to($patient_info->email)->send(new ConfirmRegistration($patient_info));
        dd("Email is Sent.");
    }

    public function all_patients()
    {
        $users = DB::table('users')->where('role_type', 10)->get();
        return response()->json($users);
    }

    public function new_patients()
    {
        $users = DB::table('users')->where('role_type', 10)->orderBy('created_at', 'desc')->first();
        return response()->json($users);
    }

    public function doctors()
    {
        $doctors = Doctor::with('user_role', 'doctor_specaility.specialities_list', 'doctor_language.languages_list')->get();
        return response()->json($doctors);
    }
}
