<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth; 
use Hash;
use Session; 

class UserController extends Controller
{
    public function index()
    {
        $usersData = User::where('role',0)->get();
        return view('backend.users.index',compact('usersData'));
        
    }

    public function create()
    {
        return view('backend.users.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 0;
        $user->register_at = Carbon::now();
        $user->save();
        
        if ($user->save()) {
            // dd("save");
            return redirect()->route('admin.users')->with('success', 'Users Added Successfully !');
        } 
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('backend.users.edit', compact('data'));   
    }

    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        // dd($user);
        $user->fill($request->all());
        $user->update();

        return redirect()->route('admin.users')->with('success','user updated');
    }
    public function delete($id)
    {
        $users = User::FindOrFail($id);
        $users->delete();
        return redirect()->route('admin.users');   
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
            return redirect()->route('user.show_profile');
        }

        return redirect()->back()->with('fail', 'The provided credentials do not match our records.');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $adminUser = new User;
        $adminUser->name = $request->name;
        $adminUser->email = $request->email;
        $adminUser->password = Hash::make($request->password);
        $adminUser->role = 0;
        $adminUser->register_at = Carbon::now();
        $adminUser->save();

        return redirect()->route('login')->with('success', 'You are registered successfully');
    }

    public function show_profile()
    {
        if (Auth::check()) {
            $data = Auth::user();
            return view('frontend.profile', compact('data'));
        } else {
            return redirect()->route('login');
        }
    }

    public function edit_profile($id)
    {
        if (Auth::check()) {
            // $data = Auth::user();
            $data = User::findOrFail($id);
            return view('frontend.edit_profile', compact('data'));
        } else {
            return redirect()->route('login');
        }
    }

    public function update_profile(Request $request)
    {
       $adminUser = User::findOrFail($request->id);
        // dd($adminUser);
        $adminUser->fill($request->all());
        $adminUser->update();

        return redirect()->route('user.show_profile')->with('success', 'Your Profile Updated successfully');
    }

    public function logout()
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        return redirect()->route('login');
    }

    // ===========================================================

}
