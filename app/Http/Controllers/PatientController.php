<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentConfirm;
use App\Models\AppointmentSchedule;
use App\Models\AppointmentSlot;
use App\Models\BookedAppointment;
use App\Models\CancellationRequest;
use App\Models\ChangeRequest;
use App\Models\PatientProfile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PatientController extends Controller
{
    public function home()
    {
        $id = Session::get('user.id');
        $user = DB::table('users')->where('id', $id)->first();

        $aftersubmit = DB::table('users')
            ->join('patient_profiles', 'users.id', '=', 'patient_profiles.patient_id')
            ->where('id', $id)->first();

        return view('patient.home', compact('user', 'aftersubmit'));
    }

    public function change_password()
    {
        return view('patient.change_password');
    }

    public function update_password_login(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|max:255',
            'confirm_password' => 'same:password'
        ]);
        $update = User::where('id', Session::get('user')['id'])->first();
        $update->password = Hash::make($request->password);
        Session::put('message', 'Password Update Successfully');
        return redirect("/home");
    }

    public function patient_edit_profile($patient_id)
    {
        $user = DB::table('users')->where('id', $patient_id)->first();

        return view('patient.edit_profile', compact('user'));
    }

    public function doedit_profile(Request $request)
    {
        // $request->validate([
        //     'patient_id' => 'required',
        //     'phone' => 'required',
        //     'age' => 'required',
        //     'dob' => 'required',
        //     'gender' => 'required',
        //     'city' => 'required',
        //     'state' => 'required',
        //     'mrn' => 'required',
        //     'country' => 'required',
        //     'address' => 'required',
        //     'profile_image' => 'required',
        // ]);
        $mrn = Str::random(6);

        $add = new PatientProfile();
        $add->patient_id = $request->patient_id;
        $add->phone = $request->phone;
        $add->age = $request->age;
        $add->gender = $request->gender;
        $add->dob = $request->dob;
        $add->city = $request->city;
        $add->mrn = $mrn;
        $add->state = $request->state;
        $add->country = $request->country;
        $add->address = $request->address;
        $patient_image = time() . '.' . $request->profile_image->extension();
        $request->profile_image->move(public_path('patient_profile'), $patient_image);
        $add->profile_image = $patient_image;
        $add->save();

        return redirect('/home');
    }

    public function find_doctor_appointment()
    {
        $id = Session::get('user.id');

        $patient = DB::table('patient_profiles')
            ->join('users', 'users.id', '=', 'patient_profiles.patient_id')
            ->where('patient_id', $id)
            ->first();
        $doctor = DB::table('users')
            ->join('doctors', 'doctors.doctorID', '=', 'users.id')
            ->where('users.role_type', 3)
            ->get();

        $speciaities = DB::table('specialities')->get();

        return view('patient.find_doctor_appointment', compact('speciaities', 'doctor', 'patient'));
    }

    public function book_appointment($day, $doctor_id, $date)
    {
        $id = Session::get('user.id');

        $appointment = DB::table('appointment_schedules')
            ->join('appointment_slots', 'appointment_slots.schedule_id', '=', 'appointment_schedules.id')
            ->where('appointment_slots.booking_id', null)
            ->where('doctor_id', $doctor_id)
            ->whereRaw('DAY(appointment_schedules.schedule_date) = ?', [$day])
            ->take(2)
            ->get();

        $doctor = DB::table('users')
            ->join('doctors', 'doctors.doctorID', '=', 'users.id')
            ->where('users.id', $doctor_id)
            ->first();

        $check_slots = DB::table('doctors')
            ->join('appointment_schedules', 'appointment_schedules.doctor_id', '=', 'doctors.doctorID')
            ->where('doctors.doctorID', $doctor_id)
            ->first();

        $patient = DB::table('patient_profiles')
            ->join('users', 'users.id', '=', 'patient_profiles.patient_id')
            ->where('patient_id', $id)
            ->first();

        $appointment_sessions = DB::table('sessions')->where('status', 1)->get();

        return view('patient.book_appointment', compact('appointment_sessions', 'check_slots', 'date', 'appointment', 'patient', 'doctor', 'day', 'doctor_id'));
    }

    public function booked_appointment(Request $request)
    {
        if ($request->get_value != null) {

            $request->validate([
                'get_value' => 'required'
            ]);

            if ($request->check_value == 1) {
                $booking_id = DB::table('booked_appointments')->insertGetId([
                    'slot_id' => $request->get_value,
                    'patient_id' => $request->patient_id,
                    'mode' => $request->mode,
                    'platform' => $request->platform,
                    'id_number' => $request->id_number,
                    'identity_no' =>  $request->get_number_identity,
                    'passport_date' => null,
                    'consultation_type' => $request->consultation_type,
                    'appointment_reason' => $request->appointment_reason,
                    'status' => 1
                ]);
            } else {
                $booking_id = DB::table('booked_appointments')->insertGetId([
                    'slot_id' => $request->get_value,
                    'patient_id' => $request->patient_id,
                    'mode' => $request->mode,
                    'platform' => $request->platform,
                    'id_number' => $request->id_number,
                    'identity_no' =>  $request->get_number_identity,
                    'passport_date' => date("d/m/Y", strtotime($request->passport_date)),
                    'consultation_type' => $request->consultation_type,
                    'appointment_reason' => $request->appointment_reason,
                    'status' => 1
                ]);
            }

            DB::table('appointment_slots')
                ->where('slot_id', $request->get_value)
                ->update(['booking_id' => $booking_id]);
        } else {
            $request->validate([
                'session_id' => 'required'
            ]);
            if ($request->check_value == 1) {
                $booking_id = DB::table('booked_appointments')->insertGetId([
                    'session' => $request->session_id,
                    'doctor_id' => $request->doctor_id,
                    'patient_id' => $request->patient_id,
                    'mode' => $request->mode,
                    'platform' => $request->platform,
                    'id_number' => $request->id_number,
                    'identity_no' =>  $request->get_number_identity,
                    'passport_date' => null,
                    'consultation_type' => $request->consultation_type,
                    'appointment_reason' => $request->appointment_reason,
                    'appointment_date' => $request->appointment_date,
                    'status' => 1
                ]);
            } else {
                $booking_id = DB::table('booked_appointments')->insertGetId([
                    'session' => $request->session_id,
                    'doctor_id' => $request->doctor_id,
                    'patient_id' => $request->patient_id,
                    'mode' => $request->mode,
                    'platform' => $request->platform,
                    'id_number' => $request->id_number,
                    'identity_no' =>  $request->get_number_identity,
                    'passport_date' => date("d/m/Y", strtotime($request->passport_date)),
                    'consultation_type' => $request->consultation_type,
                    'appointment_reason' => $request->appointment_reason,
                    'appointment_date' => $request->appointment_date,
                    'status' => 1
                ]);
            }
        }
        return redirect("/appointment-instructions/$booking_id");
    }

    public function appointment_instructions_login($booking_id)
    {
        $show_details = DB::table('booked_appointments')
            ->select(
                'booked_appointments.booking_id',
                'booked_appointments.slot_id',
                'doctor.name as doctor_name',
                'booked_appointments.mode',
                'booked_appointments.patient_id',
                'booked_appointments.doctor_id',
                'sessions.session_name',
                'sessions.start_time',
                'sessions.end_time',
                'patient.name as patient_name',
                'booked_appointments.appointment_date'
            )
            ->join('users as doctor', 'doctor.id', '=', 'booked_appointments.doctor_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->join('sessions', 'sessions.id', '=', 'booked_appointments.session')
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        // dd($show_details);


        $show_details_slots = DB::table('booked_appointments')
            ->select(
                'booked_appointments.booking_id',
                'booked_appointments.session',
                'booked_appointments.patient_id',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'doctor.name as doctor_name',
                'patient.name as patient_name',
                'appointment_schedules.schedule_date',
                'booked_appointments.mode'
            )
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->where('booked_appointments.booking_id', $booking_id)
            ->whereNotNull('booked_appointments.slot_id')
            ->get();

        return view('patient.apppointment_instructions', compact('show_details', 'show_details_slots'));
    }

    public function appointment_mail_login($booking_id)
    {
        $details =  DB::table('booked_appointments')
            ->select(
                'booked_appointments.booking_id',
                'booked_appointments.slot_id',
                'doctor.name as doctor_name',
                'booked_appointments.mode',
                'booked_appointments.patient_id',
                'booked_appointments.doctor_id',
                'sessions.session_name',
                'sessions.start_time',
                'sessions.end_time',
                'patient.name as patient_name',
                'patient.email as patient_email',
                'patient_profiles.phone as patient_phone',
                'booked_appointments.appointment_date'
            )
            ->join('users as doctor', 'doctor.id', '=', 'booked_appointments.doctor_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'patient.id')
            ->join('sessions', 'sessions.id', '=', 'booked_appointments.session')
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        $show_details_slots = DB::table('booked_appointments')
            ->select(
                'booked_appointments.booking_id',
                'booked_appointments.session',
                'patient.name as patient_name',
                'patient.email as patient_email',
                'patient_profiles.phone as patient_phone',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'doctor.name as doctor_name',
                'appointment_schedules.schedule_date',
                'booked_appointments.mode'
            )
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'patient.id')
            ->where('booked_appointments.booking_id', $booking_id)
            ->whereNotNull('booked_appointments.slot_id')
            ->get();

        if (count($details) < 1) {
            foreach ($show_details_slots as $list) {
                $email = $list->patient_email;
            }
            $check_email = 1;
            Mail::to($email)->send(new AppointmentConfirm($show_details_slots, $check_email));
        } else {
            foreach ($details as $list) {
                $email = $list->patient_email;
            }
            $check_email = 0;
            Mail::to($email)->send(new AppointmentConfirm($details, $check_email));
        }
        return redirect("/thankyou");
    }

    public function doctorfilter(Request $request)
    {
        $specialityId = $request->input('specialityId');
        $doctors = DB::table('specialities')
            ->join('doctor_specialities', 'doctor_specialities.speciality_id', '=', 'specialities.id')
            ->join('users', 'users.id', '=', 'doctor_specialities.doctor_id')
            ->where('specialities.id', $specialityId)
            ->get();
        return response()->json($doctors);
    }

    public function doctorsearch(Request $request)
    {
        $search = $request->input('search');
        $doctors = DB::table('users')
            ->join('doctors', 'doctors.doctorID', '=', 'users.id')
            ->where('users.name', 'LIKE', '%' . $search . '%')
            ->get();
        return response()->json($doctors);
    }

    public function unavaliable_dates()
    {
        $unavailableDates = AppointmentSchedule::pluck('schedule_date')->toArray();

        $formattedDates = array_map(function ($date) {
            return date('d-m-Y', strtotime($date));
        }, $unavailableDates);

        return response()->json(['dates' => $formattedDates]);
    }

    public function view_booked_appointment($patient_id)
    {
        $appointment = DB::table('booked_appointments')
            ->select(
                'doctor.name as doctor_name',
                'patient.name as patient_name',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'booked_appointments.booking_id',
                'booked_appointments.mode',
                'booked_appointments.platform',
                'booked_appointments.id_number',
                'booked_appointments.identity_no',
                'booked_appointments.passport_date',
                'booked_appointments.consultation_type',
                'booked_appointments.appointment_reason',
                'appointment_schedules.schedule_date'
            )
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->where('patient_id', $patient_id)
            ->where('booked_appointments.status', 1)
            ->get();

        return view('patient.view_booked_appointment', compact('appointment'));
    }

    public function patient_ask_doctor($doctor_id)
    {
        $doctor = DB::table('users')->where('id', $doctor_id)->first();
        return view('patient.patient_ask_doctor', compact('doctor_id', 'doctor'));
    }

    public function patient_submit_question(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        DB::table('ask_doctors')->insert([
            'doctor_id' => $request->doctor_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect("/doctor_profile/$request->doctor_id");
    }

    public function appointment_details($booking_id)
    {
        $appointment = DB::table('booked_appointments')
            ->select(
                'doctor.name as doctor_name',
                'doctor.id as doctor_id',
                'patient.name as patient_name',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'booked_appointments.booking_id',
                'booked_appointments.mode',
                'booked_appointments.platform',
                'booked_appointments.id_number',
                'booked_appointments.identity_no',
                'booked_appointments.passport_date',
                'booked_appointments.consultation_type',
                'booked_appointments.appointment_reason',
                'appointment_schedules.schedule_date'
            )
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        $check = DB::table('cancellation_requests')->where('booking_id', $booking_id)->first();
        $change = DB::table('change_requests')->where('booking_id', $booking_id)->first();

        foreach ($appointment as $list) {
            $doctor_id = $list->doctor_id;
        }

        $patient_id = Session('user')['id'];

        $ischat = DB::table('create_chats')
            ->where('doctor_id', $doctor_id)
            ->where('patient_id', $patient_id)
            ->first();

        return view('patient.appointment_details', compact('appointment', 'check', 'change', 'ischat'));
    }

    public function appointment_cancellation_request($booking_id)
    {
        $appointment = DB::table('booked_appointments')
            ->select(
                'doctor.name as doctor_name',
                'patient.name as patient_name',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'booked_appointments.booking_id',
                'booked_appointments.mode',
                'booked_appointments.platform',
                'booked_appointments.id_number',
                'booked_appointments.identity_no',
                'booked_appointments.passport_date',
                'booked_appointments.consultation_type',
                'booked_appointments.appointment_reason',
                'appointment_schedules.schedule_date'
            )
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        return view('patient.appointment_cancellation_request', compact('booking_id', 'appointment'));
    }

    public function submit_cancellation_request(Request $request)
    {
        $request->validate([
            'reason' => 'required'
        ]);
        $add = new CancellationRequest();
        $add->booking_id = $request->booking_id;
        $add->reason = $request->reason;
        $add->status = 1;
        $add->save();
        return redirect("/appointment_details/$request->booking_id");
    }

    public function change_appointment_request($booking_id)
    {
        $appointment = DB::table('booked_appointments')
            ->select(
                'doctor.name as doctor_name',
                'patient.name as patient_name',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'booked_appointments.booking_id',
                'booked_appointments.mode',
                'booked_appointments.platform',
                'booked_appointments.id_number',
                'booked_appointments.identity_no',
                'booked_appointments.passport_date',
                'booked_appointments.consultation_type',
                'booked_appointments.appointment_reason',
                'appointment_schedules.schedule_date'
            )
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        return view('patient.change_appointment_request', compact('booking_id', 'appointment'));
    }

    public function submit_change_request(Request $request)
    {
        $request->validate([
            'from_date' => 'required',
            'to_date' => 'required',
            'reason' => 'required'
        ]);
        $add = new ChangeRequest();
        $add->booking_id = $request->booking_id;
        $add->from_date = $request->from_date;
        $add->to_date = $request->to_date;
        $add->reason = $request->reason;
        $add->status = 1;
        $add->save();
        return redirect("/appointment_details/$request->booking_id");
    }
}
