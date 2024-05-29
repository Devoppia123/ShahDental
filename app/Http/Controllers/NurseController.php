<?php

namespace App\Http\Controllers;

use App\Mail\answer;
use App\Mail\AppointmentCancellation;
use App\Mail\AppointmentConfirm;
use App\Mail\ChangeAppointment;
use App\Mail\DoctorBookAppointment;
use App\Mail\Reply_Queries;
use App\Models\AppointmentSchedule;
use App\Models\AppointmentSlot;
use App\Models\BookedAppointment;
use App\Models\Doctor;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class NurseController extends Controller
{

    public function __construct(Request $request)
    {
        $doctor_id = $request->doctor_id;
        $counter = DB::table('ask_doctors')->where('read_status', 0)->where('doctor_id', $doctor_id)->select(DB::raw('count(*) as questions'))->first();
        View::share(['selected_doctor_id' => $doctor_id, 'counter' => $counter]);
    }

    public function nurse_home()
    {
        $nurse_id = Session::get('user')['id'];
        $doctors = DB::table('users as nurse')
            ->select(
                'doctor.name as doctor_name',
                'doctor.id as doctor_id',
                'doctors.profile_image'
            )
            ->join('assign_doctor_to_nurses', 'assign_doctor_to_nurses.nurse_id', '=', 'nurse.id')
            ->join('users as doctor', 'doctor.id', '=', 'assign_doctor_to_nurses.doctor_id')
            ->join('doctors', 'doctors.doctorID', '=', 'doctor.id')
            ->where('nurse.id', $nurse_id)
            ->get();

        return view('nurse.nurse_home', compact('doctors'));
    }

    public function nurse_manage_doctor($doctor_id)
    {
        $doctor_id = Session::put('doctor_id', $doctor_id);

        return view('nurse.nurse_manage_doctor', compact('doctor_id'));
    }

    public function nurse_set_doctor_schedule($doctor_id)
    {
        $doctor = DB::table('users')->where('id', $doctor_id)->first();
        return view('nurse.nurse_set_schedule', compact('doctor_id', 'doctor'));
    }

    public function nurse_add_schedule_slots(Request $request)
    {
        $doctor_id = $request->doctor_id;
        $count = $request->count;
        $date1 = $request->date1;
        $date2 = $request->date2;

        $data = ['doctor_id' => $doctor_id, 'count' => $count, 'date1' => $date1, 'date2' => $date2];
        return view('nurse.nurse_add_schedule', compact('data'));
    }

    public function nurse_doadd_schedule_slots(Request $request)
    {
        $doctor_id = $request->doctor_id;
        $start_date = $request->date1;
        $end_date = $request->date2;

        $start_time = date('H:i:s', strtotime($request->from_hours . ':' . $request->from_minutes));
        $end_time = date('H:i:s', strtotime($request->to_hours . ':' . $request->to_minutes));

        $slot_duration = $request->slot_duration;

        $exclude_days = [];
        if (request()->has('exclude_days')) {
            $exclude_days = (array) request()->input('exclude_days');
        }

        $dateRange = CarbonPeriod::create($start_date, $end_date);

        $current_month = date('m');
        $current_year = date('Y');

        foreach ($dateRange as $date) {

            $selectedcurrentDate = $date->format('Y-m-d');

            $day_of_week = date('w', strtotime($date));

            $month_exists = AppointmentSchedule::where('doctor_id', $doctor_id)
                ->whereMonth('schedule_date', $current_month)
                ->whereYear('schedule_date', $current_year)
                ->exists();

            if ($month_exists) {
                Session::put('message', 'Month already exists in the database!');
                return redirect()->back();
            } else {
                if (!in_array($day_of_week, $exclude_days)) {

                    $appointment = new AppointmentSchedule();
                    $appointment->doctor_id = $doctor_id;
                    $appointment->schedule_date = $selectedcurrentDate;
                    $appointment->start_time = $start_time;
                    $appointment->end_time = $end_time;
                    $appointment->status = 1;
                    $appointment->save();

                    $current_time = $start_time;
                    while ($date . ' ' . $end_time > $date . ' ' . $current_time) {
                        $slots = new AppointmentSlot();
                        $slots->schedule_id = $appointment->id;
                        $slots->start_time =  $current_time;
                        $slots->end_time = date('H:i:s', strtotime("+$slot_duration minutes", strtotime($current_time)));
                        $slots->save();

                        $current_time = date('H:i:s', strtotime("+$slot_duration minutes", strtotime($current_time)));
                    }
                    $selectedcurrentDate = date('Y-m-d', strtotime($selectedcurrentDate . ' +1 day'));
                }
            }
        }
        return redirect("/nurse/view_schedule/$current_month/$current_year/$doctor_id")->with('message', 'Slots added successfully!');
    }

    public function nurse_view_schedule($month, $year, $doctor_id)
    {
        $schedule = DB::table('appointment_schedules')
            ->join('users', 'appointment_schedules.doctor_id', '=', 'users.id')
            ->where('appointment_schedules.doctor_id', $doctor_id)
            ->select('appointment_schedules.doctor_id', 'appointment_schedules.id', 'appointment_schedules.start_time', 'appointment_schedules.end_time', 'appointment_schedules.schedule_date')
            ->whereRaw("DATE_FORMAT(appointment_schedules.schedule_date, '%Y-%m') = ?", ["$year-$month"])
            ->get();

        return view('nurse.nurse_view_schedule', compact('schedule', 'month', 'year', 'doctor_id'));
    }

    public function nurse_view_slots($schedule_id, $month, $year, $doctor_id)
    {
        $slots = DB::table('appointment_schedules')
            ->join('appointment_slots', 'appointment_slots.schedule_id', '=', 'appointment_schedules.id')
            ->join('users', 'appointment_schedules.doctor_id', '=', 'users.id')
            ->where('appointment_slots.schedule_id', $schedule_id)
            ->where('appointment_schedules.doctor_id', $doctor_id)
            ->select('appointment_slots.slot_id AS slot_id', 'appointment_slots.start_time AS slot_start_time', 'appointment_slots.end_time AS slot_end_time', 'users.name AS doctor_name', 'users.id AS doctor_id', 'appointment_slots.booking_id')
            ->get();

        $patient = DB::table('appointment_slots')
            ->join('booked_appointments', 'booked_appointments.booking_id', '=', 'appointment_slots.booking_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->first();

        return view('nurse.nurse_view_slots', compact('slots', 'patient'));
    }

    public function nurse_view_booked_appointment($doctor_id)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $Month_start = date('Y-m-d', strtotime($startOfMonth));

        $endOfMonth = Carbon::now()->endOfMonth();
        $Month_end = date('Y-m-d', strtotime($endOfMonth));

        $now = now();
        $weekStartDate = $now->copy()->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->copy()->endOfWeek()->format('Y-m-d');

        $current_date = now()->format('Y-m-d');

        return view('nurse.nurse_view_booked_appointment', compact('weekStartDate', 'weekEndDate', 'Month_start', 'Month_end', 'current_date', 'doctor_id'));
    }

    public function nurse_view_current_month_booking($start_date, $end_date, $doctor_id)
    {
        $data = DB::table('appointment_slots')
            ->select(
                'appointment_slots.start_time AS start_time',
                'appointment_slots.end_time AS end_time',
                'appointment_slots.slot_id as slot_id',
                'appointment_schedules.schedule_date',
                'appointment_slots.booking_id'
            )
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->whereBetween('appointment_schedules.schedule_date', [$start_date, $end_date])
            ->where('appointment_schedules.doctor_id', '=', $doctor_id)
            ->get();

        $patient = DB::table('booked_appointments')
            ->select(
                'patient_profiles.patient_phone',
                'patient_profiles.patient_email',
                'patient_profiles.patient_name',
                'booked_appointments.status',
                'booked_appointments.booking_id'
            )
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('users', 'users.id', '=', 'booked_appointments.patient_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->where('booked_appointments.status', 1)
            ->get();

        return view('nurse.nurse_view_current_month', compact('data', 'patient'));
    }

    public function nurse_view_current_week_booking($start_date, $end_date, $doctor_id)
    {
        $data = DB::table('appointment_slots')
            ->select(
                'appointment_slots.start_time AS start_time',
                'appointment_slots.end_time AS end_time',
                'appointment_slots.slot_id as slot_id',
                'appointment_schedules.schedule_date',
                'appointment_slots.booking_id'
            )
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->whereBetween('appointment_schedules.schedule_date', [$start_date, $end_date])
            ->where('appointment_schedules.doctor_id', '=', $doctor_id)
            ->get();

        $patient = DB::table('booked_appointments')
            ->select(
                'patient_profiles.patient_phone',
                'patient_profiles.patient_email',
                'patient_profiles.patient_name',
                'booked_appointments.status',
                'booked_appointments.booking_id'
            )
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('users', 'users.id', '=', 'booked_appointments.patient_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->where('booked_appointments.status', 1)
            ->get();

        return view('nurse.nurse_view_current_week', compact('data', 'patient'));
    }

    public function nurse_view_current_day_booking($date, $doctor_id)
    {
        $data = DB::table('appointment_slots')
            ->select(
                'appointment_slots.start_time AS start_time',
                'appointment_slots.end_time AS end_time',
                'appointment_slots.slot_id as slot_id',
                'appointment_schedules.schedule_date',
                'appointment_slots.booking_id'
            )
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->where('appointment_schedules.schedule_date', $date)
            ->where('appointment_schedules.doctor_id', '=', $doctor_id)
            ->get();

        $patient = DB::table('booked_appointments')
            ->select(
                'patient_profiles.patient_phone',
                'patient_profiles.patient_email',
                'patient_profiles.patient_name',
                'booked_appointments.status',
                'booked_appointments.booking_id'
            )
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('users', 'users.id', '=', 'booked_appointments.patient_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->where('booked_appointments.status', 1)
            ->get();

        return view('nurse.nurse_view_current_day', compact('data', 'patient'));
    }

    public function nurse_book_appointment($slot_id)
    {
        $patients = DB::table('users')->where('role_type', 10)->get();
        $procedures = DB::table('procedures')->where('status', 1)->get();
        $slot = DB::table('appointment_slots')
            ->select(
                'appointment_schedules.schedule_date',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'appointment_slots.slot_id'
            )
            ->join('appointment_schedules', 'appointment_schedules.id', 'appointment_slots.schedule_id')
            ->where('slot_id', $slot_id)
            ->first();
        return view('nurse.nurse_booked_appointment', compact('patients', 'procedures', 'slot'));
    }

    public function nurse_booked_appintment(Request $request)
    {
        $request->validate([
            'slot_id' => 'required',
            'patient_name' => 'required',
            'patient_email' => 'required',
            'patient_phone' => 'required',
            'mrn_number' => 'required',
        ]);

        $random_string = substr(md5(uniqid(mt_rand(), true)), 0, 10);

        if ($request->check_value == 1) {

            $patient_id = DB::table('patient_profiles')->insertGetId([
                'patient_name' => $request->patient_name,
                'patient_email' => $request->patient_email,
                'patient_phone' => $request->patient_phone,
                'mrn' => $random_string,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'age' => $request->age
            ]);

            $booking_id = DB::table('booked_appointments')->insertGetId([
                'slot_id' => $request->get_value,
                'patient_id' => $patient_id,
                'appointment_procedure' => $request->appointment_procedure,
                'age' => $request->age,
                'dob' => $request->dob,
                'mrn_number' => $random_string,
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

            $patient_id = DB::table('patient_profiles')->insertGetId([
                'patient_name' => $request->patient_name,
                'patient_email' => $request->patient_email,
                'patient_phone' => $request->patient_phone,
                'mrn' => $random_string,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'age' => $request->age
            ]);

            $booking_id = DB::table('booked_appointments')->insertGetId([
                'slot_id' => $request->get_value,
                'patient_id' => $patient_id,
                'appointment_procedure' => $request->appointment_procedure,
                'age' => $request->age,
                'dob' => $request->dob,
                'mrn_number' => $random_string,
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


        $show_details_slots = DB::table('booked_appointments')
            ->select(
                'booked_appointments.booking_id',
                'booked_appointments.session',
                'patient_profiles.patient_name',
                'patient_profiles.patient_email',
                'patient_profiles.patient_phone',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'doctor.name as doctor_name',
                'appointment_schedules.schedule_date',
                'booked_appointments.mode'
            )
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('booked_appointments.booking_id', $booking_id)
            ->whereNotNull('booked_appointments.slot_id')
            ->get();
        $check_email = 1;
        Mail::to($request->patient_email)->send(new AppointmentConfirm($show_details_slots, $check_email));
    }

    public function nurse_view_change_appointment_request($doctor_id)
    {
        $all_request = DB::table('change_requests')
            ->select(
                'booked_appointments.booking_id',
                'patient.name as patient_name',
                'change_requests.from_date',
                'change_requests.to_date',
                'change_requests.reason',
                'change_requests.id',
                'change_requests.status',
            )
            ->join('booked_appointments', 'booked_appointments.booking_id', '=', 'change_requests.booking_id')
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('doctor.id', $doctor_id)
            ->where('change_requests.status', null)
            ->orderByDesc('change_requests.id')
            ->get();

        return view('nurse.nurse_view_change_appointment_request', compact('all_request'));
    }

    public function nurse_change_appointment_details($change_request_id)
    {
        $details = DB::table('change_requests')
            ->select(
                'booked_appointments.booking_id',
                'booked_appointments.mode',
                'patient.name as patient_name',
                'patient_profiles.phone as patient_phone',
                'doctor.name as doctor_name',
                'doctor.id as doctor_id',
                'change_requests.from_date',
                'appointment_schedules.schedule_date',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'change_requests.to_date',
                'change_requests.reason',
            )
            ->join('booked_appointments', 'booked_appointments.booking_id', '=', 'change_requests.booking_id')
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'patient.id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('change_requests.id', $change_request_id)
            ->get();

        return view('nurse.nurse_change_appointment_details', compact('details'));
    }

    public function nurse_change_appointment_date($booking_id, $doctor_id)
    {
        $details = DB::table('change_requests')
            ->select(
                'booked_appointments.booking_id',
                'booked_appointments.mode',
                'patient.name as patient_name',
                'patient_profiles.phone as patient_phone',
                'doctor.name as doctor_name',
                'doctor.id as doctor_id',
                'appointment_schedules.schedule_date',
                'appointment_slots.slot_id',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'change_requests.from_date',
                'change_requests.to_date',
            )
            ->join('booked_appointments', 'booked_appointments.booking_id', '=', 'change_requests.booking_id')
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'patient.id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        return view('nurse.nurse_change_appointment_date', compact('details', 'doctor_id'));
    }

    public function nurse_change_date($booking_id, Request $request)
    {
        DB::table('appointment_slots')
            ->where('appointment_slots.booking_id', $booking_id)
            ->update([
                'booking_id' => null,
            ]);
        DB::table('booked_appointments')
            ->where('booked_appointments.booking_id', $booking_id)
            ->update([
                'slot_id' => $request->get_value,
            ]);

        DB::table('appointment_slots')
            ->where('slot_id', $request->get_value)
            ->update(['booking_id' => $booking_id]);

        DB::table('change_requests')
            ->where('booking_id', $booking_id)
            ->update(['status' => 1]);


        return redirect("/nurse/change_appointment_mail/$booking_id");
    }

    public function nurse_change_appointment_mail($booking_id)
    {
        $details = DB::table('booked_appointments')
            ->select(
                'booked_appointments.booking_id',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'doctor.name as doctor_name',
                'doctor.id as doctor_id',
                'patient.name as patient_name',
                'patient.email as patient_email',
                'patient_profiles.phone as patient_phone',
                'appointment_schedules.schedule_date',
                'booked_appointments.mode',
            )
            ->join('appointment_slots', 'appointment_slots.booking_id', '=', 'booked_appointments.booking_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'patient.id')
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        foreach ($details as $list) {
            $email = $list->patient_email;
            $doctor_id = $list->doctor_id;
        }

        Mail::to($email)->send(new ChangeAppointment($details));

        DB::table('change_requests')
            ->where('booking_id', $booking_id)
            ->update([
                'status' => 1,
            ]);

        return redirect("/nurse/view_change_appointment_request/$doctor_id")->with('success', 'Slots added successfully!');
    }

    public function nurse_avaliable_dates($doctor_id)
    {
        $unavailableDates = AppointmentSchedule::where('doctor_id', $doctor_id)
            ->pluck('schedule_date')
            ->toArray();

        $formattedDates = array_map(function ($date) {
            return date('d-m-Y', strtotime($date));
        }, $unavailableDates);

        return response()->json(['dates' => $formattedDates]);
    }

    public function nurse_view_appointment_cancellation_request($doctor_id)
    {
        $all_request = DB::table('cancellation_requests')
            ->select(
                'booked_appointments.booking_id',
                'patient.name as patient_name',
                'cancellation_requests.reason',
                'cancellation_requests.id',
                'cancellation_requests.status'
            )
            ->join('booked_appointments', 'booked_appointments.booking_id', '=', 'cancellation_requests.booking_id')
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('doctor.id', $doctor_id)
            ->where('cancellation_requests.status', 1)
            ->orderByDesc('cancellation_requests.id')
            ->get();

        return view('nurse.nurse_view_appointment_cancellation_request', compact('all_request'));
    }

    public function nurse_appointment_cancellation_mail($booking_id)
    {
        $details = DB::table('booked_appointments')
            ->select(
                'booked_appointments.booking_id',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'doctor.name as doctor_name',
                'doctor.id as doctor_id',
                'patient.name as patient_name',
                'patient.email as patient_email',
                'patient_profiles.phone as patient_phone',
                'appointment_schedules.schedule_date',
                'booked_appointments.mode',
            )
            ->join('appointment_slots', 'appointment_slots.booking_id', '=', 'booked_appointments.booking_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->join('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'patient.id')
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        foreach ($details as $list) {
            $email = $list->patient_email;
            $doctor_id = $list->doctor_id;
        }

        Mail::to($email)->send(new AppointmentCancellation($details));

        DB::table('cancellation_requests')
            ->where('booking_id', $booking_id)
            ->update([
                'status' => 2,
            ]);

        DB::table('booked_appointments')
            ->where('booking_id', $booking_id)
            ->update([
                'status' => 0,
            ]);
        DB::table('appointment_slots')
            ->where('appointment_slots.booking_id', $booking_id)
            ->update([
                'booking_id' => null,
            ]);

        return redirect("/nurse/view_appointment_cancellation_request/$doctor_id")->with('success', 'Slots added successfully!');
    }

    public function nurse_view_questions($doctor_id)
    {
        DB::table('ask_doctors')
            ->where('doctor_id', $doctor_id)
            ->update(['read_status' => 1]);

        $questions = DB::table('ask_doctors')
            ->join('users', 'users.id', '=', 'ask_doctors.doctor_id')
            ->select('users.name AS doctor_name', 'ask_doctors.id', 'ask_doctors.name', 'ask_doctors.phone', 'ask_doctors.email', 'ask_doctors.subject', 'ask_doctors.message', 'ask_doctors.reply')
            ->where('doctor_id', $doctor_id)
            ->get();
        return view('nurse.nurse_view_ask_question', compact('questions'));
    }

    public function nurse_reply_question($question_id)
    {
        $question = DB::table('ask_doctors')
            ->join('users', 'users.id', '=', 'ask_doctors.doctor_id')
            ->select('users.name AS doctor_name', 'ask_doctors.id', 'ask_doctors.name', 'ask_doctors.phone', 'ask_doctors.email', 'ask_doctors.subject', 'ask_doctors.message', 'ask_doctors.reply')
            ->where('ask_doctors.id', $question_id)->first();
        return view('nurse.nurse_reply_question', compact('question'));
    }

    public function nurse_doreply_question(Request $request, $question_id)
    {
        $request->validate([
            'reply' => 'required',
        ]);
        DB::table('ask_doctors')->where('id', $question_id)->update([
            'reply' => $request->reply,
        ]);

        $question = DB::table('ask_doctors')
            ->join('users', 'users.id', '=', 'ask_doctors.doctor_id')
            ->select('users.name AS doctor_name', 'users.id as doctor_id', 'ask_doctors.id', 'ask_doctors.name', 'ask_doctors.phone', 'ask_doctors.email', 'ask_doctors.subject', 'ask_doctors.message', 'ask_doctors.reply')
            ->where('ask_doctors.id', $question_id)->first();

        Mail::to($question->email)->send(new answer($question));

        return redirect("/nurse/view_questions/$question->doctor_id");
    }

    public function nurse_view_appointment_queries($doctor_id)
    {

        $bookings_slots = DB::table('booked_appointments')
            ->select([
                'patient_profiles.patient_name',
                'patient_profiles.mrn',
                'booked_appointments.appointment_reason',
                'booked_appointments.booking_id',
                'booked_appointments.reply',
                'appointment_schedules.doctor_id'
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('doctor.id', $doctor_id)
            ->get();

        $bookings_session = DB::table('booked_appointments')
            ->select([
                'patient_profiles.patient_name',
                'patient_profiles.mrn',
                'booked_appointments.reply',
                'booked_appointments.doctor_id',
                'booked_appointments.booking_id',
                'booked_appointments.appointment_reason'
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('sessions', 'sessions.id', '=', 'booked_appointments.session')
            ->join('users as doctor', 'doctor.id', '=', 'booked_appointments.doctor_id')
            ->where('doctor.id', $doctor_id)
            ->get();

        $bookings_combined = $bookings_slots->concat($bookings_session);

        return view('nurse.nurse_view_appointment_queries', compact('bookings_combined', 'doctor_id'));
    }

    public function nurse_reply_appointment_query($doctor_id, $booking_id)
    {

        $bookings_slots = DB::table('booked_appointments')
            ->select([
                'patient_profiles.patient_name',
                'patient_profiles.patient_email',
                'patient_profiles.mrn',
                'booked_appointments.appointment_reason',
                'booked_appointments.booking_id',
                'booked_appointments.reply',
                'appointment_schedules.doctor_id'
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('doctor.id', $doctor_id)
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        $bookings_session = DB::table('booked_appointments')
            ->select([
                'patient_profiles.patient_name',
                'patient_profiles.patient_email',
                'patient_profiles.mrn',
                'booked_appointments.reply',
                'booked_appointments.doctor_id',
                'booked_appointments.booking_id',
                'booked_appointments.appointment_reason'
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('sessions', 'sessions.id', '=', 'booked_appointments.session')
            ->join('users as doctor', 'doctor.id', '=', 'booked_appointments.doctor_id')
            ->where('doctor.id', $doctor_id)
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        $bookings_combined = $bookings_slots->concat($bookings_session);

        return view('nurse.nurse_reply_appointment_query', compact('bookings_combined', 'doctor_id'));
    }

    public function nurse_doreply_appointment_query(Request $request, $doctor_id, $booking_id)
    {

        DB::table('booked_appointments')
            ->where('booking_id', $booking_id)
            ->update([
                'reply' => $request->reply
            ]);

        $bookings_slots = DB::table('booked_appointments')
            ->select([
                'patient_profiles.patient_name',
                'patient_profiles.patient_email',
                'patient_profiles.patient_phone',
                'patient_profiles.mrn',
                'booked_appointments.appointment_reason',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'doctor.name as doctor_name',
                'booked_appointments.booking_id',
                'booked_appointments.reply',
                'appointment_schedules.doctor_id'
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('doctor.id', $request->doctor_id)
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        $bookings_session = DB::table('booked_appointments')
            ->select([
                'patient_profiles.patient_name',
                'patient_profiles.patient_email',
                'patient_profiles.patient_phone',
                'patient_profiles.mrn',
                'sessions.session_name',
                'sessions.start_time',
                'sessions.end_time',
                'doctor.name as doctor_name',
                'booked_appointments.reply',
                'sessions.id as booking_id',
                'booked_appointments.booking_id',
                'booked_appointments.doctor_id',
                'booked_appointments.appointment_reason'
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('sessions', 'sessions.id', '=', 'booked_appointments.session')
            ->join('users as doctor', 'doctor.id', '=', 'booked_appointments.doctor_id')
            ->where('booked_appointments.doctor_id', $request->doctor_id)
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        $bookings_combined = $bookings_slots->concat($bookings_session);

        foreach ($bookings_combined as $booking) {
            $email = $booking->patient_email;
        }

        Mail::to($email)->send(new Reply_Queries($bookings_combined));

        return redirect("/nurse/view_appointment_queries/$doctor_id");
    }
}
