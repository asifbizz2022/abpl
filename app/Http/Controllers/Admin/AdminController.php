<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class AdminController extends Controller
{
    public function login_page(){
        return view('admin.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required|min:3'
        ]);

        
        $email = $request->email;
        $password = $request->password;

        $auth = Auth::guard('web')->attempt([
            'email'=>$email,
            'password'=>$password,
        ]);

        if($auth){
           return redirect()->route('admin.home');
        } else {
            return back()->with('error', 'Invalid Credentials');
        }

    }
    public function register_form(){
        return view('admin.registration');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:3|confirmed'
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);
        $contact = $request->contact;

        $result = DB::table('users')->insert([
            'name'=>$name,
            'email'=>$email,
            'password'=>$password,
            'contact'=>$contact,
        ]);

        if($result){
            return redirect('/admin/login')->with('success', 'Registration Successfull');
        } else {
            return back()->with('message', 'error');
        }
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('admin.login.form');
    }
}
