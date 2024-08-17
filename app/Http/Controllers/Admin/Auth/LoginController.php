<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        //return "login";
        $idpass = $request->only("username", "password");

        if (Auth::guard('admin')->attempt($idpass)) {
            // return 1;
            return redirect()->route('admin.dashboard');
        } else {
            // return 0;
            return redirect()->route('admin.login')->with('error', 'Invalid credentials.');
        }
    }

 
}