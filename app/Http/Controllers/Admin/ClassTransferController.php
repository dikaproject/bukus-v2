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
        $classes = ['X PPLG 1', 'X PPLG 2', 'X PPLG 3', 'X PPLG 4', 'X PPLG 5', 'X PPLG 6', 'X PPLG 7', 'X TJKT 1', 'X TJKT 2', 'X TJKT 3', 'X TJKT 4', 'X TJKT 5', 'XI PPLG 1', 'XI PPLG 2', 'XI PPLG 3', 'XI PPLG 4', 'XI PPLG 5', 'XI PPLG 6', 'XI PPLG 7', 'XI TJKT 1', 'XI TJKT 2', 'XI TJKT 3', 'XI TJKT 4', 'XI TJKT 5', 'XII PPLG 1', 'XII PPLG 2', 'XII PPLG 3', 'XII PPLG 4', 'XII PPLG 5', 'XII PPLG 6', 'XII PPLG 7', 'XII TJKT 1', 'XII TJKT 2', 'XII TJKT 3', 'XII TJKT 4', 'XII TJKT 5'];
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

        return redirect()->route('admin.pindahkelas.index')->with('success', 'Students have been successfully transferred.');
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
