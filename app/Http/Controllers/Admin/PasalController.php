<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\PasalsImport;
use App\Models\Pasal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class PasalController extends Controller
{
    public function index()
    {
        $pasals = Pasal::all();
        return view('admin.pasal.index', compact('pasals'));
    }

    public function create()
    {
        return view('admin.pasal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'kategori' => 'required',
            'kode' => 'required',
            'poin' => 'required',
            'keterangan' => 'required',
        ]);

        Pasal::create($request->all());

        Swal::toast('Pasal created successfully.', 'success')->timerProgressBar();

        return redirect()->route('pasal.index');
    }

    public function edit(Pasal $pasal)
    {
        return view('admin.pasal.edit', compact('pasal'));
    }

    public function update(Request $request, Pasal $pasal)
    {
        $request->validate([
            'jenis' => 'required',
            'kategori' => 'required',
            'kode' => 'required',
            'poin' => 'required',
            'keterangan' => 'required',
        ]);

        $pasal->update($request->all());

        Swal::toast('Pasal updated successfully.', 'success')->timerProgressBar();

        return redirect()->route('pasal.index');
    }

    public function destroy(Pasal $pasal)
    {
        $pasal->delete();

        Swal::toast('Pasal deleted successfully.', 'success')->timerProgressBar();

        return redirect()->route('pasal.index');
    }

    public function PasalImportExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        Excel::import(new PasalsImport, $request->file('file'));

        return response()->json(['success' => true]);
    }
}
