<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasal;
use Illuminate\Http\Request;
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

        return redirect()->route('admin.pasal.index');
    }
}
