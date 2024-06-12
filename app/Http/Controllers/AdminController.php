<?php

namespace App\Http\Controllers;

use App\Mail\answer;
use App\Mail\AppointmentChange;
use App\Mail\AppointmentConfirm;
use App\Mail\Reply_Queries;
use App\Models\AppointmentSchedule;
use App\Models\AppointmentSlot;
use App\Models\AskDoctor;
use App\Models\Asset_request;
use App\Models\AssignDoctorToNurse;
use App\Models\AssignRights;
use App\Models\BookedAppointment;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Doctor;
use App\Models\DoctorSpeciality;
use App\Models\Invertory_manufacturer;
use App\Models\Invertory_supplier;
use App\Models\InvertoryCategory;
use App\Models\Invertoryitem;
use App\Models\Investigation;
use App\Models\Laborder;
use App\Models\Medication;
use App\Models\PatientInvoice;
use App\Models\PatientProfile;
use App\Models\Procedure;
use App\Models\Radiology;
use App\Models\Right;
use App\Models\RoleAssign;
use App\Models\Roles;
use App\Models\User;
use App\Models\Session as AppointmentSession;
use App\Models\Stock_adjustment;
use App\Models\Sublaborder;
use App\Models\Treatment;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\Foreach_;
use Termwind\Components\Raw;

class AdminController extends Controller
{
    public function admin_home()
    {
        $doctor = DB::table('users')->where('role_type', 3)->get();
        $nurse = DB::table('users')->where('role_type', 4)->get();
        $allied_health = DB::table('users')->where('role_type', 5)->get();
        $non_clinical = DB::table('users')->where('role_type', 6)->get();
        $patient = DB::table('users')->where('role_type', 10)->get();
        $speciality = DB::table('specialities')->get();
        return view('admin.admin_home', compact('doctor', 'nurse', 'allied_health', 'non_clinical', 'patient', 'speciality'));
    }

    public function admin_add_doctor()
    {
        $specialities = DB::table('specialities')->get();
        $languages = DB::table('languages')->get();
        return view('admin.admin_add_doctor', compact('specialities', 'languages'));
    }

