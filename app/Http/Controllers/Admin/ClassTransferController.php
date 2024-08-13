<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reduce;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClassTransferController extends Controller
{
    public function index()
    {
        $students = Student::select('id', 'name', 'kelas', 'jurusan')->get(); // Adjust as needed
        $classes = ['X PPLG1', 'X PPLG2', 'X PPLG3', 'X PPLG4', 'X PPLG5', 'X PPLG6', 'X PPLG7', 'X TJKT1', 'X TJKT2', 'X TJKT3', 'X TJKT4', 'X TJKT5', 'XI PPLG1', 'XI PPLG2', 'XI PPLG3', 'XI PPLG4', 'XI PPLG5', 'XI PPLG6', 'XI PPLG7', 'XI TJKT1', 'XI TJKT2', 'XI TJKT3', 'XI TJKT4', 'XI TJKT5', 'XII PPLG1', 'XII PPLG2', 'XII PPLG3', 'XII PPLG4', 'XII PPLG5', 'XII PPLG6', 'XII PPLG7', 'XII TJKT1', 'XII TJKT2', 'XII TJKT3', 'XII TJKT4', 'XII TJKT5'];
        return view('admin.pindahkelas.index', compact('students', 'classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'students' => 'required|array',
            'new_class' => 'required|string',
        ]);

        $notifications = [];

        foreach ($validated['students'] as $studentId) {
            $student = Student::find($studentId);
            if ($student) {
                $originalPoints = $student->tpoin;
                $student->kelas = $validated['new_class'];

                $reduces = Reduce::where('poin_min', '<=', $originalPoints)
                                 ->where('poin_max', '>=', $originalPoints)
                                 ->get();

                foreach ($reduces as $reduce) {
                    if ($originalPoints > 0) {
                        $reduction = ($originalPoints * $reduce->reducepoin_prestasi) / 100;
                        $student->tpoin -= $reduction;
                        $notifications[] = $student->name . ' Terkena Reduce Poin Prestasi ' . $reduce->reducepoin_prestasi . '%';

                    }
                }

                $student->bintang = $student->calculateStars(); // Update stars based on new points
                $student->save();
            }
        }

        return redirect()->route('admin.pindahkelas.index')->with([
            'success' => 'Students have been successfully transferred.',
            'notifications' => $notifications
        ]);
    }
}
