<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class ArticleController extends Controller
{

    public function __construct()
    {
        $doctor_id = Session::get('user')['id'];
        $counter = DB::table('ask_doctors')->where('read_status', 0)->where('doctor_id', $doctor_id)->select(DB::raw('count(*) as questions'))->first();
        View::share(['counter' => $counter]);
    }

    public function admin_add_articles()
    {
        $speciality = DB::table('specialities')->get();
        return view('admin.admin_add_articles', compact('speciality'));
    }

    public function admin_doadd_articles(Request $request)
    {
        $request->validate([
            'speciality' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
        ]);

        $article_image = time() . '.' . $request->image->extension();
        $request->image->move(public_path('articles'), $article_image);

        DB::table('articles')->insert([
            'speciality_id' => $request->speciality,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $article_image,
            'status' => 1
        ]);
        return redirect('/admin/view_articles');
    }

    public function admin_view_articles()
    {
        $article = DB::table('articles')
            ->select('specialities.speciality', 'articles.title', 'articles.status', 'articles.description', 'articles.image', 'articles.id')
            ->join('specialities', 'specialities.id', '=', 'articles.speciality_id')
            ->where('articles.status', 1)
            ->get();


        $specialities = DB::table('specialities')->get();
        return view('admin.admin_view_articles', compact('article', 'specialities'));
    }

    public function admin_view_full_article($article_id)
    {
        $article = DB::table('articles')
            ->select(
                'articles.id',
                'articles.image',
                'articles.title',
                'articles.description',
                'specialities.speciality',
            )
            ->join('specialities', 'specialities.id', '=', 'articles.speciality_id')
            ->where('articles.id', $article_id)
            ->where('articles.status', 1)
            ->first();

        return view('admin.admin_view_full_article', compact('article'));
    }

    public function admin_edit_article($article_id)
    {
        $edit_article = DB::table('articles')
            ->select(
                'articles.speciality_id',
                'articles.id as article_id',
                'articles.speciality_id',
                'articles.title',
                'articles.description',
            )
            ->join('specialities', 'specialities.id', '=', 'articles.speciality_id')
            ->where('articles.id', $article_id)
            ->first();

        $specialities = DB::table('specialities')->get();

        return view('admin.admin_edit_articles', compact('edit_article', 'specialities'));
    }

    public function admin_update_article(Request $request)
    {
        $request->validate([
            'article_id' => 'required',
        ]);

        if ($request->image) {
            $article_image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('articles'), $article_image);

            DB::table('articles')
                ->where('id', $request->article_id)
                ->update([
                    'title' => $request->title,
                    'speciality_id' => $request->speciality,
                    'description' => $request->description,
                    'image' => $article_image,
                    'status' => 1
                ]);
        } else {
            DB::table('articles')
                ->where('id', $request->article_id)
                ->update([
                    'title' => $request->title,
                    'speciality_id' => $request->speciality,
                    'description' => $request->description,
                    'status' => 1
                ]);
        }
        return redirect("/admin/view_articles");
    }

    public function admin_delete_article($article_id)
    {
        DB::table('articles')
            ->where('id', $article_id)
            ->update([
                'status' => 0
            ]);
        return redirect("/admin/view_articles");
    }
}
