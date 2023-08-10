<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SampleController extends Controller
{
    function index()
    {
        return view('login');
    }
    function registration()
    {
        return view('registration');
    }

    function validate_registration(Request $request)
    {
        $request->validate([
            'name'         =>   'required',
            'name2'         =>   'required',
            'email'        =>   'required|email|unique:users',
            'password'     =>   'required|min:6'
        ]);

        $data = $request->all();

        User::create([
            'name'  =>  $data['name'],
            'name2'  =>  $data['name2'],
            'email' =>  $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('login')->with('success', 'Registration Completed, now you can login');
    }

    function validate_login(Request $request)
    {
        $request->validate([
            //'email' =>  'required',
            'name' =>  'required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('name', 'password');//

        if(Auth::attempt($credentials))
        {
            return redirect('dashboard');
        }

        return redirect('login')->with('success', 'Login details are not valid');
    }

    function dashboard()
    {
        if(Auth::check())
        {
            return view('dashboard');
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }
    function add()
    {
        if(Auth::check())
        {
            return view('add');
        }

        //return redirect('login')->with('success', 'you are not allowed to access');
    }
    function addStud()
    {
        if(Auth::check())
        {
            return view('addStud');
        }

        //return redirect('login')->with('success', 'you are not allowed to access');
    }
    function addBorrow()
    {
        if(Auth::check())
        {
            return view('addBorrow');
        }

        //return redirect('login')->with('success', 'you are not allowed to access');
    }
    
    function logout()
    {
        Session::flush();

        Auth::logout();

        return Redirect('login');
    }
}
