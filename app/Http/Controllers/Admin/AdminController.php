<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
            'nik' => 'required|unique:admins,nik',
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'jabatan' => 'required',
            'password' => 'required',
            'sekolah' => 'nullable',
        ]);

        $admin = new Admin([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hashing the password
            'sekolah' => 'SMK Telkom Purwokerto',
        ]);
        $admin->save();

        // Assign roles based on jabatan
        switch ($request->jabatan) {
            case 'Walas':
            case 'Guru':
                $admin->assignRole('walas');
                break;
            case 'Tim Disiplin':
                $admin->assignRole('teacher');
                break;
            case 'Ketua Tim Disiplin':
                $admin->assignRole('leader');
                break;
        }

        Swal::toast('New Teacher / Admin created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admins.index');
    }

    public function show(Admin $admin)
    {
        return view('admin.show', compact('admin'));
    }

    public function edit(Admin $admin)
    {
        return view('admin.teacher.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nik' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $id,
            'jabatan' => 'required|string',
            'password' => 'sometimes|nullable|string|min:6',
            'sekolah' => 'nullable|string|max:255',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->nik = $request->nik;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->jabatan = $request->jabatan;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->sekolah = 'SMK Telkom Purwokerto';

        $admin->save();

        // Update roles based on jabatan
        $admin->syncRoles($this->getRoleForJabatan($request->jabatan));

        Swal::toast('Update Teacher / Admin created successfully!', 'success')->timerProgressBar();

        return redirect()->route('admins.index');
    }

    private function getRoleForJabatan($jabatan)
{
    $role = [];
    switch ($jabatan) {
        case 'Walas':
        case 'Guru':
            $role = ['walas'];
            break;
        case 'Tim Disiplin':
            $role = ['teacher'];
            break;
        case 'Ketua Tim Disiplin':
            $role = ['leader'];
            break;
    }
    Log::info('Assigning roles:', ['jabatan' => $jabatan, 'roles' => $role]);
    return $role;
}


    public function destroy(Admin $admin)
    {
        $admin->delete();

        Swal::toast('Teacher / Admin deleted successfully!', 'success')->timerProgressBar();

        return redirect()->route('admins.index');
    }
}
