<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Login
    public function index()
    {
        if (Session::has('loginId')) {
            return redirect()->route('std.myView');
        }
        return view('auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $loginAuth = User::where('email', '=', $request->email)->first();

    if ($loginAuth && Hash::check($request->password, $loginAuth->password)) {
        Session::put('loginId', $loginAuth->id);
        return redirect()->route('std.myView')->with('success', 'Login Successfully');
    } else {
        return back()->with('error', 'Invalid email or password');
    }
}

 
    public function indexRegister()
    {
        if (Session::has('loginId')) {
            return redirect()->route('std.myView');
        }
        return view('auth.register');
    }

    public function userRegister(Request $request)
{
    $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
    ]);

    $user = new User();
    $user->name = $request->fname . ' ' . $request->lname;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('auth.index')->with('success', 'Registration successful, please login');
}

    
    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect()->route('auth.index')->with('success', 'Logout Successfully');
        } else {
            return redirect()->route('auth.index')->with('error', 'You are not logged in');
        }
    }
}