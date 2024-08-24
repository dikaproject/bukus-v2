<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BerbintangExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Student::query()
            ->with('poins')
            ->whereHas('poins', function($query) {
                $query->where('konfirmasi', 'Benar');
            });
    }

    public function headings(): array
    {
        return [
            'NIS',
            'Name',
            'Class',
            'Jurusan',
            'Poin Prestasi',
            'Poin Pelanggaran',
            'Total Points',
            'Bintang'
        ];
    }

    public function map($student): array
    {
        $prestasi = $student->poins->where('jenis', 'Prestasi')->where('konfirmasi', 'Benar')->sum('poin');
        $pelanggaran = $student->poins->where('jenis', 'Hukuman')->where('konfirmasi', 'Benar')->sum('poin');
        return [
            $student->nis,
            $student->name,
            $student->kelas,
            $student->jurusan,
            $prestasi,
            $pelanggaran,
            $student->tpoin,
            $student->bintang
        ];
    }
}
