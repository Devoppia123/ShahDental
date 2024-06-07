<?php

namespace App\Http\Controllers;

use App\Models\AppointmentSchedule;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\AppointmentConfirm;
use App\Models\Articles;
use App\Models\BookedAppointment;
use App\Models\Branch;
use App\Models\CallBack;
use App\Models\Category;
use App\Models\PatientProfile;
use App\Models\User;
use Carbon\Carbon;
// use App\Traits\Avaliable_dates;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    // use Avaliable_dates;

    public function home()
    {
        // $doctors = Doctor::with('user_role', 'doctor_specaility.specialities_list', 'doctor_language.languages_list')
        // ->inRandomOrder()
        // ->take(4);
        $doctors = Doctor::with('user_role', 'doctor_specaility.specialities_list', 'doctor_language.languages_list')
            ->take(4)
            ->inRandomOrder()
            ->get();

        $specialities = DB::table('specialities')
            ->take(8)
            ->orderBy('id', 'desc')
            ->get();

        $articles = DB::table('articles')
            ->join('specialities', 'articles.speciality_id', '=', 'specialities.id')
            ->where('articles.status', 1)
            ->select('articles.*', 'specialities.speciality')
            ->limit(3)
            ->orderBy('id', 'desc')
            ->get();

        return view('index', compact('doctors', 'specialities', 'articles'));
    }

    public function our_mission()
    {
        return view('our_mission');
    }

    public function message()
    {
        return view('message');
    }

    public function highlights()
    {
        return view('highlights');
    }

    public function all_articles()
    {
        // $articles =  DB::table('articles')->where('status', 1)->get();
        $articles =  DB::table('articles')->where('status', 1)->paginate(4);
        // return view('wordpress.all_articles', compact('articles'));
        return view('all_articles', compact('articles'));
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function services_treatments()
    {
        return view('services_treatments');
    }

    public function contact_us()
    {
        // return view('wordpress.contactus');
        return view('contact_us');
    }

    // public function docontactus(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'phone' => 'required',
    //         'subject' => 'required',
    //         'message' => 'required'
    //     ]);
    //     DB::table("ask_doctors")->insert([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'phone' => $request->phone,
    //         'subject' => $request->subject,
    //         'message' => $request->message,
    //         'read_status' => 0
    //     ]);
    //     // return redirect("http://www.essamtalks.com/shah-dental/");
    //     return redirect()->back();
    // }

    public function docontactus(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'phone' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        if ($validator->passes()) {
            // If validation passes, proceed to insert data into the database
            DB::table("ask_doctors")->insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
                'read_status' => 0
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Message sent successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }


    public function make_an_appointment(Request $request)
    {
        $branches = Branch::where('status', 1)->get();
        $procedures = DB::table('procedures')->where('status', 1)->get();
        $doctors = Doctor::with('user_role', 'doctor_specaility.specialities_list', 'doctor_language.languages_list')->get();
        // return view('wordpress.make_an_appointment', compact('branches'));
        // return view('make_an_appointment', compact('branches'));

        // $date = Carbon::createFromFormat('d-m-Y', $request->dateas)->format('Y-m-d');
        // $check_slots = DB::table('doctors')
        //     ->join('appointment_schedules', 'appointment_schedules.doctor_id', '=', 'doctors.doctorID')
        //     ->where('doctors.doctorID', $doctor_id)
        //     ->where('appointment_schedules.schedule_date', $date)
        //     ->first();

        // if ($check_slots != null && $check_slots->enable_slots == 1) {
        //     $appointment = DB::table('appointment_schedules')
        //         ->join('appointment_slots', 'appointment_slots.schedule_id', '=', 'appointment_schedules.id')
        //         ->where('appointment_slots.booking_id', null)
        //         ->where('doctor_id', $doctor_id)
        //         ->where('appointment_schedules.schedule_date', $date)
        //         ->take(2)
        //         ->get();
        //     return response()->json($appointment);
        // } else {
        //     $appointment_session = DB::table('sessions')->where('status', 1)->get();
        //     return response()->json($appointment_session);
        // }


        return view('make_an_appointment', compact('branches', 'procedures', 'doctors'));
    }
    public function find_doctors()
    {
        $doctors = Doctor::with('user_role', 'doctor_specaility.specialities_list', 'doctor_language.languages_list')->get();
        // return view('wordpress.find_doctors', compact('doctors'));
        return view('find_doctors', compact('doctors'));
    }

    public function callback()
    {
        // return view('wordpress.callback');
        return view('callback');
    }

    // public function post_callback(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'phone' => 'required',
    //         'email' => 'required',
    //         'subject' => 'required',
    //         'message' => 'required'
    //     ]);
    //     $add = new CallBack();
    //     $add->name = $request->name;
    //     $add->phone = $request->phone;
    //     $add->email = $request->email;
    //     $add->subject = $request->subject;
    //     $add->message = $request->message;
    //     $add->save();
    //     return redirect('http://www.essamtalks.com/shah-dental/');
    // }
    public function post_callback(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:20',
            'phone' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        if ($validator->passes()) {
            // If validation passes, proceed to insert data into the database
            DB::table("call_backs")->insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Message sent successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function branch_directions()
    {
        // dd('yasir');
        return view('directions');
    }
    public function services()
    {
        $speciality = DB::table('specialities')->take(8)->get();
        return view('wordpress.services', compact('speciality'));
    }

    public function all_services()
    {
        $speciality = DB::table('specialities')->orderBy('id', 'desc')->get();
        // return view('wordpress.all_services', compact('speciality'));
        return view('all_services', compact('speciality'));
    }
    public function services_details($services_id)
    {
        $speciality = DB::table('specialities')->where('specialities.id', $services_id)->first();
        
        $articles = DB::table('articles')->where('speciality_id', $services_id)->where('articles.status', 1)
            ->take(3)
            ->orderBy('id', 'desc')
            ->get();
        $latest_article = DB::table('articles')->where('speciality_id', $services_id)->where('articles.status', 1)->orderBy('id', 'DESC')->take(1)->first();
        $videos = DB::table('videos')->where('speciality_id', $services_id)->take(6)->where('videos.status', 1)->orderBy('id', 'desc')->get();
        $doctor = Doctor::with('user_role', 'doctor_specaility.specialities_list', 'doctor_language.languages_list')
            ->whereHas('doctor_specaility', function ($query) use ($services_id) {
                $query->where('speciality_id', $services_id);
            })
            ->take(4)
            ->orderBy('doctorID', 'desc')
            ->get();

        // return view('wordpress.service_details', compact('speciality', 'doctor', 'articles', 'videos', 'latest_article'));
        return view('service_details', compact('speciality', 'doctor', 'articles', 'videos', 'latest_article'));
    }

    public function doctors()
    {
        $doctor = Doctor::with('user_role', 'doctor_specaility.specialities_list', 'doctor_language.languages_list')->take(4)->get();
        return view('wordpress.doctors', compact('doctor'));
    }

    public function doctor_profile($doctor_id)
    {
        $doctor = Doctor::with('user_role', 'doctor_specaility.specialities_list', 'doctor_language.languages_list')
            ->where('doctorID', $doctor_id)->get();

        // return view('wordpress.doctors_profile', compact('doctor'));
        return view('doctors_profile', compact('doctor'));
    }

    public function test($specaility_id)
    {
        $speciality = DB::table('specialities')
            ->join('doctor_specialities', 'doctor_specialities.speciality_id', '=', 'specialities.id')
            ->join('doctors', 'doctors.doctorID', '=', 'doctor_specialities.doctor_id')
            ->join('users', 'users.id', '=', 'doctors.doctorID')
            ->where('specialities.id', $specaility_id)
            ->get();

        $articles = DB::table('articles')->where('speciality_id', $specaility_id)->where('articles.status', 1)->get();
        $latest_articles = DB::table('articles')->where('speciality_id', $specaility_id)->where('articles.status', 1)->orderBy('id', 'DESC')->take(1)->get();
        $videos = DB::table('videos')->where('speciality_id', $specaility_id)->get();
        return view('wordpress.test', compact('speciality', 'articles', 'videos', 'latest_articles'));
    }

    public function ask_doctor($doctor_id)
    {
        $doctor = DB::table('users')->where('id', $doctor_id)->first();
        // return view('wordpress.ask_doctor', compact('doctor'));
        return view('ask_doctor', compact('doctor'));
    }

    public function submit_question(Request $request)
    {
        // $validatedData = $request->validate([
        //     'full_name' => 'required|max:255',
        //     'doctor_id' => 'required',
        //     'phone' => 'required|max:255',
        //     'email' => 'required|email|max:255',
        //     'subject' => 'required|max:255',
        //     'message' => 'required',
        // ]);
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255',
            'phone' => ['required', 'regex:/^\+?[0-9\s\-\(\)]{10,20}$/'],
            'email' => 'required|email|max:255',
            'subject' => ['required', Rule::in(['feedback', 'inquiry', 'general', 'complaint'])],
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        // dd($request);

        DB::table('ask_doctors')->insert([
            'doctor_id' => $request->doctor_id,
            'name' => $request->full_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // return redirect('/'); // Redirect to the homepage
        return response()->json(['success' => 'Your question has been submitted.']);

        // return redirect('/')->with('success', 'Your question has been submitted successfully!');
        // return response()->json(['errors' => $validator->errors()], 422);

        // return redirect("/doctor_profile/$request->doctor_id");
        // return response()->json(['success' => 'Your question has been submitted.']);
    }

    public function view_article($article_id)
    {
        $article = DB::table('articles')
            ->join('specialities', 'articles.speciality_id', '=', 'specialities.id')
            ->where('articles.id', $article_id)
            ->where('articles.status', 1)
            ->first();
        // return view('wordpress.article_detail', compact('article'));
        return view('article_detail', compact('article'));
    }

    public function view_video($video_id)
    {
        $video = DB::table('videos')
            ->join('specialities', 'videos.speciality_id', '=', 'specialities.id')
            ->where('videos.id', $video_id)
            ->where('videos.status', 1)
            ->first();
        // return view('wordpress.video_detail', compact('video'));
        return view('video_detail', compact('video'));
    }

    public function adviser()
    {
        $categories = Category::all();
        return view('wordpress.advisor', compact('categories'));
    }

    public function category($category_id)
    {
        $categories = Category::with(['Article' => function ($query) {
            $query->where('status', 1)
                ->with('User', 'Speciality');
        }])->where('id', $category_id)->get();
        $latest_articles = DB::table('articles')->where('category_id', $category_id)->where('articles.status', 1)->orderBy('id', 'DESC')->take(1)->get();
        return view('wordpress.category', compact('categories', 'latest_articles'));
    }

    public function get_appointment($doctor_id)
    {
        $doctor = DB::table('users')->where('id', $doctor_id)->first();
        $branches = Branch::where('status', 1)->get();
        $procedures = DB::table('procedures')->where('status', 1)->get();
        $check_enable_slots = DB::table('doctors')->where('doctors.doctorID', $doctor_id)->first();
        $check_slots = DB::table('doctors')
            ->join('appointment_schedules', 'appointment_schedules.doctor_id', '=', 'doctors.doctorID')
            ->where('doctors.doctorID', $doctor_id)
            ->first();
        // dd($doctor);
        $appointment_sessions = DB::table('sessions')->where('status', 1)->get();
        // return view('wordpress.book_appointment', compact('doctor', 'procedures', 'doctor_id', 'check_enable_slots', 'check_slots', 'appointment_sessions'));
        return view('book_appointment', compact('branches','doctor', 'procedures', 'doctor_id', 'check_enable_slots', 'check_slots', 'appointment_sessions'));
    }

    // use Avaliable_dates;
    // public function unavaliable_dates($doctor_id)
    // {
    //     $unavailableDates = $this->unavaliable_dates($doctor_id);
    //     return $unavailableDates;
    // }

    public function find_doctors_search(Request $request)
    {
        $search = $request->input('search');
        $gender = $request->input('gender');
        // gender = 0 = male
        // gender = 1 = female

        // $doctors = Doctor::with(['user_role', 'doctor_specaility.specialities_list'])
        // ->where(function ($query) use ($search) {
        //     $query->whereHas('user_role', function ($subQuery) use ($search) {
        //             $subQuery->where('name', 'LIKE', '%' . $search . '%');
        //         })->orWhereHas('doctor_specaility.specialities_list', function ($subQuery) use ($search) {
        //             $subQuery->where('speciality', 'LIKE', '%' . $search . '%');
        //         });
        //     })
        //     ->get();
        $doctors = Doctor::with(['user_role', 'doctor_specaility.specialities_list'])
            ->where(function ($query) use ($search) {
                $query->whereHas('user_role', function ($subQuery) use ($search) {
                    $subQuery->where('name', 'LIKE', '%' . $search . '%');
                })->orWhereHas('doctor_specaility.specialities_list', function ($subQuery) use ($search) {
                    $subQuery->where('speciality', 'LIKE', '%' . $search . '%');
                });
            })
            ->when($gender !== null, function ($query) use ($gender) {
                return $query->where('gender', $gender);
            })
            ->get();



        // dd($doctors->toArray());
        return response()->json($doctors);
    }

    public function show_slots($doctor_id, Request $request)
    {
        $date = Carbon::createFromFormat('d-m-Y', $request->dateas)->format('Y-m-d');

        $check_slots = DB::table('doctors')
            ->join('appointment_schedules', 'appointment_schedules.doctor_id', '=', 'doctors.doctorID')
            ->where('doctors.doctorID', $doctor_id)
            ->where('appointment_schedules.schedule_date', $date)
            ->first();

        if ($check_slots != null && $check_slots->enable_slots == 1) {
            $appointment = DB::table('appointment_schedules')
                ->join('appointment_slots', 'appointment_slots.schedule_id', '=', 'appointment_schedules.id')
                ->where('appointment_slots.booking_id', null)
                ->where('doctor_id', $doctor_id)
                ->where('appointment_schedules.schedule_date', $date)
                ->take(2)
                ->get();
            return response()->json($appointment);
        } else {
            $appointment_session = DB::table('sessions')->where('status', 1)->get();
            return response()->json($appointment_session);
        }
    }
    // public function make_an_appointment(Request $request)
    // {
    //     // Fetching necessary data
    //     $branches = Branch::where('status', 1)->get();
    //     $procedures = DB::table('procedures')->where('status', 1)->get();
    //     $doctors = Doctor::with('user_role', 'doctor_specaility.specialities_list', 'doctor_language.languages_list')->get();
    //     // Returning the view with necessary data
    //     return view('make_an_appointment', compact('branches', 'procedures', 'doctors'));
    // }

    public function booked_appointment_withoutlogin(Request $request)
    {
        // dd($request);
        // Adjusting the request data for validation
        $request->merge(['gender' => $request->input('male')]);

        // Define validation rules
        $validator = Validator::make($request->all(), [
            'patient_name' => 'required|string|max:255',
            'patient_email' => 'required|email|max:255',
            'patient_phone' => 'required|string|max:20',
            'gender' => 'required|in:1,0',  // Adjusted from 'male'
            'appointment_reason' => 'required|string',
            'mode' => 'required|in:At Clinic,Online',
            'doctor_id' => 'required|integer',
            'branch_id' => 'required_if:mode,At Clinic|integer',
            'get_number_identity' => 'required|numeric',
            'get_passport_number' => 'nullable|numeric',  // Adjusted to nullable
            'platform' => 'nullable|string',
            'passport_date' => 'nullable|date',  // Adjusted to nullable and valid date
            // 'id_number' => 'required_if:mode,Online|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
        if ($validator->passes()) {
            $random_string = substr(md5(uniqid(mt_rand(), true)), 0, 10);

            $patient_id = DB::table('patient_profiles')->insertGetId([
                'patient_name' => $request->patient_name,
                'patient_email' => $request->patient_email,
                'patient_phone' => $request->patient_phone,
                'mrn' => $random_string,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'age' => $request->age
            ]);

            if ($request->slot_id != null) {
                $booking_id = DB::table('booked_appointments')->insertGetId([
                    // 'slot_id' => $request->get_value,
                    'slot_id' => $request->slot_id,
                    'patient_id' => $patient_id,
                    'doctor_id' => $request->doctor_id,
                    'appointment_procedure' => $request->appointment_procedure,
                    'mode' => $request->mode,
                    'platform' => $request->platform,
                    'id_number' => $request->id_number,
                    'identity_no' => $request->get_number_identity,
                    'passport_date' => $request->check_value == 1 ? null : date("d/m/Y", strtotime($request->passport_date)),
                    'consultation_type' => $request->consultation_type,
                    'appointment_reason' => $request->appointment_reason,
                    'status' => 1,
                    'session' => $request->session_id,
                    'branch_id' => $request->branch_id
                ]);

                DB::table('appointment_slots')
                    ->where('slot_id', $request->slot_id)
                    ->update(['booking_id' => $booking_id]);
            } else {
                $booking_id = DB::table('booked_appointments')->insertGetId([
                    'session' => $request->session_id,
                    // 'slot_id' => $request->get_value,
                    'slot_id' => $request->slot_id,
                    'patient_id' => $patient_id,
                    'doctor_id' => $request->doctor_id,
                    'appointment_procedure' => $request->appointment_procedure,
                    'mode' => $request->mode,
                    'platform' => $request->platform,
                    'id_number' => $request->id_number,
                    'identity_no' => $request->get_number_identity,
                    'passport_date' => $request->check_value == 1 ? null : date("d/m/Y", strtotime($request->passport_date)),
                    'consultation_type' => $request->consultation_type,
                    'appointment_reason' => $request->appointment_reason,
                    'appointment_date' => $request->appointment_date,
                    'branch_id' => $request->branch_id,
                    'status' => 1
                ]);

                // return response()->json([
                //     'status' => true,
                //     'message' => 'Appointment booked successfully!',
                //     'Booking_id' => $booking_id
                // ]);
                return redirect()->to("appointment_instructions/{$booking_id}");
            }
        }

        // Proceed with appointment booking logic

    }

    public function appointment_instructions($booking_id)
    {
        $show_details = DB::table('booked_appointments')
            ->select(
                'booked_appointments.booking_id',
                'booked_appointments.slot_id',
                'doctor.name as doctor_name',
                'booked_appointments.mode',
                'patient_profiles.patient_name',
                'patient_profiles.patient_email',
                'patient_profiles.patient_phone',
                'sessions.session_name',
                'sessions.start_time',
                'sessions.end_time',
                'booked_appointments.appointment_date',
            )
            ->join('users as doctor', 'doctor.id', '=', 'booked_appointments.doctor_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('sessions', 'sessions.id', '=', 'booked_appointments.session')
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

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
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('booked_appointments.booking_id', $booking_id)
            ->whereNotNull('booked_appointments.slot_id')
            ->get();

        return view('wordpress.apppointment_instructions', compact('show_details', 'show_details_slots'));
    }

    public function appointment_mail($booking_id)
    {
        $details = DB::table('booked_appointments')
            ->select(
                'booked_appointments.slot_id',
                'booked_appointments.booking_id',
                'patient_profiles.patient_name',
                'patient_profiles.patient_email',
                'patient_profiles.patient_phone',
                'sessions.session_name',
                'sessions.start_time',
                'sessions.end_time',
                'booked_appointments.appointment_date',
                'doctor.name as doctor_name',
                'booked_appointments.mode'
            )
            ->join('users as doctor', 'doctor.id', '=', 'booked_appointments.doctor_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('sessions', 'sessions.id', '=', 'booked_appointments.session')
            ->where('booked_appointments.booking_id', $booking_id)
            ->get();

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
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
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

        return redirect('/thankyou');
    }

    public function find_doctor()
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

    public function thankyou()
    {
        return view('wordpress.thanks_page');
    }
    public function our_team()
    {
        return view('our_team');
    }
    // add yasir
    public function Site_map()
    {
        return view('site_map');
    }
}
