<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrestasiExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function query()
    {
        return Student::query()
            ->whereHas('poins', function($query) {
                $query->where('jenis', 'Prestasi')
                      ->where('konfirmasi', 'Benar');
            })
            ->with(['poins' => function($query) {
                $query->where('jenis', 'Prestasi')
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
            'Poin Prestasi'
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
