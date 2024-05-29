<?php

namespace App\Http\Controllers;

use App\Models\CreateChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class DiscussionController extends Controller
{

    public function __construct()
    {
        $doctor_id = Session::get('user')['id'];
        $counter = DB::table('ask_doctors')->where('read_status', 0)->where('doctor_id', $doctor_id)->select(DB::raw('count(*) as questions'))->first();
        View::share(['counter' => $counter]);
    }

    public function create_chat_with_doctor($doctor_id)
    {
        $patient_id = Session::get('user')['id'];

        $add = new CreateChat();
        $add->patient_id = $patient_id;
        $add->doctor_id = $doctor_id;
        $add->save();
        $chat_id =  $add->id;

        return redirect("/chat_with_doctor/$chat_id");
    }

    public function chat_with_doctor($chat_id)
    {
        $doctor = DB::table('create_chats')
            ->join('users', 'users.id', '=', 'create_chats.doctor_id')
            ->get();
        foreach ($doctor as $list) {
            $doctor_name = $list->name;
        }

        return view('chat.chat_with_doctor', compact('doctor_name', 'chat_id'));
    }

    public function send_message(Request $request)
    {
        $user_id = Session::get('user')['id'];
        $data = [
            'msg_by' => $user_id,
            'chat_id' => $request->chat_id,
            'text' => $request->msg,
            'status' => 1,
        ];

        DB::table('chats')->insert($data);
    }

    public function msg_loader($chat_id)
    {
        $chats =  DB::table('chats')
            ->join('users', 'users.id', '=', 'chats.msg_by')
            ->where('chat_id', $chat_id)
            ->get();

        return view('chat.chat_loader', compact('chats'));
    }

    public function doctor_view_chats()
    {
        $doctor_id = Session::get('user')['id'];
        $appointment_patients = DB::table('booked_appointments')
            ->join('appointment_slots', 'appointment_slots.booking_id', '=', 'booked_appointments.booking_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->where('appointment_schedules.doctor_id', $doctor_id)
            ->get();

        $chat_status = [];
        foreach ($appointment_patients as $list) {
            $patient_id = $list->patient_id;
            $check_chat = DB::table('create_chats')
                ->where('doctor_id', $doctor_id)
                ->where('patient_id', $patient_id)
                ->get();
            $chat_status[$patient_id] = count($check_chat) ? $check_chat[0]->id : null;
        }

        return view('doctor.doctor_view_chats', compact('appointment_patients', 'chat_status', 'doctor_id'));
    }

    public function doctor_start_chat($patient_id)
    {
        $doctor_id = Session::get('user')['id'];

        $add = new CreateChat();
        $add->patient_id = $patient_id;
        $add->doctor_id = $doctor_id;
        $add->save();
        $chat_id =  $add->id;

        return redirect("/doctor/chat_with_patient/$chat_id");
    }

    public function doctor_chat_with_patient($chat_id)
    {
        $doctor = DB::table('create_chats')
            ->join('users', 'users.id', '=', 'create_chats.patient_id')
            ->get();
        foreach ($doctor as $list) {
            $patient_name = $list->name;
        }

        return view('chat.chat_with_patient', compact('patient_name', 'chat_id'));
    }

    public function doctor_send_message(Request $request)
    {
        $user_id = Session::get('user')['id'];
        $data = [
            'msg_by' => $user_id,
            'chat_id' => $request->chat_id,
            'text' => $request->msg,
            'status' => 1,
        ];

        DB::table('chats')->insert($data);
    }

    public function doctor_msg_loader($chat_id)
    {
        $chats =  DB::table('chats')
            ->join('users', 'users.id', '=', 'chats.msg_by')
            ->where('chat_id', $chat_id)
            ->get();

        return view('chat.doctor_chat_loader', compact('chats'));
    }
}
