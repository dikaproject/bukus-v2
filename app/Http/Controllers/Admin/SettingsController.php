<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;

class SettingsController extends Controller
{
    public function showPoinBerbintang()
    {
        $students = Student::with('poins')
            ->where('bintang', '>', 0) // Ensure 'bintang' is a valid column in 'students' table
            ->get();

        return view('admin.settings.rekap_berbintang', compact('students'));
    }
}
