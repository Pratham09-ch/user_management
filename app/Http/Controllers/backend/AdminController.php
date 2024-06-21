<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth; 
use Hash;
use Session; 

class AdminController extends Controller
{
    public function index()
    {
        // return view('backend.admin.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); 
            // dd(Auth::user()->name);
            return redirect()->route('admin.show_profile');
        }

        return redirect()->back()->with('fail', 'The provided credentials do not match our records.');
    }

    public function show_profile()
    {
        // dd("");
        if (Auth::check()) {
            $data = Auth::user();
            // dd($data->name);
            return view('backend.profile', compact('data'));
        } else {
            // dd("else");
            return redirect()->route('admin.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        return redirect()->route('admin.login');
    }
}
