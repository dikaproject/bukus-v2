<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PelanggaranExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return Student::query()
            ->with(['poins' => function($query) {
                $query->where('jenis', 'Hukuman')
                      ->where('konfirmasi', 'Benar');
            }]);
    }

    public function headings(): array
    {
        return [
            'NIS',
            'Name',
            'Class',
            'Jurusan',
            'Poin Pelanggaran'
        ];
    }

    public function map($student): array
    {
        return [
            $student->nis,
            $student->name,
            $student->kelas,
            $student->jurusan,
            $student->poins->sum('poin')
        ];
    }
}
