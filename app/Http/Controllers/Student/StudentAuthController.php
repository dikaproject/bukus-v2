<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Models\Student as ModelsStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class StudentAuthController extends Controller
{
    public function dashboard()
    {
        return view('student.dashboard');
    }
    public function login()
    {
        return view('auth.student');
    }
    public function login_submit(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nis' => 'required|numeric',
            'password' => 'required',
        ]);

        $check = $request->all();
        $data = [
            'nis' => $check['nis'],
            'password' => $check['password'],
        ];

        if (Auth::guard('student')->attempt($data)) {
            return redirect()->route('student_dashboard')->with('Success', 'Login Successfully.');
        } else {
            return redirect()->route('student_login')->with('Error', 'Invalid Credentials.');
        }
    }
    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student_login')->with('Success', 'Logout Successfully.');
    }
}
