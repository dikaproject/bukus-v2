<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nis', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('kelas', 'LIKE', "%{$search}%")
                    ->orWhere('jurusan', 'LIKE', "%{$search}%");
            });
        }

        $students = $query->paginate(30);

        return view('admin.student.index', compact('students'));
    }

    public function create()
    {
        return view('admin.student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email',
            'password' => 'required|string|min:8',
            'kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255',
            'sekolah' => 'required|string|max:255',
        ]);

        Student::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'sekolah' => $request->sekolah,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function edit(Student $student)
    {
        return view('admin.student.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nis' => 'required|unique:students,nis,' . $student->id,
            'name' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->id,
            'password' => 'nullable|string|min:8',
            'kelas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'angkatan' => 'required|string|max:255',
            'sekolah' => 'required|string|max:255',
        ]);

        $student->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'tanggal' => $request->tanggal,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $student->password,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan,
            'sekolah' => $request->sekolah,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        Excel::import(new StudentsImport(), $request->file('file'));

        return response()->json(['success' => true]);
        return redirect()->route('students.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return response()->json([]);
        }

        $students = Student::where('name', 'LIKE', '%' . $query . '%')->get();

        return response()->json($students);
    }

    public function resetPassword($id)
    {
        $student = Student::findOrFail($id);

        // Reset password to the student's NIS and clear email
        $student->password = Hash::make($student->nis);
        $student->email = null;
        $student->save();

        return redirect()->route('students.index')->with('success', 'Password reset successfully, and email cleared.');
    }

    public function detail(Student $student)
    {
        return view('admin.student.detail', compact('student'));
    }
}
