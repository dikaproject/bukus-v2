<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function showPoinBerbintang(Request $request)
    {
        $perPage = 30;
        $query = Student::with([
            'poins' => function ($q) {
                $q->where('konfirmasi', 'Benar');
            },
        ])->where('bintang', '>', 0);

        // Handle search and class filters
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nis', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('kelas', 'LIKE', "%{$search}%")
                    ->orWhere('jurusan', 'LIKE', "%{$search}%");
            });
        }

        if ($kelas = $request->input('kelas')) {
            $query->where('kelas', $kelas);
        }

        $students = $query->paginate($perPage);

        // Get distinct classes for the dropdown
        $classes = Student::select('kelas')->distinct()->orderBy('kelas')->pluck('kelas');

        return view('admin.settings.rekap_berbintang', compact('students', 'classes'));
    }

    /**
     * Display the list of students with filters for Prestasi.
     */
    public function showPrestasi(Request $request)
    {
        $perPage = 30;
        $query = Student::whereHas('poins', function ($q) {
            $q->where('jenis', 'Prestasi')->where('konfirmasi', 'Benar');
        })->with([
            'poins' => function ($q) {
                $q->where('jenis', 'Prestasi')->where('konfirmasi', 'Benar');
            },
        ]);

        // Handle search and class filters
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nis', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('kelas', 'LIKE', "%{$search}%")
                    ->orWhere('jurusan', 'LIKE', "%{$search}%");
            });
        }

        if ($kelas = $request->input('kelas')) {
            $query->where('kelas', $kelas);
        }

        $students = $query->paginate($perPage);

        // Get distinct classes for the dropdown
        $classes = Student::select('kelas')->distinct()->orderBy('kelas')->pluck('kelas');

        return view('admin.settings.rekap_prestasi', compact('students', 'classes'));
    }

    /**
     * Display the list of students with filters for Pelanggaran.
     */
    public function showPelanggaran(Request $request)
    {
        $perPage = 30;
        $query = Student::whereHas('poins', function ($q) {
            $q->where('jenis', 'Hukuman')->where('konfirmasi', 'Benar');
        })->with([
            'poins' => function ($q) {
                $q->where('jenis', 'Hukuman')->where('konfirmasi', 'Benar');
            },
        ]);

        // Handle search and class filters
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nis', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('kelas', 'LIKE', "%{$search}%")
                    ->orWhere('jurusan', 'LIKE', "%{$search}%");
            });
        }

        if ($kelas = $request->input('kelas')) {
            $query->where('kelas', $kelas);
        }

        $students = $query->paginate($perPage);

        // Get distinct classes for the dropdown
        $classes = Student::select('kelas')->distinct()->orderBy('kelas')->pluck('kelas');

        return view('admin.settings.rekap_pelanggaran', compact('students', 'classes'));
    }

    public function showSiswa(Request $request)
    {
        $perPage = 30;
        $query = Student::query();

        // Handle search
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nis', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('kelas', 'LIKE', "%{$search}%")
                    ->orWhere('jurusan', 'LIKE', "%{$search}%");
            });
        }

        // Handle class filter
        if ($kelas = $request->input('kelas')) {
            $query->where('kelas', $kelas);
        }

        $students = $query
            ->with([
                'poins' => function ($q) {
                    $q->where('konfirmasi', 'Benar');
                },
            ])
            ->paginate($perPage);

        // Get distinct classes for the dropdown
        $classes = Student::select('kelas')->distinct()->orderBy('kelas')->pluck('kelas');

        return view('admin.settings.rekap_siswa', compact('students', 'classes'));
    }
}
