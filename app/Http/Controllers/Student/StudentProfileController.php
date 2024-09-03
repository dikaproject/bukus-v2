<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StudentProfileController extends Controller
{
    public function edit()
    {
        $student = Auth::guard('student')->user();
        return view('student.complete-profile', compact('student'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:students,email,' . Auth::guard('student')->id(),
            'password' => 'required|string|min:8',
        ]);

        $student = Auth::guard('student')->user();
        $student->update([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return view('student.dashboard')->with('success', 'Login Successfully.');
    }

}
