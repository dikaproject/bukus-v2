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
        $students = Student::all();
        $pasals = Pasal::all();
        return view('admin.poin.index', compact('poins', 'students', 'pasals'));
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
            'nama' => 'required', // Make sure this matches the name in the form
            'kode' => 'required|exists:pasals,kode',
            'bukti' => 'required',
        ]);

        $pasal = Pasal::where('kode', $request->kode)->firstOrFail();
        $student = Student::where('name', $request->nama)->firstOrFail(); // Assuming 'nama' is the student name

        $user = Auth::guard('web')->user() ?? Auth::guard('admin')->user();

        $poin = new Poin([
            'nis' => $student->nis,
            'nama' => $student->name,
            'kelas' => $student->kelas,
            'kode' => $pasal->kode,
            'jenis' => $pasal->jenis,
            'pelanggaran' => $pasal->keterangan,
            'poin' => $pasal->poin,
            'konfirmasi' => 'Belum',
            'bukti' => $request->bukti,
            'status_bukti' => 'Belum',
            'tanggal' => now(),
            'pelapor' => $user ? $user->name : 'Unknown',
            'pesan' => $request->input('pesan', null),
        ]);
        $poin->save();

        $this->updateStudentPoints($student);

        Swal::toast('Poin created successfully.', 'success')->timerProgressBar();

        return redirect()->route('poin.index');
    }

    // Display points waiting for confirmation
    public function confirmIndex()
    {
        $poins = Poin::where('konfirmasi', 'Belum')->with('student')->get();
        return view('admin.confirmpoin.index', compact('poins'));
    }

    // Confirm points
    public function confirmPoin($id)
    {
        $poin = Poin::findOrFail($id);
        $poin->konfirmasi = 'Benar';
        $poin->save();

        $student = $poin->student;
        $this->updateStudentPoints($student);

        Alert::success('Confirmed', 'Poin has been successfully confirmed.');
        return redirect()->route('poin.confirm.index');
    }

    // Helper function to update the student's points upon confirmation
    private function updateStudentPoints(Student $student)
    {
        $totalPrestasi = $student->poins()->where('jenis', 'Prestasi')->where('konfirmasi', 'Benar')->sum('poin');
        $totalHukuman = $student->poins()->where('jenis', 'Hukuman')->where('konfirmasi', 'Benar')->sum('poin');

        $student->tpoin = $totalPrestasi - $totalHukuman;
        $student->bintang = $this->calculateStars($student->tpoin);
        $student->save();
    }

    private function calculateStars($netPoints)
    {
        if ($netPoints >= 100) return 5;
        elseif ($netPoints >= 85) return 4;
        elseif ($netPoints >= 70) return 3;
        elseif ($netPoints >= 50) return 2;
        elseif ($netPoints >= 30) return 1;
        else return 0;
    }
}
