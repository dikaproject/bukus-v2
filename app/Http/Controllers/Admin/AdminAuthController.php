<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Models\Admin as ModelsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function login()
    {
        return view('admin.auth.login-admin');
    }
    public function login_submit(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];

        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin_dashboard')->with('Success', 'Login Successfully.');
        } else {
            return redirect()->route('admin_login')->with('Error', 'Invalid Credentials.');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('Success', 'Logout Successfully.');
    }
}
