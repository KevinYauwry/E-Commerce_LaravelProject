<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    function index()
    {
        return view("sesi/login");
    }

    function login(Request $request)
    {
        Session::flash('email',$request->email);

        $request -> validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'password.required' => 'Password is required'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('dashboard')->with('Login Sucessful!!!');
        }
        else{
            // return 'Failed';
            return redirect('sesi')->withErrors('Username & Password is wrong!');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success','Logout Succesfull!');
    }
    
    function create(Request $request)
    {
        Session::flash('username',$request->username);
        Session::flash('email',$request->email);

        $request -> validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ],[
            'username' => 'Username is required',
            'email.required' => 'Email is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'Email is already used, please use another email.',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be more than 6 characters'
        ]);

        $data = [
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            return redirect('dashboard')->with('success', Auth::user()->username . 'Login Sucessful!!!');
        }
        else{
            // return 'Failed';
            return redirect('sesi')->withErrors('Username & Password is wrong!');
        }     
    }

}