    public function admin_doadd_doctor(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
            'gender' => 'required',
            'speciality_id' => 'required',
            'language_id' => 'required',
            'phone1' => 'required',
            'ext1' => 'required',
            'phone2' => 'required',
            'ext2' => 'required',
            'address' => 'required',
            'education' => 'required',
            'bio' => 'required',
            'edu' => 'required',
            'sp' => 'required',
            'rp' => 'required',
            'pm' => 'required',
            'profile_image' => 'required|mimes:jpg,png,jpeg'
        ]);
        // dd($request);
        $name =  $request->name;
        $email = $request->email;
        $password = $request->password;
        $gender = $request->gender;
        $specialities = $request->speciality_id;
        $language = $request->language_id;
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
        $profile_image = time() . '.' . $request->profile_image->extension();
        $request->profile_image->move(public_path('profile_image'), $profile_image);

        $doctor_id = DB::table('users')->insertGetId([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role_type' => 3,
        ]);

        DB::table('doctors')->insertGetId([
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
        DB::table('doctor_languages')->insert($datalang);
        DB::table('doctor_specialities')->insert($datasp);
        return redirect('/admin/view_doctor');
    }

    public function admin_view_doctor()
    {
        $doctors = DB::table('doctors')->join('users', 'doctors.doctorID', '=', 'users.id')->get();
        return view('admin.admin_view_doctor', compact('doctors'));
    }

    public function admin_edit_doctor($doctor_id)
    {
        $doctor = DB::table('doctors')->join('users', 'doctors.doctorID', '=', 'users.id')->where('doctorID', $doctor_id)->first();
        $timing = DB::table('set_timings')->where('doctor_id', $doctor_id)->first();
        $social = DB::table('socials')->where('doctor_id', $doctor_id)->first();
        $speciality = DB::table('doctor_specialities')
            ->join('specialities', 'specialities.id', '=', 'doctor_specialities.speciality_id')
            ->where('doctor_id', $doctor_id)->get();
        return view('admin.admin_edit_doctor', compact('doctor', 'timing', 'social', 'speciality'));
    }

    public function admin_add_service()
    {
        return view('admin.admin_add_service');
    }

    public function admin_doadd_service(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'service_image' => 'required|mimes:png,jpg,jpeg',
        ]);
        $service_image = time() . '.' . $request->service_image->extension();
        $request->service_image->move(public_path('service_image'), $service_image);

        DB::table('specialities')->insert([
            'speciality' => $request->name,
            'description' => $request->desc,
            'image' => $service_image
        ]);

        return redirect('/admin/view_service');
    }

    public function admin_view_service()
    {
        $speciality = DB::table('specialities')->get();
        return view('admin.admin_view_service', compact('speciality'));
    }

    public function assign_speciality_todoctor($doctor_id)
    {
        $specialities = DB::table('specialities')->get();
        $check = DoctorSpeciality::where('doctor_id', $doctor_id)->get();
        return view('admin.admin_assign_speciality', compact('doctor_id', 'specialities', 'check'));
    }

    public function doassign_speciality_todoctor(Request $request)
    {
        DB::table('doctor_specialities')->where('doctor_id', $request->doctor_id)->delete();
        foreach ($request->speciality as $speciality) {
            DB::table('doctor_specialities')
                ->insert([
                    'doctor_id' => $request->doctor_id,
                    'speciality_id' => $speciality
                ]);
        }
        return back();
    }

    public function admin_add_visiting_card($doctor_id)
    {
        return view('admin.admin_add_visiting_card', compact('doctor_id'));
    }

    public function admin_doadd_visiting_card(Request $request)
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

        return redirect("/admin/view_visiting_card/$doctor_id");
    }

    public function admin_view_visiting_card($doctor_id)
    {
        $card = DB::table('visiting_cards')->where('doctor_id', $doctor_id)->first();
        return view('admin.admin_view_visiting_card', compact('card'));
    }

    public function admin_add_social_links($doctor_id)
    {
        return view('admin.admin_add_socials', compact('doctor_id'));
    }

    public function admin_doadd_social_links(Request $request)
    {

        DB::table('socials')->insert([
            'doctor_id' => $request->doctor_id,
            'twitter' => $request->twitter,
            'whatsapp' => $request->whatsapp,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'is_show' => $request->is_show,
        ]);
        return redirect("/admin/view_social_links/$request->doctor_id");
    }

    public function admin_view_social_links($doctor_id)
    {
        $social = DB::table('socials')->where('doctor_id', $doctor_id)->first();
        return view('admin.admin_view_socials', compact('social'));
    }

    public function admin_set_timing($doctor_id)
    {
        return view('admin.admin_set_timing', compact('doctor_id'));
    }

    public function admin_add_set_timing(Request $request)
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
        return back();
    }

    public function admin_ask_doctor($doctor_id)
    {
        return view('admin.admin_ask_doctor', compact('doctor_id'));
    }

    public function admin_submit_question(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required'
        ]);

        DB::table('ask_doctors')->insert([
            'doctor_id' => $request->doctor_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        return redirect('/admin/view_all_question');
    }

    public function admin_view_all_question()
    {
        $question = DB::table('ask_doctors')
            ->join('users', 'users.id', '=', 'ask_doctors.doctor_id')
            ->select('users.name AS doctor_name', 'ask_doctors.name', 'ask_doctors.phone', 'ask_doctors.email', 'ask_doctors.subject', 'ask_doctors.message', 'ask_doctors.id', 'ask_doctors.reply')
            ->get();
        return view('admin.admin_view_all_question', compact('question'));
    }

    public function admin_reply_question($question_id)
    {
        $question = DB::table('ask_doctors')
            ->join('users as doctor', 'doctor.id', '=', 'ask_doctors.doctor_id')
            ->select('doctor.name as doctor_name', 'ask_doctors.name', 'ask_doctors.phone', 'ask_doctors.email', 'ask_doctors.subject', 'ask_doctors.message', 'ask_doctors.id')
            ->where('ask_doctors.id', $question_id)
            ->first();
        // dd($question);
        return view('admin.admin_reply_question', compact('question'));
    }

    public function admin_answer_question(Request $request, $question_id)
    {
        $request->validate([
            'reply' => 'required',
        ]);
        DB::table('ask_doctors')->where('id', $question_id)->update([
            'reply' => $request->reply,
        ]);
        $email =  DB::table('ask_doctors')
            ->select('doctor.name as doctor_name', 'ask_doctors.name', 'ask_doctors.phone', 'ask_doctors.email', 'ask_doctors.reply', 'ask_doctors.subject', 'ask_doctors.message', 'ask_doctors.id')
            ->join('users as doctor', 'doctor.id', '=', 'ask_doctors.doctor_id')
            ->where('ask_doctors.id', $question_id)
            ->first();

        Mail::to($email->email)->send(new answer($email));

        return redirect('/admin/view_all_question');
    }
    public function admin_doadd_language(Request $request)
    {
        $request->validate([
            'language' => 'required'
        ]);
        DB::table('languages')->insert([
            'language' => $request->language,
        ]);

        return redirect('/admin/view_languages');
    }

    public function admin_view_languages()
    {
        $language = DB::table('languages')->get();
        return view('admin.admin_view_language', compact('language'));
    }

    public function view_all_users()
    {
        $users = DB::table('patient_profiles')->get();
        return view('admin.admin_view_all_users', compact('users'));
    }

    public function admin_add_staff()
    {
        $roles = DB::table('roles')->get();
        return view('admin.admin_add_staff', compact('roles'));
    }

    public function admin_doadd_staff(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'role_type' => 'required|max:255',
            'password' => 'required',
        ]);
        $add = new User();
        $add->name = $request->name;
        $add->email = $request->email;
        $add->role_type = $request->role_type;
        $add->password = Hash::make($request->password);
        $add->save();
        return redirect('/admin/view_staff');
    }

    public function admin_view_staff()
    {
        $miniadmin = DB::table('users')->where('role_type', 2)->get();
        $doctor = DB::table('users')->where('role_type', 3)->get();
        $nurse = DB::table('users')->where('role_type', 4)->get();
        $allied_health = DB::table('users')->where('role_type', 5)->get();
        $non_clinical = DB::table('users')->where('role_type', 6)->get();
        $gp = DB::table('users')->where('role_type', 7)->get();
        $clinical_assistant = DB::table('users')->where('role_type', 9)->get();

        return view('admin.admin_view_staff', compact('miniadmin', 'doctor', 'nurse', 'allied_health', 'non_clinical', 'gp',  'clinical_assistant'));
    }

    public function admin_assign_roles($user_id)
    {
        $roles = DB::table('roles')->get();
        $user = DB::table('users')->where('id', $user_id)->first();
        return view('admin.admin_assign_roles', compact('roles', 'user'));
    }

    public function admin_doassign_roles()
    {
        echo "hi";
        exit;
    }

    public function admin_assign_doctor_to_nurse($nurse_id)
    {
        $doctors = DB::table('users')->where('role_type', 3)->get();

        $check_assign = User::with('assign_doctor_to_nurse')->where('id', $nurse_id)->get();

        return view('admin.admin_assign_doctor_to_nurse', compact('doctors', 'check_assign', 'nurse_id'));
    }

    public function admin_doassign_doctor_to_nurse(Request $request)
    {
        $request->validate([
            'nurse_id' => 'required',
            'doctor_id' => 'required',
        ], [
            'doctor_id' => 'Please Select Doctor'
        ]);
        DB::table('assign_doctor_to_nurses')->where('nurse_id', $request->nurse_id)->delete();
        $doctor_ids = $request->doctor_id;
        foreach ($doctor_ids as $doctor_id) {
            $add = new AssignDoctorToNurse();
            $add->nurse_id = $request->nurse_id;
            $add->doctor_id = $doctor_id;
            $add->save();
        }
        Session::flash('message', 'Assign Doctor Successfully');
        return back();
    }

    public function admin_add_branch()
    {
        return view('admin.admin_add_branch');
    }

    public function admin_doadd_branch(Request $request)
    {
        $request->validate([
            'branch_name' => 'required'
        ]);
        $add = new Branch();
        $add->branch_name = $request->branch_name;
        $add->status = 1;
        $add->save();
        Session::put('success', 'Branch Add Successfully');
        return redirect('/admin/view_branches');
    }

    public function admin_view_branches()
    {
        $branches = Branch::where('status', 1)->get();
        return view('admin.admin_view_branches', compact('branches'));
    }

    public function admin_delete_branch($branch_id)
    {
        $update = Branch::find($branch_id);
        $update->status = 0;
        $update->save();

        return redirect("/admin/view_branches");
    }

    public function admin_add_session()
    {
        return view('admin.admin_add_session');
    }

    public function admin_doadd_session(Request $request)
    {
        $request->validate([
            'session_name' => 'required',
        ]);

        $add = new AppointmentSession();

        if ($request->start_time == null && $request->end_time == null) {
            $add->session_name = $request->session_name;
            $add->status = 1;
        } else {
            $startdateObject = date('h:i A', strtotime($request->start_time));
            $enddateObject = date('h:i A', strtotime($request->end_time));
            $add->session_name = $request->session_name;
            $add->start_time = $startdateObject;
            $add->end_time =  $enddateObject;
            $add->status = 1;
        }
        $add->save();
        return redirect("/admin/view_sessions");
    }

    public function admin_view_sessions()
    {
        $sessions = AppointmentSession::where('status', 1)->get();
        return view('admin.admin_view_session', compact('sessions'));
    }

    public function admin_delete_session($session_id)
    {
        $update = AppointmentSession::find($session_id);
        $update->status = 0;
        $update->save();

        return redirect("/admin/view_sessions");
    }

    public function admin_view_appointment_queries()
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
            ->get();

        $bookings_combined = $bookings_slots->concat($bookings_session);
        dd($bookings_combined);

        return view('admin.admin_view_appointment_queries', compact('bookings_combined'));
    }


    // public function admin_view_appointment_queries()
    // {
    //     $queries = DB::table('booked_appointments')
    //         ->leftJoin('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
    //         ->where('booked_appointments.status', 1)
    //         ->get();

    //     $array = [];

    //     foreach ($queries as $list) {
    //         $array2 = [];
    //         $array2['patient_id'] = $list->patient_id;
    //         $array2['booking_id'] = $list->booking_id;
    //         $array2['patient_name'] = $list->name;
    //         $array2['patient_email'] = $list->email;
    //         $array2['book_patient_name'] = $list->patient_name;
    //         $array2['book_patient_email'] = $list->patient_email;
    //         $array2['appointment_reason'] = $list->appointment_reason;
    //         $array2['reply'] = $list->reply;
    //         $array2['session'] = $list->session;
    //         if ($list->session == null) {
    //             $slot_id = $list->slot_id;
    //             $chek = DB::table('appointment_slots')->where('slot_id', $slot_id)
    //                 ->select(
    //                     'appointment_slots.start_time',
    //                     'appointment_slots.end_time',
    //                     'appointment_schedules.schedule_date',
    //                     'appointment_schedules.doctor_id'
    //                 )
    //                 ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
    //                 ->first();
    //             $array2['start_time'] = $chek->start_time;
    //             $array2['end_time'] = $chek->end_time;
    //             $array2['schedule_date'] = $chek->schedule_date;
    //             $array2['doctor_id'] = $chek->doctor_id;
    //         } else {
    //             $array2['doctor_id'] = $list->doctor_id;
    //         }
    //         $array[] = $array2;
    //     }
    //     return view('admin.admin_view_appointment_queries', compact('array'));
    // }

    public function admin_reply_appointment_query($doctor_id, $booking_id)
    {
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

        return view('admin.admin_reply_appointment_query', compact('bookings_combined', 'doctor_id'));
    }

    // public function admin_reply_appointment_query($doctor_id, $booking_id)
    // {
    //     $queries = DB::table('booked_appointments')
    //         ->leftJoin('users as patient', 'patient.id', '=', 'booked_appointments.patient_id')
    //         ->where('booked_appointments.status', 1)
    //         ->where('booked_appointments.booking_id', $booking_id)
    //         ->get();

    //     $array = [];

    //     foreach ($queries as $list) {
    //         $array2 = [];
    //         $array2['patient_id'] = $list->patient_id;
    //         $array2['booking_id'] = $list->booking_id;
    //         $array2['patient_name'] = $list->name;
    //         $array2['patient_email'] = $list->email;
    //         $array2['book_patient_name'] = $list->patient_name;
    //         $array2['book_patient_email'] = $list->patient_email;
    //         $array2['appointment_reason'] = $list->appointment_reason;
    //         $array2['reply'] = $list->reply;
    //         $array2['session'] = $list->session;
    //         if ($list->session == null) {
    //             $slot_id = $list->slot_id;
    //             $chek = DB::table('appointment_slots')->where('slot_id', $slot_id)
    //                 ->select(
    //                     'appointment_slots.start_time',
    //                     'appointment_slots.end_time',
    //                     'appointment_schedules.schedule_date',
    //                     'appointment_schedules.doctor_id'
    //                 )
    //                 ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
    //                 ->first();
    //             $array2['start_time'] = $chek->start_time;
    //             $array2['end_time'] = $chek->end_time;
    //             $array2['schedule_date'] = $chek->schedule_date;
    //             $array2['doctor_id'] = $chek->doctor_id;
    //         } else {
    //             $array2['doctor_id'] = $list->doctor_id;
    //         }
    //         $array[] = $array2;
    //     }

    //     return view('admin.admin_reply_appointment_query', compact('array', 'doctor_id'));
    // }

    public function admin_doreply_appointment_query(Request $request, $booking_id)
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

        return redirect('/admin/view_appointment_queries');
    }


    public function admin_set_doctor_schedule()
    {
        $doctors = DB::table('users')->where('role_type', 3)->get();
        return view('admin.admin_set_schedule', compact('doctors'));
    }

    public function admin_add_schedule_slots(Request $request)
    {
        $doctor_id = $request->doctor_id;
        $count = $request->count;
        $date1 = $request->date1;
        $date2 = $request->date2;

        $data = ['doctor_id' => $doctor_id, 'count' => $count, 'date1' => $date1, 'date2' => $date2];
        return view('admin.admin_add_schedule', compact('data'));
    }

    public function admin_doadd_schedule_slots(Request $request)
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
            //     Session::put('message', 'Month already exists in the database!');
            //     return redirect()->back();
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
                // }
            }
        }
        return redirect("/admin/view_schedule/$current_month/$current_year/$doctor_id")->with('message', 'Slots added successfully!');
    }

    public function admin_select_doctor()
    {
        $doctors = Doctor::with(['user_role' => function ($qurey) {
            $qurey->where('role_type', 3);
        }])->get();

        return view('admin.admin_select_doctor', compact('doctors'));
    }

    public function admin_view_schedule($month, $year, $doctor_id)
    {
        $schedule = DB::table('appointment_schedules')
            ->join('users', 'appointment_schedules.doctor_id', '=', 'users.id')
            ->where('appointment_schedules.doctor_id', $doctor_id)
            ->select('appointment_schedules.doctor_id', 'appointment_schedules.id', 'appointment_schedules.start_time', 'appointment_schedules.end_time', 'appointment_schedules.schedule_date')
            ->whereRaw("DATE_FORMAT(appointment_schedules.schedule_date, '%Y-%m') = ?", ["$year-$month"])
            ->get();

        $enable_slot = DB::table('doctors')->where('doctorID', $doctor_id)->first();

        return view('admin.admin_view_schedule', compact('schedule', 'month', 'year', 'doctor_id', 'enable_slot'));
    }

    public function admin_view_patients()
    {

        //$patient = DB::table('users')->select('users.id', 'users.name', 'users.email', 'patient_profiles.*')->join('patient_profiles', 'patient_profiles.patient_id', '=', 'users.id')->where('users.role_type', 10)->get();


        $patient = User::with('patient')->where('role_type', 10)->get();



        return view('admin.admin_view_patient', compact('patient'));
    }
    public function admin_view_patients_info($id)
    {


        $user = DB::table('users')->where('id', $id)->first();
        $patient_profiles = DB::table('patient_profiles')->where('patient_id', $id)->first();
        return view('admin.admin_view_patient_history', compact('user', 'patient_profiles'));
    }
    public function admin_add_health_record($id)
    {
        $Treatment = DB::table('treatments')->get();

        $procedures = DB::table('procedures')->get();

        $medications = DB::table('medications')->get();
        $patient = DB::table('users')->find($id);

        $radiologys = DB::table('radiologys')->get();

        $laborders = DB::table('laborders')->get();
        return view('admin.admin_add_health_record', compact('procedures', 'Treatment', 'medications', 'radiologys', 'patient', 'laborders'));
    }
    public function laborder_search(Request $request)
    {
        $sublaborders = DB::table('sublaborders')->where('laborder_id', $request->laborder)->get();
        if (count($sublaborders) > 0) {
            foreach ($sublaborders as $list) {
                echo "<option value='$list->id'>";
                echo $list->name;
                echo "</option>";
            }
        } else {
            echo "<option>";
            echo "No Record";
            echo "</option>";
        }
    }
    public function treatment()
    {
        $Treatment = DB::table('treatments')->get();

        return view('admin.admin_treatment', compact('Treatment'));
    }

    public function admin_treatment_record(Request $request)
    {
        if ($request->treatment_id == "select option") {
            return response()->json(['message' => 'Success', 'tooth_number' => "", 'rate' => ""]);
        } else {
            $Treatment = DB::table('treatments')->where('id', $request->treatment_id)->first();



            $patient_invoices_checked = DB::table('patient_invoices')->where('attempted_id', $request->id)->first();





            if ($patient_invoices_checked) {

                $data = [
                    'amount' => $Treatment->rate,
                    'treatment_id' => $request->treatment_id,
                ];

                $patient_invoices = DB::table('patient_invoices')->where('attempted_id', $request->id)->update($data);
            } else {

                $PatientInvoice = new PatientInvoice();
                $PatientInvoice->patient_id = 9;
                $PatientInvoice->treatment_id = $request->treatment_id;
                $PatientInvoice->amount = $Treatment->rate;
                $PatientInvoice->attempted_id = $request->id;
                $PatientInvoice->status = 1;
                $PatientInvoice->save();
            }
        }
        $sum = PatientInvoice::where('patient_id', 9)->sum('amount');


        return response()->json(
            ['message' => 'Success', 'treatment_name' => $Treatment->treatments_name, 'rate' => $Treatment->rate, 'total_amount' => $sum],
        );
    }
    public function admin_treatment_deleted()
    {
        $patient_invoices = DB::table('patient_invoices')->where('status', 2)->first();
        if (!$patient_invoices) {
            DB::table('patient_invoices')->delete();
        }

        $sum = PatientInvoice::where('patient_id', 9)->sum('amount');


        return response()->json(
            ['total_amount' => $sum],
        );
    }

    public function admin_treatment_single_deleted(Request $request)
    {
        DB::table('patient_invoices')->where('attempted_id', $request->remove_id)->delete();
        $sum = PatientInvoice::where('patient_id', 9)->sum('amount');
        return response()->json(
            ['total_amount' => $sum, 'deleted' => 1],
        );
    }

    public function final_search(Request $request)
    {
        $id = $request->id;
        $patient = DB::table('users')->where('id', $id)->first();

        echo $patient->name;
    }

    public function rate_amount(Request $request)
    {
        $get_rate = $request->get_rate;
        $treatment_id = $request->treatment_id;

        DB::table('patient_invoices')->where('attempted_id', $treatment_id)->update([
            'amount' => $get_rate,
        ]);
        $sum = PatientInvoice::where('patient_id', 9)->sum('amount');

        return response()->json(
            ['success' => true, 'rate_amount' => $get_rate, 'sum' => $sum,],
        );
    }
    public function total_amount(Request $request)
    {
        $sum = PatientInvoice::where('patient_id', 9)->sum('amount');
        echo  $sum;
    }
    public function quantity(Request $request)
    {
        $get_quantity = $request->get_quantity;
        $treatment_id = $request->treatment_id;
        $patient_id = $request->patient_id;

        DB::table('patient_invoices')->where('attempted_id', $treatment_id)->update([
            'quantity' => $get_quantity,
        ]);
        // $sum = PatientInvoice::where('patient_id', 9)->sum('amount');
        $sum = PatientInvoice::where('patient_id', $patient_id)->sum('amount');
        // dd($sum);
        $total_amount = $sum * $get_quantity;

        return response()->json(
            ['success' => true, 'rate_amount' => $get_quantity, 'sum' => $total_amount,],
        );
    }

    public function amount_discount(Request $request)
    {
        $get_discount = $request->get_discount;
        $treatment_id = $request->treatment_id;
        $sum = PatientInvoice::where('patient_id', 9)->sum('amount');

        $total_amount = $sum - $get_discount;

        DB::table('patient_invoices')->where('attempted_id', $treatment_id)->update([
            'discount' => $get_discount,
            'amount' => $total_amount,
        ]);


        return response()->json(
            ['success' => true, 'rate_amount' => $get_discount, 'sum' => $total_amount,],
        );
    }

    public function invoice_post(Request $request)
    {
        dd($request);
        $procedureIds = $request->procedure;
        $rates = $request->rate;
        $quantities = $request->quantity;
        $discounts = $request->discount;
        //dd($request->all());

        $dataToInsert = [];

        foreach ($procedureIds as $key => $procedureId) {
            $dataToInsert[] = [
                'patient_id' => $request->patient_id,
                'treatment_id' => $procedureId,
                'amount' => $rates[$key] * $quantities[$key],
                'quantity' => $quantities[$key],
                'discount' => $discounts[$key],
                'attempted_id' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        $insertionStatus = PatientInvoice::insert($dataToInsert);

        if ($insertionStatus) {

            return redirect('admin/home');
        } else {
            return redirect()->back()->with('error', 'Data insertion failed');
        }
    }

    public function add_treatment()
    {

        return view('admin.admin_add_treatment');
    }
    public function add_treatment_post(Request $request)
    {
        if (isset($_POST['update'])) {


            $id = $request->id;
            $data = [
                'treatments_name' => $request->treatment_name,
                'tooth_number' => $request->tooth_number,
                'rate' => $request->rate,
            ];

            $Treatment = DB::table('treatments')->where('id', $id)->update($data);
        } else {


            $Treatment = new Treatment();
            $Treatment->treatments_name = $request->treatment_name;
            $Treatment->tooth_number = $request->tooth_number;
            $Treatment->rate = $request->rate;
            $Treatment->status = 1;

            $Treatment->save();
        }

        return redirect('admin/treatment');
    }
    public function edit_treatment($id)
    {
        $Treatment = DB::table('treatments')->find($id);

        return view('admin.admin_edit_treatment', compact('Treatment'));
    }
    public function deleted_treatment($id)
    {
        $Treatment = DB::table('treatments')->where('id', $id)->delete();

        return back();
    }
    public function procedure()
    {
        $procedures = DB::table('procedures')->get();
        return view('admin.admin_procedure', compact('procedures'));
    }
    public function add_procedure()
    {


        return view('admin.admin_add_procedure');
    }
    public function add_procedure_post(Request $request)
    {

        if (isset($_POST['procedures'])) {
            $id = $request->id;
            $data = [


                'name' => $request->name,

            ];
            DB::table('procedures')->where('id', $id)->update($data);
        } else {


            $Procedure = new Procedure();
            $Procedure->name = $request->name;
            $Procedure->status = 1;
            $Procedure->save();
        }
        return redirect('admin/procedure');
    }
    public function edit_procedure($id)
    {
        $procedures = DB::table('procedures')->where('id', $id)->first();

        return view('admin.admin_edit_procedure', compact('procedures'));
    }
    public function deleted_procedure($id)
    {
        DB::table('procedures')->where('id', $id)->delete();

        return back();
    }
    public function medication()
    {

        $medications = DB::table('medications')->get();

        return view('admin.admin_medication', compact('medications'));
    }

    public function add_medication()
    {
        // return view('admin.admin_add_procedure');
        return view('admin.admin_add_medication');
    }

    public function add_radiology()
    {
        return view('admin.admin_add_radiology');
    }

    public function add_radiology_post(Request $request)
    {

        if (isset($_POST['radiologys'])) {
            $data = [
                'name' => $request->name,
            ];
            DB::table('radiologys')->where('id', $request->id)->update($data);
        } else {


            $Radiology = new Radiology();
            $Radiology->name = $request->name;
            $Radiology->status = 1;
            $Radiology->save();
        }
        return redirect('admin/radiology');
    }

    public function deleted_radiology($id)
    {
        DB::table('radiologys')->where('id', $id)->delete();
        return back();
    }

    public function investigation()
    {
        $investigation = DB::table('investigations')->get();

        return view('admin.admin_Investigation', compact('investigation'));
    }

    public function add_investigation()
    {
        return view('admin.admin_add_investigation');
    }

    public function add_investigation_post(Request $request)
    {
        if (isset($_POST['investigations'])) {
            $data = [
                'name' => $request->name,
            ];
            DB::table('investigations')->where('id', $request->id)->update($data);
        } else {


            $Investigation = new Investigation();
            $Investigation->name = $request->name;
            $Investigation->status = 1;
            $Investigation->save();
        }
        return redirect('/admin/investigation');
    }

    public function edit_investigation($id)
    {
        $investigations = DB::table('investigations')->find($id);
        return view('admin.admin_edit_investigation', compact('investigations'));
    }

    public function deleted_investigation($id)
    {
        $investigations = DB::table('investigations')->where('id', $id)->delete();
        return back();
    }

    public function edit_radiology($id)
    {
        $radiologys = DB::table('radiologys')->find($id);
        
        // return view('admin.admin_edit_medication', compact('radiologys'));
        return view('admin.admin_edit_radiology', compact('radiologys'));
    }

    public function add_medication_post(Request $request)
    {
        if (isset($_POST['medications'])) {
            // add thi yasir
            $id = $request->id;
            $data = [
                'name' => $request->name,
            ];
         
            // $medications = DB::table('medications')->where('id', $id)->update($data);
            // yasir update this line
            DB::table('medications')->where('id', $id)->update($data);
        } else {


            $Medication = new Medication();
            $Medication->name = $request->name;
            $Medication->status = 1;
            $Medication->save();
        }
        return redirect('admin/medication');
    }

    public function edit_medication($id)
    {
        $medications = DB::table('medications')->find($id);
        return view('admin.admin_edit_medication', compact('medications'));
    }

    public function deleted_medication($id)
    {
        DB::table('medications')->where('id', $id)->delete();
        return back();
    }



    public function radiology()
    {

        $radiologys = DB::table('radiologys')->get();


        return view('admin.admin_radiology', compact('radiologys'));
    }


    public function admin_view_slots($schedule_id, $month, $year, $doctor_id)
    {
        $slots = DB::table('appointment_schedules')
            ->join('appointment_slots', 'appointment_slots.schedule_id', '=', 'appointment_schedules.id')
            ->join('users', 'appointment_schedules.doctor_id', '=', 'users.id')
            ->where('appointment_slots.schedule_id', $schedule_id)
            ->where('appointment_schedules.doctor_id', $doctor_id)
            ->select('appointment_slots.slot_id AS slot_id', 'appointment_slots.start_time AS slot_start_time', 'appointment_slots.end_time AS slot_end_time', 'users.name AS doctor_name', 'appointment_slots.booking_id')
            ->get();

        return view('admin.admin_view_slots', compact('slots', 'schedule_id', 'month', 'year', 'doctor_id'));
    }

    public function admin_view_all_patients()
    {
        $response = Http::get('http://getphr.com/api/get_hospital_patient/6');

        if ($response->successful()) {
            $users = json_decode($response->body());

            $userData = [];

            foreach ($users as $list) {
                $userData[] = [
                    'name' => $list->fullName,
                    'email' => $list->email,
                    'password' => $list->password,
                    'role_type' => 10,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if (!empty($userData)) {
                User::upsert($userData, ['email'], ['name', 'password', 'role_type', 'status']);
            }
        }
        $patients = User::where('role_type', 10)->get();



        //     $array1 = $patients->toArray();
        //         $array2 = json_decode(json_encode($users), true);
        // dd($array2);
        return view('admin.admin_view_patients', compact('patients', 'users'));
    }

    public function invoice()
    {
        // $procedures = DB::table('procedures')->get();
        $patients = User::where('role_type', '10')->get();

        // dd($patients->toArray());
        $Treatment = DB::table('treatments')->get();
        // dd($Treatment->toArray());
        return view('admin.admin_invoice', compact('patients', 'Treatment'));
    }

    public function add_invoice()
    {
        return view('admin.admin_add_investigation');
    }

    public function add_invoice_post(Request $request)
    {
        if (isset($_POST['investigations'])) {
            $data = [
                'name' => $request->name,
            ];
            DB::table('investigations')->where('id', $request->id)->update($data);
        } else {

            $Investigation = new Investigation();
            $Investigation->name = $request->name;
            $Investigation->status = 1;
            $Investigation->save();
        }
        return redirect('/admin/investigation');
    }

    public function edit_invoice($id)
    {
        $investigations = DB::table('investigations')->find($id);
        return view('admin.admin_edit_investigation', compact('investigations'));
    }

    public function deleted_invoice($id)
    {
        $investigations = DB::table('investigations')->where('id', $id)->delete();
        return back();
    }

    public function lab_order()
    {
        $laborders = DB::table('laborders')->get();
        return view('admin.admin_lab_order', compact('laborders'));
    }

    public function add_lab_order()
    {
        return view('admin.admin_add_lab_order');
    }

    public function add_lab_order_post(Request $request)
    {
        if (isset($_POST['laborders_update'])) {
            $data = [
                'name' => $request->name,
            ];
            DB::table('laborders')->where('id', $request->id)->update($data);
        } else {


            $Laborder = new Laborder();
            $Laborder->name = $request->name;
            $Laborder->status = 1;
            $Laborder->save();
        }
        return redirect('/admin/lab-order');
    }

    public function edit_lab_order($id)
    {
        $laborders = DB::table('laborders')->find($id);
        return view('admin.admin_edit_lab_order', compact('laborders'));
    }

    public function deleted_lab_order($id)
    {
        DB::table('laborders')->where('id', $id)->delete();
        return back();
    }

    public function lab_sub_order()
    {
        $sublaborders = Sublaborder::with('Laborder')->get();
        return view('admin.admin_lab_sub_order', compact('sublaborders'));
    }

    public function add_lab_sub_order()
    {
        $laborders = DB::table('laborders')->get();
        // dd($laborders->toArray());
        return view('admin.admin_add_lab_sub_order', compact('laborders'));
    }

    public function add_lab_sub_order_post(Request $request)
    {

        if (isset($_POST['sub_lab_order'])) {

            $inputString = $request->sub_laborder;
            $laborder_id = $request->laborder_id;

            DB::table('sublaborders')->where('id', $request->deleted_id)->update([
                'name' => $inputString,
                'laborder_id' => $laborder_id,
            ]);
        } else {

            $inputString = $request->sub_laborder;
            $laborder_id = $request->laborder_id;
            // Split the input string by comma (",")
            $termsArray = explode(", ", $inputString);
            foreach ($termsArray as $list) {
                DB::table('sublaborders')->insert([
                    'name' => $list,
                    'laborder_id' => $laborder_id,
                    'status' => 1,
                ]);
            }
        }
        return redirect('/admin/lab-sub-order');
    }

    public function edit_lab_sub_order($id)
    {
        $sublaborders = Sublaborder::with('Laborder')->where('id', $id)->first();
        $laborders = DB::table('laborders')->get();
        return view('admin.admin_edit_lab_sub_order', compact('sublaborders', 'laborders', 'id'));
    }

    public function deleted_lab_sub_order($id)
    {
        DB::table('sublaborders')->where('id', $id)->delete();
        return back();
    }



    public function item_list()
    {

        $invertoryitems = DB::table('invertoryitems')->get();
        return view('admin.admin_item_list', compact('invertoryitems'));
    }

    public function add_item()
    {
        $invertory_manufacturers = DB::table('invertory_manufacturers')->get();
        $invertory_suppliers = DB::table('invertory_suppliers')->get();
        $category = DB::table('categorys')->get();
        // dd($laborders->toArray());
        return view('admin.admin_add_item', compact('invertory_manufacturers', 'invertory_suppliers', 'category'));
    }

    public function add_list_post(Request $request)
    {

        if (isset($_POST['invertoryitems'])) {

            $name = $request->name;
            $id = $request->id;

            DB::table('invertoryitems')->where('id', $id)->update([
                'name' => $name,

            ]);
        } else {
            $name = $request->name;
            $Invertoryitem = new Invertoryitem();
            $Invertoryitem->name = $name;
            $Invertoryitem->status = 1;
            $Invertoryitem->save();
        }
        return redirect('/admin/item-list');
    }

    public function edit_list($id)
    {

        $invertoryitems = DB::table('invertoryitems')->find($id);
        return view('admin.admin_edit_list', compact('invertoryitems', 'id'));
    }


    public function deleted_list($id)
    {
        DB::table('invertoryitems')->where('id', $id)->delete();
        return back();
    }


    public function manufacturer_list()
    {

        $invertorymanufacturers = DB::table('invertory_manufacturers')->get();
        return view('admin.admin_manufacturer_list', compact('invertorymanufacturers'));
    }
    public function add_manufacturer()
    {
        $laborders = DB::table('laborders')->get();
        // dd($laborders->toArray());
        return view('admin.admin_add_manufacturer', compact('laborders'));
    }
    public function add_manufacturer_post(Request $request)
    {

        if (isset($_POST['invertorymanufacturers'])) {

            $name = $request->name;
            $id = $request->id;

            DB::table('invertory_manufacturers')->where('id', $id)->update([
                'name' => $name,

            ]);
        } else {


            $name = $request->name;
            $Invertory_manufacturer = new Invertory_manufacturer();
            $Invertory_manufacturer->name = $name;
            $Invertory_manufacturer->status = 1;
            $Invertory_manufacturer->save();
        }
        return redirect('/admin/manufacturer-list');
    }

    public function edit_manufacturer($id)
    {

        $invertorymanufacturers = DB::table('invertory_manufacturers')->find($id);
        return view('admin.admin_edit_manufacturer', compact('invertorymanufacturers', 'id'));
    }
    public function deleted_manufacturer($id)
    {
        DB::table('invertory_manufacturers')->where('id', $id)->delete();
        return back();
    }


    public function suppliers_list()
    {

        $invertory_suppliers = DB::table('invertory_suppliers')->get();
        return view('admin.admin_suppliers_list', compact('invertory_suppliers'));
    }
    public function add_suppliers()
    {
        $laborders = DB::table('laborders')->get();
        // dd($laborders->toArray());
        return view('admin.admin_add_suppliers', compact('laborders'));
    }
    public function add_suppliers_post(Request $request)
    {

        if (isset($_POST['invertory_suppliers'])) {

            $name = $request->name;
            $id = $request->id;

            DB::table('invertory_suppliers')->where('id', $id)->update([
                'name' => $name,

            ]);
        } else {


            $name = $request->name;
            $Invertory_supplier = new Invertory_supplier();
            $Invertory_supplier->name = $name;
            $Invertory_supplier->status = 1;
            $Invertory_supplier->save();
        }
        return redirect('/admin/suppliers-list');
    }

    public function edit_suppliers($id)
    {

        $invertory_suppliers = DB::table('invertory_suppliers')->find($id);
        return view('admin.admin_edit_suppliers', compact('invertory_suppliers', 'id'));
    }

    public function deleted_suppliers($id)
    {
        DB::table('invertory_suppliers')->where('id', $id)->delete();
        return back();
    }

    public function category_list()
    {
        $categorys = DB::table('categorys')->get();
        return view('admin.admin_category_list', compact('categorys'));
    }

    public function add_category()
    {

        return view('admin.admin_inventory_add_category');
    }

    public function add_category_post(Request $request)
    {

        if (isset($_POST['inventory_categorys'])) {

            $name = $request->name;
            $id = $request->id;

            DB::table('categorys')->where('id', $id)->update([
                'name' => $name,

            ]);
        } else {


            $name = $request->name;
            $InvertoryCategory = new InvertoryCategory();
            $InvertoryCategory->name = $name;
            $InvertoryCategory->status = 1;
            $InvertoryCategory->save();
        }
        return redirect('/admin/category-list');
    }

    public function edit_category($id)
    {

        $categorys = DB::table('categorys')->find($id);
        return view('admin.admin_edit_category', compact('categorys', 'id'));
    }

    public function deleted_category($id)
    {
        DB::table('categorys')->where('id', $id)->delete();
        return back();
    }


    public function admin_add_rights()
    {
        $roles = Roles::whereIn('roles', ['Patient', 'Nurse', 'Doctor'])->get();
        return view('admin.admin_add_rights', compact('roles'));
    }

    public function admin_doadd_rights(Request $request)
    {
        $request->validate([
            'rights' => 'required',
            'role_id' => 'required'
        ]);
        if ($request->role_id === 'all') {
            $roles = Roles::whereIn('roles', ['Patient', 'Nurse', 'Doctor'])->get();
            $add = new Right();
            $add->rights_name = $request->rights;
            $add->status = 1;
            $add->save();
            $right_id = $add->id;
            foreach ($roles as $role) {
                $add_right = new RoleAssign();
                $add_right->role_id = $role->id;
                $add_right->rights_id = $right_id;
                $add_right->save();
            }
        } else {
            $add = new Right();
            $add->rights_name = $request->rights;
            $add->status = 1;
            $add->save();
            $right_id = $add->id;
            $add_right = new RoleAssign();
            $add_right->role_id = $request->role_id;
            $add_right->rights_id = $right_id;
            $add_right->save();
        }
        return redirect('/admin/view_rights');
    }

    public function admin_view_rights()
    {
        $rights = DB::table('rights')
            ->select(
                'rights.id as right_id',
                'rights.rights_name',
                'role_assigns.role_id',
                'roles.roles'
            )
            ->join('role_assigns', 'role_assigns.rights_id', '=', 'rights.id')
            ->join('roles', 'roles.id', '=', 'role_assigns.role_id')
            ->where('rights.status', 1)
            ->get();
        return view('admin.admin_view_rights', compact('rights'));
    }

    public function admin_delete_rights($rights_id)
    {
        $update = Right::find($rights_id);
        $update->status = 0;
        $update->save();
        return redirect('/admin/view_rights');
    }

    public function admin_assign_rights($user_id, $role_id)
    {
        $check_user = DB::table('users')->where('id', $user_id)->first();
        $RoleAssign = RoleAssign::with('role_rights')->where('role_id', $role_id)->get();
        $check_assign_right = AssignRights::where('user_id', $user_id)->get();

        return view('admin.admin_assign_rights', compact('RoleAssign', 'user_id', 'check_assign_right', 'check_user'));
    }

    public function admin_doassign_rights(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'role_assign_id' => 'required|array'
        ]);
        DB::table('assign_rights')->where('user_id', $request->user_id)->delete();

        $user_id = $request->user_id;
        $role_assign_ids = $request->role_assign_id;

        foreach ($role_assign_ids as $role_assign_id) {
            $add = new AssignRights();
            $add->user_id = $user_id;
            $add->role_assign_id = $role_assign_id;
            $add->save();
        }
        return back();
    }

    public function admin_book_appointment($slot_id, $doctor_id)
    {
        $patients = DB::table('users')->where('role_type', 10)->get();
        $procedures = DB::table('procedures')->get();
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
        return view('admin.admin_book_appointment', compact('patients', 'slot', 'procedures'));
    }

    public function admin_booked_appintment(Request $request)
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

    public function admin_change_schedule_date($schedule_id, $month, $year, $doctor_id)
    {
        $slots = DB::table('appointment_schedules')
            ->join('appointment_slots', 'appointment_slots.schedule_id', '=', 'appointment_schedules.id')
            ->join('users', 'appointment_schedules.doctor_id', '=', 'users.id')
            ->where('appointment_slots.schedule_id', $schedule_id)
            ->where('appointment_schedules.doctor_id', $doctor_id)
            ->select('appointment_schedules.id', 'appointment_slots.slot_id AS slot_id', 'appointment_slots.start_time AS slot_start_time', 'appointment_slots.end_time AS slot_end_time', 'users.name AS doctor_name', 'appointment_slots.booking_id')
            ->get();

        $patient = DB::table('appointment_slots')
            ->join('booked_appointments', 'booked_appointments.booking_id', '=', 'appointment_slots.booking_id')
            ->get();

        return view('admin.admin_change_schedule_date', compact('slots', 'doctor_id', 'patient'));
    }

    public function admin_transfer_appointment_to_another_date(Request $request, $doctor_id)
    {
        $schedule_date = $request->schedule_date;

        $slot_id_array = $request->slot_id;

        $booking_id_array = $request->booking_id;

        $change_appointment_schedule = DB::table('appointment_schedules')
            ->join('appointment_slots', 'appointment_slots.schedule_id', '=', 'appointment_schedules.id')
            ->where('appointment_schedules.schedule_date', $schedule_date)
            ->where('appointment_schedules.doctor_id', $doctor_id)
            ->where('appointment_slots.booking_id', null)
            ->get();

        foreach ($change_appointment_schedule as $list) {
            $schedule_id =  $list->id;
        }
        DB::table('change_appointments')
            ->insert([
                'old_schedule_id' => $request->old_schedule_id,
                'reason' => $request->reason,
                'new_schedule_id' => $schedule_id
            ]);

        foreach ($slot_id_array as $slot_id_list) {
            DB::table('appointment_slots')->where('slot_id', $slot_id_list)->update(['booking_id' => null]);
        }

        $set_booking = DB::table('booked_appointments')->whereIn('slot_id', $slot_id_array)->get();


        $set_bookings_id = array();
        foreach ($set_booking as $set_bookings) {
            $set_bookings_id[] = $set_bookings->booking_id;
        }

        $booked_appointments = array();
        foreach ($change_appointment_schedule as $update_schedule) {
            $booked_appointments[] = $update_schedule->slot_id;
        }

        $array1 = $set_bookings_id;
        $array2 = $booked_appointments;
        $result = [];

        for ($i = 0; $i < count($array1); $i++) {
            $data = [
                'booking_id' => $array1[$i],
            ];

            $data2 = [
                'slot_id' => $array2[$i],
            ];
            DB::table('appointment_slots')->where('slot_id', $array2[$i])->update($data);
            DB::table('booked_appointments')->where('booking_id', $array1[$i])->update($data2);

            $show_details_slots = DB::table('booked_appointments')
                ->select(
                    'booked_appointments.booking_id',
                    'patient_profiles.patient_name',
                    'patient_profiles.patient_email',
                    'patient_profiles.patient_phone',
                    'appointment_slots.start_time',
                    'appointment_slots.end_time',
                    'doctor.name as doctor_name',
                    'appointment_schedules.schedule_date',
                    'booked_appointments.mode',
                    'change_appointments.reason'
                )
                ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
                ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
                ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
                ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
                ->join('change_appointments', 'change_appointments.new_schedule_id', '=', 'appointment_schedules.id')
                ->where('booked_appointments.booking_id', $array1[$i])
                ->whereNotNull('booked_appointments.slot_id')
                ->get();

            foreach ($show_details_slots as $list) {
                $email = $list->patient_email;
                Mail::to($email)->send(new AppointmentChange($show_details_slots));
            }
        }
    }

    public function admin_check_date_availability(Request $request)
    {
        $availableDates = AppointmentSchedule::pluck('schedule_date')
            ->where('doctor_id', $request->doctor_ids)
            ->toArray();

        $formattedDates = array_map(function ($date) {
            return date('d-m-Y', strtotime($date));
        }, $availableDates);

        return response()->json(['dates' => $formattedDates]);
    }

    public function admin_search_patient(Request $request)
    {
        $search = $request->input('search');
        // dd($search);
        // $patients = PatientProfile::where(function ($query) use ($search) {
        //     $query->where('patient_name', 'LIKE', '%' . $search . '%')
        //         ->orWhere('patient_email', 'LIKE', '%' . $search . '%')
        //         ->orWhere('mrn', 'LIKE', '%' . $search . '%');
        // })->get();
        $patients = User::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%');
        })->get();

        echo '<div class="display_show">';
        foreach ($patients as $patient) {
            // dd($patient);
            // echo "<div onclick='patient_details($patient->patient_id)'>" . $patient->patient_name . "</div>";
            echo "<div onclick='patient_details($patient->id)'>" . $patient->name . "</div>";
        }
        echo '<div>';
    }

    public function admin_patient_details(Request $request)
    {
        // $show = PatientProfile::where('patient_id', $request->patient_id)->first();
        // $show = User::where('id', $request->patient_id)->first();
        $patient_id = $request->input('patient_id');
        
        // dd($patient_id);
        // Use the patient_id to fetch patient details
        $show = User::where('id', $patient_id)->first();
        $email = $show->email;
        $name = $show->name;
        $patient_id = $show->id;
        // $phone = $show->patient_phone;
        // $age = $show->age;
        // $dob = $show->dob;
        // if ($age == null) {
        //     $age = "";
        // }
        // if ($dob == null) {
        //     $dob = "";
        // }
        return response()->json(
            // ['success' => true, 'email' => $email, 'name' => $name, 'phone' => $phone, 'age' => $age, 'dob' => $dob]
            ['success' => true, 'email' => $email, 'name' => $name, 'patient_id' => $patient_id]
        );
    }

    public function admin_enable_slot($doctor_id)
    {
        DB::table('doctors')->where('doctorID', $doctor_id)->update([
            'enable_slots' => 1
        ]);
        return redirect()->back();
    }

    public function admin_disable_slot($doctor_id)
    {
        DB::table('doctors')->where('doctorID', $doctor_id)->update([
            'enable_slots' => 0
        ]);
        return redirect()->back();
    }

    public function admin_patient_report()
    {
        $patients = DB::table('patient_profiles')->paginate(10);
        return view('admin.admin_view_patients_report', compact('patients'));
    }

    public function admin_view_patient_details($patient_id)
    {
        $patient = DB::table('patient_profiles')->where('patient_id', $patient_id)->first();
        return view('admin.admin_view_patient_details', compact('patient'));
    }

    public function admin_appointment_report()
    {
        $doctors = DB::table('users')->where('role_type', 3)->get();
        $procedures = DB::table('procedures')->where('status', 1)->get();
        return view('admin.admin_appointment_report', compact('doctors', 'procedures'));
    }

    public function admin_doctor_appointment_search(Request $request)
    {
        $bookings_slots = DB::table('booked_appointments')
            ->select([
                'appointment_schedules.doctor_id'
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('doctor.id', $request->doctor_id)
            ->get();

        $bookings_session = DB::table('booked_appointments')
            ->select([
                'booked_appointments.doctor_id',
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('sessions', 'sessions.id', '=', 'booked_appointments.session')
            ->join('users as doctor', 'doctor.id', '=', 'booked_appointments.doctor_id')
            ->where('doctor.id', $request->doctor_id)
            ->get();

        $bookings_combined = $bookings_slots->concat($bookings_session);
        $total_appointment = count($bookings_combined);
        return response()->json($total_appointment);
    }

    public function admin_doctor_procedure_search(Request $request)
    {
        $bookings_slots = DB::table('booked_appointments')
            ->select([
                'appointment_schedules.doctor_id',
                'booked_appointments.appointment_procedure'
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('booked_appointments.appointment_procedure', $request->procedure_id)
            ->get();

        $bookings_session = DB::table('booked_appointments')
            ->select([
                'booked_appointments.doctor_id',
                'booked_appointments.appointment_procedure'
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('sessions', 'sessions.id', '=', 'booked_appointments.session')
            ->join('users as doctor', 'doctor.id', '=', 'booked_appointments.doctor_id')
            ->where('booked_appointments.appointment_procedure', $request->procedure_id)
            ->get();

        $bookings_combined = $bookings_slots->concat($bookings_session);
        $total_appointment = count($bookings_combined);
        return response()->json($total_appointment);
    }

    public function admin_doctor_appointment_procedure_search(Request $request)
    {
        $bookings_slots = DB::table('booked_appointments')
            ->select([
                'appointment_schedules.doctor_id',
                'booked_appointments.appointment_procedure'
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('appointment_slots', 'appointment_slots.slot_id', '=', 'booked_appointments.slot_id')
            ->join('appointment_schedules', 'appointment_schedules.id', '=', 'appointment_slots.schedule_id')
            ->join('users as doctor', 'doctor.id', '=', 'appointment_schedules.doctor_id')
            ->where('doctor.id', $request->doctor_id)
            ->where('booked_appointments.appointment_procedure', $request->procedure_id)
            ->get();

        $bookings_session = DB::table('booked_appointments')
            ->select([
                'booked_appointments.doctor_id',
                'booked_appointments.appointment_procedure'
            ])
            ->join('patient_profiles', 'patient_profiles.patient_id', '=', 'booked_appointments.patient_id')
            ->join('sessions', 'sessions.id', '=', 'booked_appointments.session')
            ->join('users as doctor', 'doctor.id', '=', 'booked_appointments.doctor_id')
            ->where('doctor.id', $request->doctor_id)
            ->where('booked_appointments.appointment_procedure', $request->procedure_id)
            ->get();

        $bookings_combined = $bookings_slots->concat($bookings_session);
        $total_appointment = count($bookings_combined);
        return response()->json($total_appointment);
    }

    public function manage_stock_list()
    {
        // What should be done in this  section ??????

        dd("Abdul Testing...");
    }
}
