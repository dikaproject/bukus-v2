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

        foreach ($validated['students'] as $studentId) {
            $student = Student::findOrFail($studentId);
            $student->kelas = $validated['new_class'];

            // Log before applying reductions
            Log::info("Before applying reductions - Student: {$student->name}, tpoin: {$student->tpoin}");

            // Apply reductions based on current poin
            $this->applyReductions($student);

            // Save the new class and potentially new tpoin
            $student->save();

            Log::info("After applying reductions - Student: {$student->name}, New Class: {$student->kelas}, tpoin: {$student->tpoin}");
        }

        return redirect()
            ->route('admin.pindahkelas.index')
            ->with('success', 'Students have been successfully transferred.');
    }

    private function applyReductions(Student $student)
    {
        $reductions = Reduce::where('poin_min', '<=', $student->tpoin)
                            ->where('poin_max', '>=', $student->tpoin)
                            ->orderByDesc('reducepoin_prestasi') // Ensure we apply the highest applicable reduction
                            ->first();

        if ($reductions) {
            $reductionAmount = $student->tpoin * ($reductions->reducepoin_prestasi / 100);
            $student->tpoin -= $reductionAmount;
            Log::info("Reduction applied - Student: {$student->name}, Reduction: {$reductions->reducepoin_prestasi}%, Reduced Amount: {$reductionAmount}, New tpoin: {$student->tpoin}");
        }
    }


}
