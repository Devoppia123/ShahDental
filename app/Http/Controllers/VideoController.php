<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class VideoController extends Controller
{

    public function __construct()
    {
        $doctor_id = Session::get('user')['id'];
        $counter = DB::table('ask_doctors')->where('read_status', 0)->where('doctor_id', $doctor_id)->select(DB::raw('count(*) as questions'))->first();
        View::share(['counter' => $counter]);
    }

    public function admin_add_videos()
    {
        $speciality = DB::table('specialities')->get();
        return view('admin.admin_add_videos', compact('speciality'));
    }

    public function admin_doadd_videos(Request $request)
    {
        // $request->validate([
        //     'video_by' => 'required',
        //     'title' => 'required',
        //     'link' => 'required',
        //     'description' => 'required',
        //     'speciality_id' => 'required',
        // ]);

        DB::table('videos')->insert([
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->description,
            'speciality_id' => $request->speciality,
            'is_compulsory' => $request->is_compulsory,
        ]);
        return redirect('/admin/view_videos');
    }

    public function admin_view_videos()
    {
        $videos = DB::table('videos')
            ->join('specialities', 'specialities.id', '=', 'videos.speciality_id')
            ->select('specialities.speciality', 'videos.title', 'videos.link', 'videos.description', 'videos.is_compulsory', 'videos.id')
            ->where('videos.status', 1)
            ->get();
        $specialities = DB::table('specialities')->get();
        return view('admin.admin_view_videos', compact('videos', 'specialities'));
    }

    public function admin_edit_video($video_id)
    {
        $edit_video = DB::table('videos')
            ->select(
                'videos.speciality_id',
                'videos.id as video_id',
                'videos.speciality_id',
                'videos.title',
                'videos.description',
                'videos.link',
                'videos.is_compulsory'
            )
            ->join('specialities', 'specialities.id', '=', 'videos.speciality_id')
            ->where('videos.id', $video_id)
            ->first();

        $specialities = DB::table('specialities')->get();

        return view('admin.admin_edit_video', compact('edit_video', 'specialities'));
    }

    public function admin_update_video(Request $request)
    {
        DB::table('videos')
            ->where('id', $request->video_id)
            ->update([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
                'speciality_id' => $request->speciality,
                'is_compulsory' => $request->is_compulsory,
                'status' => 1
            ]);

        return redirect("/admin/view_videos");
    }

    public function admin_delete_video($video_id)
    {
        DB::table('videos')
            ->where('id', $video_id)
            ->update([
                'status' => 0
            ]);
        return redirect("/admin/view_videos");
    }

    // public function doctor_add_videos($doctor_id)
    // {
    //     $speciality = DB::table('specialities')->get();
    //     return view('doctor.doctor_add_video', compact('doctor_id', 'speciality'));
    // }

    // public function doctor_doadd_videos(Request $request)
    // {
    //     // $request->validate([
    //     //     'video_by' => 'required',
    //     //     'title' => 'required',
    //     //     'link' => 'required',
    //     //     'description' => 'required',
    //     //     'speciality_id' => 'required',
    //     // ]);

    //     DB::table('videos')->insert([
    //         'video_by' => $request->video_by,
    //         'title' => $request->title,
    //         'link' => $request->link,
    //         'description' => $request->description,
    //         'speciality_id' => $request->speciality,
    //         'is_compulsory' => $request->is_compulsory,
    //     ]);
    //     return redirect("/doctor/view_videos/$request->video_by");
    // }

    // public function doctor_view_videos($doctor_id)
    // {
    //     $videos = DB::table('videos')
    //         ->join('specialities', 'specialities.id', '=', 'videos.speciality_id')
    //         ->select('specialities.speciality', 'videos.title', 'videos.link', 'videos.description', 'videos.is_compulsory', 'videos.id')
    //         ->where('videos.status', 1)
    //         ->where('video_by', $doctor_id)
    //         ->get();
    //     $specialities = DB::table('specialities')->get();

    //     return view('doctor.doctor_view_videos', compact('videos', 'specialities'));
    // }

    // public function doctor_edit_video($video_id)
    // {
    //     $user_id = Session::get('user')['id'];
    //     $edit_video = DB::table('videos')
    //         ->select(
    //             'videos.speciality_id',
    //             'videos.id as video_id',
    //             'videos.video_by',
    //             'videos.speciality_id',
    //             'videos.title',
    //             'videos.description',
    //             'videos.link',
    //             'videos.is_compulsory'
    //         )
    //         ->join('specialities', 'specialities.id', '=', 'videos.speciality_id')
    //         ->where('videos.id', $video_id)
    //         ->where('video_by', $user_id)
    //         ->first();

    //     $specialities = DB::table('specialities')->get();

    //     return view('doctor.doctor_edit_video', compact('edit_video', 'specialities'));
    // }

    // public function doctor_update_video(Request $request)
    // {
    //     $user_id = Session::get('user')['id'];

    //     DB::table('videos')
    //         ->where('id', $request->video_id)
    //         ->update([
    //             'video_by' => $request->video_by,
    //             'title' => $request->title,
    //             'link' => $request->link,
    //             'description' => $request->description,
    //             'speciality_id' => $request->speciality,
    //             'is_compulsory' => $request->is_compulsory,
    //             'status' => 1
    //         ]);

    //     return redirect("/doctor/view_videos/$user_id");
    // }

    // public function doctor_delete_video($video_id)
    // {
    //     $user_id = Session::get('user')['id'];
    //     DB::table('videos')
    //         ->where('id', $video_id)
    //         ->where('video_by', $user_id)
    //         ->update([
    //             'status' => 0
    //         ]);
    //     return redirect("/doctor/view_videos/$user_id");
    // }
}
