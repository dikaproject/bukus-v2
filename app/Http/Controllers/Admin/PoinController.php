<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poin;
use App\Models\Pasal;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert as Swal;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PoinController extends Controller
{
    public function index()
    {
        $poins = Poin::all();
        return view('admin.poin.index', compact('poins'));
    }

    public function create()
    {
        $students = Student::all();
        $pasals = Pasal::all();
        return view('admin.poin.add', compact('students', 'pasals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|exists:pasals,kode',
            'bukti' => 'required',
        ]);

        $pasal = Pasal::where('kode', $request->kode)->firstOrFail();
        $student = Student::where('name', $request->nama)->firstOrFail();

        $user = Auth::guard('web')->user() ?? Auth::guard('admin')->user();

        $poin = new Poin([
            'nis' => $student->nis,
            'nama' => $student->name,
            'kelas' => $student->kelas,
            'kode' => $pasal->kode,
            'jenis' => $pasal->jenis,
            'pelanggaran' => $pasal->keterangan,
            'poin' => $pasal->poin,
            'konfirmasi' => 'Belum', // Inisialisasi poin sebagai belum dikonfirmasi
            'bukti' => $request->bukti,
            'status_bukti' => 'Belum',
            'tanggal' => now(),
            'pelapor' => $user ? $user->name : 'Unknown',
            'pesan' => $request->input('pesan', null),
        ]);
        $poin->save();

        Swal::toast('Poin recorded successfully. Awaiting confirmation.', 'info')->timerProgressBar();

        return redirect()->route('poin.index');
    }

    public function confirmIndex()
    {
        $poins = Poin::where('konfirmasi', 'Belum')->with('student')->get(); // Menampilkan hanya poin yang belum dikonfirmasi
        return view('admin.confirmpoin.index', compact('poins'));
    }

    public function confirmPoin($id)
    {
        $poin = Poin::findOrFail($id);
        $poin->konfirmasi = 'Benar';
        $poin->save();

        $poin->student->updatePointsAndStars();  // Update points and stars after confirmation

        Alert::success('Confirmation Success', 'Poin has been successfully confirmed.');
        return back();
    }

    public function edit($id)
    {
        $poin = Poin::with('student')->findOrFail($id);
        $students = Student::all();
        $pasals = Pasal::all();
        return view('admin.poin.edit', compact('poin', 'students', 'pasals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|exists:pasals,kode',
            'bukti' => 'required',
        ]);

        $poin = Poin::findOrFail($id);
        $pasal = Pasal::where('kode', $request->kode)->firstOrFail();
        $student = Student::where('name', $request->nama)->firstOrFail();

        $poin->update([
            'nama' => $student->name,
            'kelas' => $student->kelas,
            'kode' => $pasal->kode,
            'jenis' => $pasal->jenis,
            'pelanggaran' => $pasal->keterangan,
            'poin' => $pasal->poin,
            'bukti' => $request->bukti,
        ]);

        $student->updatePointsAndStars();

        Alert::success('Success', 'Poin has been updated successfully.');
        return redirect()->route('poin.index');
    }

    public function destroy($id)
    {
        $poin = Poin::findOrFail($id);
        $poin->delete();

        $student = $poin->student;
        $student->updatePointsAndStars();

        Alert::success('Deleted', 'Poin has been successfully deleted.');
        return back();
    }
}
