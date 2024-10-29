<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\PrestasiExport;
use App\Exports\BerbintangExport;
use App\Exports\PelanggaranExport;
use App\Exports\StudentsExport;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportSystemController extends Controller
{
    // Export Prestasi perkelas atau semua
    public function exportPrestasi(Request $request)
    {
        $search = $request->input('search');
        $kelas = $request->input('kelas');

        return Excel::download(new PrestasiExport($search, $kelas), 'prestasi.xlsx');
    }

    // Export Berbintang perkelas atau semua
    public function exportBerbintang(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'search' => 'nullable|string|max:255',
            'kelas' => 'nullable|string|exists:students,kelas',
        ]);

        // Retrieve filters from the request
        $search = $request->input('search');
        $kelas = $request->input('kelas');

        // Initiate the Excel download with the BerbintangExport class
        return Excel::download(new BerbintangExport($search, $kelas), 'berbintang.xlsx');
    }

    // Export Pelanggaran perkelas atau semua
    public function exportPelanggaran(Request $request)
    {
        $search = $request->input('search');
        $kelas = $request->input('kelas');

        return Excel::download(new PelanggaranExport($search, $kelas), 'pelanggaran.xlsx');
    }

    // Export Semua Siswa
    public function exportStudents()
    {
        return Excel::download(new StudentsExport(), 'students.xlsx');
    }

    // Export Siswa perkelas atau semua
    public function exportSiswa(Request $request)
    {
        $search = $request->input('search');
        $kelas = $request->input('kelas');

        $filename = 'rekap_siswa_kelas_' . ($kelas ? $kelas : 'semua') . '.xlsx';

        return Excel::download(new SiswaExport($search, $kelas), $filename);
    }
}
