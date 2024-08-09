<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.teacher.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:admins',
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'jabatan' => 'required',
            'sekolah' => 'required',
        ]);

        $admin = new Admin([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'jabatan' => $request->jabatan,
            'sekolah' => $request->sekolah,
            'status' => '1', // Active by default
        ]);
        $admin->save();

        // Assign the 'teacher' role to the new admin
        $admin->assignRole('teacher');

        Swal::toast('New Teacher / Admin created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.index');
    }

    public function show(Admin $admin)
    {
        return view('admin.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.teacher.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'nik' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'jabatan' => 'required',
            'sekolah' => 'required',
        ]);

        $admin->update($request->all());

        Swal::toast('Update Teacher / Admin created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.index');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        Swal::toast('Teacher / Admin deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admin.index');
    }
}
