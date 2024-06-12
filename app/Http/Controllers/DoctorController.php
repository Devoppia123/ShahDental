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
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function __construct()
    {
        $doctor_id = Session::get('user')['id'];
        $counter = DB::table('ask_doctors')->where('read_status', 0)->where('doctor_id', $doctor_id)->select(DB::raw('count(*) as questions'))->first();
        View::share(['counter' => $counter]);
    }

    public function doctor_home()
    {
        return view('doctor.doctor_home');
    }

    public function set_doctor_schedule(Request $request)
    {
        $doctor_id = $request->doctor_id;
        $count = $request->count;
        $date1 = $request->date1;
        $date2 = $request->date2;

        $data = ['doctor_id' => $doctor_id, 'count' => $count, 'date1' => $date1, 'date2' => $date2];
        return view('doctor.doctor_add_schedule', compact('data'));
    }

    public function add_schedule_slots(Request $request)
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

            // if ($month_exists) {
            //     // Session::put('message', 'Month already exists in the database!');
            //     // return redirect()->back();
            // } else {
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
            // }
        }
        return redirect("/doctor/view_schedule/$current_month/$current_year/$doctor_id");
    }

    public function view_schedule($month, $year, $doctor_id)
    {
        $schedule = DB::table('appointment_schedules')
            ->join('users', 'appointment_schedules.doctor_id', '=', 'users.id')
            ->where('appointment_schedules.doctor_id', $doctor_id)
            ->select('appointment_schedules.doctor_id', 'appointment_schedules.id', 'appointment_schedules.start_time', 'appointment_schedules.end_time', 'appointment_schedules.schedule_date')
            ->whereRaw("DATE_FORMAT(appointment_schedules.schedule_date, '%Y-%m') = ?", ["$year-$month"])
            ->get();
        $enable_slot = DB::table('doctors')->where('doctorID', $doctor_id)->first();
        return view('doctor.doctor_view_schedule', compact('schedule', 'month', 'year', 'doctor_id', 'enable_slot'));
    }

    public function doctor_view_slots($schedule_id, $month, $year, $doctor_id)
    {
        $slots = DB::table('appointment_schedules')
            ->join('appointment_slots', 'appointment_slots.schedule_id', '=', 'appointment_schedules.id')
            ->join('users', 'appointment_schedules.doctor_id', '=', 'users.id')
            ->where('appointment_slots.schedule_id', $schedule_id)
            ->where('appointment_schedules.doctor_id', $doctor_id)
            ->select('appointment_slots.slot_id AS slot_id', 'appointment_slots.start_time AS slot_start_time', 'appointment_slots.end_time AS slot_end_time', 'users.name AS doctor_name', 'appointment_slots.booking_id')
            ->get();

        $patient = DB::table('appointment_slots')
            ->join('booked_appointments', 'booked_appointments.booking_id', '=', 'appointment_slots.booking_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->first();

        return view('doctor.doctor_view_slots', compact('slots', 'patient'));
    }

    public function doctor_view_profile($doctor_id)
    {
        $doctor = Doctor::with('user_role', 'doctor_specaility.specialities_list', 'doctor_language.languages_list')
            ->where('doctorID', $doctor_id)
            ->get();
        $timing = DB::table('set_timings')->where('doctor_id', $doctor_id)->first();
        $social = DB::table('socials')->where('doctor_id', $doctor_id)->first();

        return view('doctor.doctor_profile', compact('doctor', 'timing', 'social'));
    }

    public function doctor_visiting_card($doctor_id)
    {
        $card = DB::table('visiting_cards')->where('doctor_id', $doctor_id)->first();
        return view('doctor.doctor_visiting_card', compact('doctor_id', 'card'));
    }

    public function doctor_doadd_visiting_card(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'front_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'back_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ], [
            'front_image.required' => 'Front Image is required',
            'back_image.required' => 'Back Image is required',
        ]);

        $frontImage = $request->front_image->getClientOriginalName();
        $request->front_image->move(public_path('visiting_card'), $frontImage);

        $backImage = $request->back_image->getClientOriginalName();
        $request->back_image->move(public_path('visiting_card'), $backImage);

        $doctor_id = $request->doctor_id;

        $add = [
            'doctor_id' => $doctor_id,
            'front_image' => $frontImage,
            'back_image' => $backImage,
        ];

        DB::table('visiting_cards')->insert($add);

        return redirect("/doctor/view_visiting_card/$doctor_id");
    }

    public function doctor_view_visiting_card($doctor_id)
    {
        $card = DB::table('visiting_cards')->where('doctor_id', $doctor_id)->first();
        return view('doctor.doctor_view_visiting_card', compact('card'));
    }

    public function doctor_view_questions($doctor_id)
    {
        DB::table('ask_doctors')
            ->where('doctor_id', $doctor_id)
            ->update(['read_status' => 1]);

        $questions = DB::table('ask_doctors')
            ->join('users', 'users.id', '=', 'ask_doctors.doctor_id')
            ->select('users.name AS doctor_name', 'ask_doctors.id', 'ask_doctors.name', 'ask_doctors.phone', 'ask_doctors.email', 'ask_doctors.subject', 'ask_doctors.message', 'ask_doctors.reply')
            ->where('doctor_id', $doctor_id)
            ->get();
        return view('doctor.view_ask_question', compact('questions'));
    }

    public function doctor_reply_question($question_id)
    {
        $question = DB::table('ask_doctors')
            ->join('users', 'users.id', '=', 'ask_doctors.doctor_id')
            ->select('users.name AS doctor_name', 'ask_doctors.id', 'ask_doctors.name', 'ask_doctors.phone', 'ask_doctors.email', 'ask_doctors.subject', 'ask_doctors.message', 'ask_doctors.reply')
            ->where('ask_doctors.id', $question_id)->first();
        return view('doctor.doctor_reply_question', compact('question'));
    }

    public function doctor_doreply_question(Request $request, $question_id)
    {
        $id = Session::get('user.id');
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

        return redirect("/doctor/view_questions/$question->doctor_id");
    }

    public function doctor_view_booked_appointment()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $Month_start = date('Y-m-d', strtotime($startOfMonth));

        $endOfMonth = Carbon::now()->endOfMonth();
        $Month_end = date('Y-m-d', strtotime($endOfMonth));

        $now = now();
        $weekStartDate = $now->copy()->startOfWeek()->format('Y-m-d');
        $weekEndDate = $now->copy()->endOfWeek()->format('Y-m-d');

        $current_date = now()->format('Y-m-d');
        return view('doctor.doctor_view_booked_appointment', compact('weekStartDate', 'weekEndDate', 'Month_start', 'Month_end', 'current_date'));
    }

    public function doctor_view_current_month_booking($start_date, $end_date)
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
            ->where('appointment_schedules.doctor_id', '=', Session::get('user.id'))
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
        // dd($patient);
        return view('doctor.doctor_view_current_month', compact('data', 'patient'));
    }

    public function doctor_view_current_week_booking($start_date, $end_date)
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
            ->where('appointment_schedules.doctor_id', '=', Session::get('user.id'))
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

        return view('doctor.doctor_view_current_week', compact('data', 'patient'));
    }

    public function doctor_view_current_day_booking($date)
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
            ->where('appointment_schedules.doctor_id', '=', Session::get('user.id'))
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

        return view('doctor.doctor_view_current_day', compact('data', 'patient'));
    }

    public function doctor_book_appointment($slot_id)
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
        return view('doctor.doctor_booked_appointment', compact('patients', 'procedures', 'slot'));
    }

    public function doctor_booked_appintment(Request $request)
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
                'age' => $request->age,
                'dob' => $request->dob,
                'appointment_procedure' => $request->appointment_procedure,
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

    public function doctor_view_appointment_queries()
    {
        $doctor_id = Session::get('user')['id'];

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

        return view('doctor.doctor_view_appointment_queries', compact('bookings_combined'));
    }

    public function doctor_reply_appointment_query($booking_id, Request $request)
    {
      
            $doctor_id = Session::get('user')['id'];
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

            return view('doctor.doctor_reply_appointment_query', compact('bookings_combined'));
       
    }

    public function doctor_doreply_appointment_query(Request $request, $booking_id)
    {
        $doctor_id = Session::get('user')['id'];

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
            ->where('doctor.id', $doctor_id)
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
            ->where('booked_appointments.doctor_id', $doctor_id)
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

        $bookings_combined = $bookings_slots->concat($bookings_session);

        foreach ($bookings_combined as $booking) {
            $email = $booking->patient_email;
        }

        Mail::to($email)->send(new Reply_Queries($bookings_combined));

        return redirect('/doctor/view_appointment_queries');
    }

    public function doctor_view_change_appointment_request()
    {
        $doctor_id = Session::get('user.id');
        $all_request = DB::table('change_requests')
            ->select(
                'booked_appointments.booking_id',
                'patient.name as patient_name',
                'change_requests.from_date',
                'change_requests.to_date',
                'change_requests.reason',
                'change_requests.id',
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

        return view('doctor.doctor_view_change_appointment_request', compact('all_request'));
    }

    public function doctor_change_appointment_details($change_request_id)
    {
        $doctor_id = Session::get('user.id');
        $details = DB::table('change_requests')
            ->select(
                'booked_appointments.booking_id',
                'booked_appointments.mode',
                'patient.name as patient_name',
                'patient_profiles.phone as patient_phone',
                'doctor.name as doctor_name',
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

        return view('doctor.doctor_change_appointment_details', compact('details'));
    }

    public function doctor_change_appointment_date($booking_id)
    {
        $details = DB::table('change_requests')
            ->select(
                'booked_appointments.booking_id',
                'booked_appointments.mode',
                'patient.name as patient_name',
                'patient_profiles.phone as patient_phone',
                'doctor.name as doctor_name',
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

        return view('doctor.doctor_change_appointment_date', compact('details'));
    }

    public function doctor_change_date($booking_id, Request $request)
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

        return redirect("/doctor/change_appointment_mail/$booking_id");
    }

    public function change_appointment_mail($booking_id)
    {
        $details = DB::table('booked_appointments')
            ->select(
                'booked_appointments.booking_id',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'doctor.name as doctor_name',
                'patient.name as patient_name',
                'patient.email as patient_email',
                'patient_profiles.phone as patient_phone',
                'appointment_schedules.schedule_date',
                'booked_appointments.mode'
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
        }

        Mail::to($email)->send(new ChangeAppointment($details));

        DB::table('change_requests')
            ->where('booking_id', $booking_id)
            ->update([
                'status' => 2,
            ]);

        dd("Email is Sent.");
    }

    public function doctor_avaliable_dates($doctor_id)
    {
        $unavailableDates = AppointmentSchedule::where('doctor_id', $doctor_id)
            ->pluck('schedule_date')
            ->toArray();

        $formattedDates = array_map(function ($date) {
            return date('d-m-Y', strtotime($date));
        }, $unavailableDates);

        return response()->json(['dates' => $formattedDates]);
    }

    public function view_appointment_cancellation_request()
    {
        $doctor_id = Session::get('user.id');
        $all_request = DB::table('cancellation_requests')
            ->select(
                'booked_appointments.booking_id',
                'patient.name as patient_name',
                'cancellation_requests.reason',
                'cancellation_requests.id',
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

        return view('doctor.doctor_view_appointment_cancellation_request', compact('all_request'));
    }

    public function doctor_appointment_cancellation_mail($booking_id)
    {
        $details = DB::table('booked_appointments')
            ->select(
                'booked_appointments.booking_id',
                'appointment_slots.start_time',
                'appointment_slots.end_time',
                'doctor.name as doctor_name',
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
        dd("Email is Sent.");
    }

    public function doctor_add_social_links($doctor_id)
    {
        return view('doctor.doctor_add_socials', compact('doctor_id'));
    }

    public function doctor_doadd_social_links(Request $request)
    {
        DB::table('socials')->insert([
            'doctor_id' => $request->doctor_id,
            'twitter' => $request->twitter,
            'whatsapp' => $request->whatsapp,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'is_show' => $request->is_show,
        ]);
        return redirect("/doctor/view_social_links/$request->doctor_id");
    }

    public function doctor_view_social_links($doctor_id)
    {
        $social = DB::table('socials')->where('doctor_id', $doctor_id)->first();
        return view('doctor.doctor_view_socials', compact('social'));
    }

    public function doctor_set_timing($doctor_id)
    {
        return view('doctor.doctor_set_timing', compact('doctor_id'));
    }

    public function doctor_add_set_timing(Request $request)
    {
        $doctor_id = $request->doctor_id;
        $monday_from = date('H:i:s', strtotime($request->monday_from_hours . ':' . $request->monday_from_minutes));
        $monday_to = date('H:i:s', strtotime($request->monday_to_hours . ':' . $request->monday_to_minutes));
        $tuesday_from = date('H:i:s', strtotime($request->tuesday_from_hours . ':' . $request->tuesday_from_minutes));
        $tuesday_to = date('H:i:s', strtotime($request->tuesday_to_hours . ':' . $request->tuesday_to_minutes));
        $wednesday_from = date('H:i:s', strtotime($request->wednesday_from_hours . ':' . $request->wednesday_from_minutes));
        $wednesday_to = date('H:i:s', strtotime($request->wednesday_to_hours . ':' . $request->wednesday_to_minutes));
        $thursday_from = date('H:i:s', strtotime($request->thursday_from_hours . ':' . $request->thursday_from_minutes));
        $thursday_to = date('H:i:s', strtotime($request->thursday_to_hours . ':' . $request->thursday_to_minutes));
        $friday_from = date('H:i:s', strtotime($request->friday_from_hours . ':' . $request->friday_from_minutes));
        $friday_to = date('H:i:s', strtotime($request->friday_to_hours . ':' . $request->friday_to_minutes));
        $saturday_from = date('H:i:s', strtotime($request->saturday_from_hours . ':' . $request->saturday_from_minutes));
        $saturday_to = date('H:i:s', strtotime($request->saturday_to_hours . ':' . $request->saturday_to_minutes));
        $sunday_from = date('H:i:s', strtotime($request->sunday_from_hours . ':' . $request->sunday_from_minutes));
        $sunday_to = date('H:i:s', strtotime($request->sunday_to_hours . ':' . $request->sunday_to_minutes));

        $result = DB::table('set_timings')->insert([
            'doctor_id' => $doctor_id,
            'monday_from' => $monday_from,
            'monday_to' => $monday_to,
            'tuesday_from' => $tuesday_from,
            'tuesday_to' => $tuesday_to,
            'wednesday_from' => $wednesday_from,
            'wednesday_to' => $wednesday_to,
            'thursday_from' => $thursday_from,
            'thursday_to' => $thursday_to,
            'friday_from' => $friday_from,
            'friday_to' => $friday_to,
            'saturday_from' => $saturday_from,
            'saturday_to' => $saturday_to,
            'sunday_from' => $sunday_from,
            'sunday_to' => $sunday_to,
        ]);
        return redirect("doctor/view_profile/$doctor_id");
    }

    public function doctor_edit_profile($doctor_id)
    {
        $specialities = DB::table('specialities')->get();
        $languages = DB::table('languages')->get();
        $doctors = Doctor::with('user_role', 'doctor_specaility.specialities_list', 'doctor_language.languages_list')->where('doctorID', $doctor_id)->get();
        return view('doctor.doctor_edit_profile', compact('specialities', 'languages', 'doctors'));
    }

    public function doctor_doedit_profile(Request $request, $doctor_id)
    {
        $name = $request->name;
        $email = $request->email;
        $gender = $request->gender;
        $specialities = $request->speciality_id ?? [];
        $language = $request->language_id ?? [];
        $phone1 = $request->phone1;
        $ext1 = $request->ext1;
        $phone2 = $request->phone2;
        $ext2 = $request->ext2;
        $address = $request->address;
        $education = $request->education;
        $bio = $request->bio;
        $edu = $request->edu;
        $sp = $request->sp;
        $rp = $request->rp;
        $pm = $request->pm;

        DB::table('users')
            ->where('id', $doctor_id)
            ->update([
                'name' => $name,
                'email' => $email,
            ]);

        if ($request->hasFile('profile_image')) {
            $profile_image = time() . '.' . $request->file('profile_image')->extension();
            $request->file('profile_image')->move(public_path('profile_image'), $profile_image);
            DB::table('doctors')
                ->where('doctorID', $doctor_id)
                ->update([
                    'doctorID' => $doctor_id,
                    'gender' => $gender,
                    'phone1' => $phone1,
                    'ext1' => $ext1,
                    'phone2' => $phone2,
                    'ext2' => $ext2,
                    'address' => $address,
                    'education' => $education,
                    'biographical_sketch' => $bio,
                    'education_fellowship' => $edu,
                    'speciality_interests' => $sp,
                    'research_publications' => $rp,
                    'professional_memberships' => $pm,
                    'profile_image' => $profile_image,
                ]);
        } else {
            DB::table('doctors')
                ->where('doctorID', $doctor_id)
                ->update([
                    'doctorID' => $doctor_id,
                    'gender' => $gender,
                    'phone1' => $phone1,
                    'ext1' => $ext1,
                    'phone2' => $phone2,
                    'ext2' => $ext2,
                    'address' => $address,
                    'education' => $education,
                    'biographical_sketch' => $bio,
                    'education_fellowship' => $edu,
                    'speciality_interests' => $sp,
                    'research_publications' => $rp,
                    'professional_memberships' => $pm,
                ]);
        }

        $datalang = [];
        $datasp = [];

        if ($language) {
            foreach ($language as $language_id) {
                $datalang[] = [
                    'doctor_id' => $doctor_id,
                    'language_id' => $language_id,
                ];
            }
        }

        if ($specialities) {
            foreach ($specialities as $speciality_id) {
                $datasp[] = [
                    'doctor_id' => $doctor_id,
                    'speciality_id' => $speciality_id,
                ];
            }
        }

        DB::table('doctor_languages')
            ->where('doctor_id', $doctor_id)
            ->delete();

        if ($datalang) {
            DB::table('doctor_languages')->insert($datalang);
        }

        DB::table('doctor_specialities')
            ->where('doctor_id', $doctor_id)
            ->delete();

        if ($datasp) {
            DB::table('doctor_specialities')->insert($datasp);
        }

        return redirect("/doctor/view_profile/$doctor_id");
    }

    public function doctor_enable_slot($doctor_id)
    {
        DB::table('doctors')->where('doctorID', $doctor_id)->update([
            'enable_slots' => 1
        ]);
        return redirect()->back();
    }

    public function doctor_disable_slot($doctor_id)
    {
        DB::table('doctors')->where('doctorID', $doctor_id)->update([
            'enable_slots' => 0
        ]);
        return redirect()->back();
    }
}
