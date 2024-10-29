<?php

namespace App\Exports;

use App\Models\Student;

class PelanggaranExport extends BaseExport
{
    public function collection()
    {
        $query = Student::query()
            ->whereHas('poins', function($q) {
                $q->where('jenis', 'Hukuman')
                  ->where('konfirmasi', 'Benar');
            })
            ->with(['poins' => function($q) {
                $q->where('jenis', 'Hukuman')
                  ->where('konfirmasi', 'Benar');
            }]);

        // Apply search and class filters
        $this->applyFilters($query);

        $students = $query->get();

        // Transform data for Excel
        return $students->map(function($student, $index) {
            return [
                'No' => $index + 1,
                'NIS' => $student->nis,
                'Name' => $student->name,
                'Class' => $student->kelas,
                'Jurusan' => $student->jurusan,
                'Poin Pelanggaran' => $student->poins->sum('poin'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'NIS',
            'Name',
            'Class',
            'Jurusan',
            'Poin Pelanggaran',
        ];
    }
}
