<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Models\Admin as ModelsAdmin;
use App\Models\Pasal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Student;

class AdminAuthController extends Controller
{
   public function dashboard()
{
    // Total Pelanggar: Siswa dengan poin jenis 'Hukuman' yang dikonfirmasi 'Benar'
    $totalPelanggar = Student::whereHas('poins', function ($query) {
        $query->where('jenis', 'Hukuman')->where('konfirmasi', 'Benar');
    })->count();

    // Ranking Poin: Jumlah siswa yang memiliki poin yang dikonfirmasi
    $rankingPoin = Student::whereHas('poins', function ($query) {
        $query->where('konfirmasi', 'Benar');
    })->count();

    // Total Pasal: Jumlah semua pasal yang terdaftar
    $totalPasal = Pasal::count();

    // Total Siswa Belum Install: Siswa dengan email null
    $totalSiswaBelumInstall = Student::whereNull('email')->count();

    return view('admin.dashboard', compact('totalPelanggar', 'rankingPoin', 'totalPasal', 'totalSiswaBelumInstall'));
}

    public function login()
    {
        return view('auth.teacher');
    }
    public function login_submit(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
        ];

        if (Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin_dashboard')->with('Success', 'Login Successfully.');
        } else {
            return redirect()->route('admin_login')->with('Error', 'Invalid Credentials.');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('Success', 'Logout Successfully.');
    }
}
