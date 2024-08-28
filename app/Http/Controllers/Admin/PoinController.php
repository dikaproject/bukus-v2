<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Poin;
use App\Models\Pasal;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert as Swal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class PoinController extends Controller
{
    public function index()
    {
        $poins = Poin::whereIn('konfirmasi', ['Benar', 'Belum'])->get();
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
        if ($poin->konfirmasi !== 'Benar') {
            // Hanya proses jika belum dikonfirmasi
            $poin->konfirmasi = 'Benar';
            $poin->save();

            // Perbarui poin dan bintang siswa
            $student = $poin->student;
            $adjustment = $this->calculatePoinAdjustment($poin);
            $student->tpoin += $adjustment; // Menyesuaikan tpoin berdasarkan poin yang dikonfirmasi
            $student->updatePointsAndStars();
            $student->save();

            Log::info('Poin confirmed and adjusted: ', ['nis' => $student->nis, 'poin_id' => $poin->id, 'adjustment' => $adjustment]);

            Alert::success('Confirmation Success', 'Poin has been successfully confirmed.');
        }

        return back();
    }

    public function cancelPoin($id)
{
    $poin = Poin::findOrFail($id);
    if ($poin->konfirmasi !== 'Benar' && $poin->konfirmasi !== 'Salah') { // Pastikan poin belum dikonfirmasi atau ditandai salah
        $poin->konfirmasi = 'Salah';
        $poin->save();

        // Log perubahan tanpa melakukan penyesuaian poin
        Log::info('Poin marked as incorrect without adjustment: ', ['nis' => $poin->student->nis, 'poin_id' => $poin->id]);

        Alert::success('Cancellation Success', 'Poin has been marked as incorrect without affecting points.');
    } else if ($poin->konfirmasi === 'Benar') {
        // Jika poin sebelumnya telah dikonfirmasi sebagai Benar dan ingin dibatalkan
        $adjustment = -$this->calculatePoinAdjustment($poin); // Mengembalikan penyesuaian poin
        $student = $poin->student;
        $student->tpoin += $adjustment;
        $student->updatePointsAndStars();
        $student->save();

        // Perbarui status poin menjadi 'Salah'
        $poin->konfirmasi = 'Salah';
        $poin->save();

        Log::info('Poin confirmation canceled and adjusted: ', ['nis' => $student->nis, 'poin_id' => $poin->id, 'adjustment' => $adjustment]);
        Alert::success('Cancellation Success', 'Poin confirmation has been canceled and points adjusted accordingly.');
    }

    return back();
}



    private function calculatePoinAdjustment(Poin $poin)
    {
        // Menghitung penyesuaian berdasarkan jenis poin
        if ($poin->jenis === 'Prestasi') {
            return $poin->poin;  // Menambah poin untuk prestasi
        } elseif ($poin->jenis === 'Hukuman') {
            return -$poin->poin;  // Mengurangi poin untuk hukuman
        }
        return 0;
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
        $oldPoinAdjustment = $poin->jenis === 'Prestasi' ? $poin->poin : -$poin->poin;
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

        $newPoinAdjustment = $poin->jenis === 'Prestasi' ? $poin->poin : -$poin->poin;
        $student->tpoin = $student->tpoin - $oldPoinAdjustment + $newPoinAdjustment;
        $student->updatePointsAndStars();
        $student->save();

        Log::info('Poin updated: ', ['nis' => $student->nis, 'poin_id' => $poin->id, 'old_adjustment' => $oldPoinAdjustment, 'new_adjustment' => $newPoinAdjustment]);

        Alert::success('Success', 'Poin has been updated successfully.');
        return redirect()->route('poin.index');
    }

    public function destroy($id)
    {
        $poin = Poin::findOrFail($id);
        $student = $poin->student;
        $adjustment = $poin->jenis === 'Prestasi' ? $poin->poin : -$poin->poin;
        $poin->delete();

        $student->tpoin -= $adjustment;
        $student->updatePointsAndStars();
        $student->save();

        Log::info('Poin deleted and tpoin adjusted: ', ['nis' => $student->nis, 'poin_id' => $id, 'adjustment' => -$adjustment]);

        Alert::success('Deleted', 'Poin has been successfully deleted.');
        return back();
    }
}
