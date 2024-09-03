<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;

class SettingsController extends Controller
{
    public function showPoinBerbintang()
    {
        $perPage = 30;

        $students = Student::with('poins')
            ->where('bintang', '>', 0) // Ensure 'bintang' is a valid column in 'students' table
            ->paginate($perPage);

        return view('admin.settings.rekap_berbintang', compact('students'));
    }

    // rekap data Prestasi
    public function showPrestasi() {
        $perPage = 30;

        $students = Student::whereHas('poins', function($query) {
            $query->where('jenis', 'Prestasi'); // Asumsi kolom 'jenis' ada di tabel 'poins'
        })->paginate($perPage);

        return view('admin.settings.rekap_prestasi', compact('students'));
    }


    // rekap data Pelanggaran
    public function showPelanggaran() {
        $perPage = 30;

        $students = Student::whereHas('poins', function($query) {
            $query->where('jenis', 'Hukuman'); // Asumsi kolom 'jenis' ada di tabel 'poins'
        })->paginate($perPage);

        return view('admin.settings.rekap_pelanggaran', compact('students'));
    }


}
