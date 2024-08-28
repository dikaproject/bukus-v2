<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        // Select only specific fields for export
        return Student::query()->select([
            'nis',
            'name',
            'email',
            'kelas',
            'jurusan',
            'angkatan',
            'sekolah',
            'tpoin',
            'bintang'
        ]);
    }

    public function map($student): array
    {
        // Mapping the data for the export, excluding the password
        return [
            $student->nis,
            $student->name,
            $student->email,
            $student->kelas,
            $student->jurusan,
            $student->angkatan,
            $student->sekolah,
            $student->tpoin,
            $student->bintang
        ];
    }

    public function headings(): array
    {
        return [
            'NIS',
            'Name',
            'Email',
            'Kelas',
            'Jurusan',
            'Angkatan',
            'Sekolah',
            'Total Points',
            'Bintang'
        ];
    }
}
