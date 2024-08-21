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

    // rekap data Prestasi
    public function showPrestasi() {
        $students = Student::whereHas('poins', function($query) {
            $query->where('jenis', 'Prestasi'); // Asumsi kolom 'jenis' ada di tabel 'poins'
        })->get();

        return view('admin.settings.rekap_prestasi', compact('students'));
    }


    // rekap data Pelanggaran
    public function showPelanggaran() {
        $students = Student::whereHas('poins', function($query) {
            $query->where('jenis', 'Hukuman'); // Asumsi kolom 'jenis' ada di tabel 'poins'
        })->get();

        return view('admin.settings.rekap_pelanggaran', compact('students'));
    }


    // rekap data Siswa
    public function showSiswa(){
        // get all data from students table
        $students = Student::all();

        return view('admin.settings.rekap_siswa', compact('students'));
    }
}
