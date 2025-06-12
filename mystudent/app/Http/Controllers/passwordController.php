<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class passwordController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->fill([
            'password' => Hash::make($request->input('password')),
        ])->save();

        return redirect('/');
    }
       
}