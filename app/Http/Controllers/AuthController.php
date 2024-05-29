<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmRegistration;
use App\Mail\Forgot_Password;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'unique:users|email',
            'password' => 'required|min:8|max:255',
            // 'password' => 'required|min:8|max:255|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/',
            'confirm_password' => 'same:password'
        ]);
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role_type = 10;
        $user->remember_token = $request->get('_token');
        if ($user->save()) {
            if (Auth::attempt(array(
                'email' => $request->get('email'),
                'password' => $request->get('password')
            ))) {
                $user['id'] = Auth::user()->id;
                $user['name'] = Auth::user()->name;
                $user['email'] = Auth::user()->email;
                $user['password'] = $request->get('password');
                $user['roletype'] = Auth::user()->role_type;
                Session::put('user', $user);
                $id = Session::get('user.id');
                if (Auth::user()->role_type == 10) {
                    return redirect("/edit_profile/$id");
                }
            }
        }
    }

    // public function provider()
    // {
    //     return Socialite::driver('google')->redirect();
    // }


    // public function callbackHandle()
    // {
    //     $user = Socialite::driver('google')->user();

    //     $data = User::where('email', $user->email)->first();
    //     if (is_null($data)) {
    //         $add = new User();
    //         $add->name = $user->name;
    //         $add->email = $user->email;
    //         $random_string = substr(md5(uniqid(mt_rand(), true)), 0, 10);
    //         $add->password = $random_string;
    //         $add->role_type = 10;
    //         if ($add->save()) {
    //             if ($this->loginUser($user->email, $random_string)) {
    //                 $user['id'] = $add->id;
    //                 $user['name'] = $add->name;
    //                 $user['email'] = $add->email;
    //                 $user['password'] = $random_string;
    //                 $user['roletype'] = $add->role_type;
    //                 Session::put('user', $user);
    //                 $id = Session::get('user.id');
    //                 $patient_info = DB::table('users')->where('id', $id)->first();
    //                 Mail::to($user->email)->send(new ConfirmRegistration($patient_info));
    //                 if ($add->role_type == 10) {
    //                     return redirect("/edit_profile/$id");
    //                 }
    //             }
    //         }
    //     } else {
    //         if ($this->loginUser($user->email, $random_string)) {
    //             $user['id'] = $data->id;
    //             $user['name'] = $data->name;
    //             $user['email'] = $data->email;
    //             $user['password'] = $random_string;
    //             $user['roletype'] = $data->role_type;
    //             Session::put('user', $user);
    //             $id = Session::get('user.id');
    //             if ($data->role_type == 10) {
    //                 return redirect("/home");
    //             }
    //         }
    //     }
    // }

    public function loginUser($email, $password)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            return false;
        }
        if (Hash::check($password, $user->password)) {
            return true;
        }
        return false;
    }


    public function dologin(Request $request)
    {
        if ($request->email == '' || $request->password == '') {
            Session::flash('message', "Please enter Email and Password");
            return redirect('login/');
        }
        if (Auth::attempt(array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ))) {
            $user['id'] = Auth::user()->id;
            $user['name'] = Auth::user()->name;
            $user['email'] = Auth::user()->email;
            $user['roletype'] = Auth::user()->role_type;
            Session::put('user', $user);
            if (Auth::user()->role_type == 3) {
                return redirect('/doctor/home');
            } elseif (Auth::user()->role_type == 4) {
                return redirect('/nurse/home');
            } elseif (Auth::user()->role_type == 10) {
                return redirect('/home');
            }
        }
        Session::flash('message', "Invalid Login , Please try again.");
        return redirect('/');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }

    public function admin_login(Request $request)
    {
        if ($request->email == '' || $request->password == '') {
            Session::flash('message', "Please enter Email and Password");
            return redirect('/admin');
        }
        if (Auth::attempt(array(
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ))) {
            $user['id'] = Auth::user()->id;
            $user['name'] = Auth::user()->name;
            $user['email'] = Auth::user()->email;
            $user['roletype'] = Auth::user()->role_type;
            Session::put('user', $user);
            if (Auth::user()->role_type == 1) {
                return redirect('/admin/home');
            }
        } else {
            return redirect("/admin_logout");
        }
        Session::flash('message', "Invalid Login , Please try again.");
        return redirect('/admin');
    }

    public function admin_logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('/admin');
    }

    public function forget_password()
    {
        return view('forget_password');
    }

    public function send_password(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            Session::put('email', $user->email);
            return view('change_password');
        } else {
            Session::put('message', 'Email Not Found!');
            return redirect()->back();
        }
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|max:255',
            'confirm_password' => 'same:password'
        ]);
        $update = User::where('email', $request->email)->first();
        $update->password = Hash::make($request->password);
        $update->save();
        auth()->logout();
        Session::flush();
        return redirect("/");
    }

    // public function send_password(Request $request)
    // {
    //     $user = User::where('email', $request->email)->first();
    //     if ($user) {
    //         $random_string = substr(md5(uniqid(mt_rand(), true)), 0, 10);
    //         Mail::to($request->email)->send(new Forgot_Password($random_string));
    //         return redirect()->back()->with('message', 'Password reset email has been sent!');
    //     } else {
    //         return redirect()->back()->with('message', 'Email not found!');
    //     }
    // }
}
