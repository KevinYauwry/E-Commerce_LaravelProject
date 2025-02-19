<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
}
