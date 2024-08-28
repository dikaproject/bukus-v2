<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\PrestasiExport;
use App\Exports\BerbintangExport;
use App\Exports\PelanggaranExport;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportSystemController extends Controller
{
    public function exportPrestasi()
    {
        return Excel::download(new PrestasiExport(), 'prestasi.xlsx');
    }

    public function exportBerbintang()
    {
        return Excel::download(new BerbintangExport(), 'berbintang.xlsx');
    }

    public function exportPelanggaran()
    {
        return Excel::download(new PelanggaranExport(), 'pelanggaran.xlsx');
    }

    public function exportStudents()
    {
        return Excel::download(new StudentsExport(), 'students.xlsx');
    }
}
