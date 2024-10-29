<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    protected $search;
    protected $kelas;

    public function __construct($search, $kelas)
    {
        $this->search = $search;
        $this->kelas = $kelas;
    }

    public function collection()
    {
        $query = Student::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nis', 'LIKE', "%{$this->search}%")
                  ->orWhere('name', 'LIKE', "%{$this->search}%")
                  ->orWhere('kelas', 'LIKE', "%{$this->search}%")
                  ->orWhere('jurusan', 'LIKE', "%{$this->search}%");
            });
        }

        if ($this->kelas) {
            $query->where('kelas', $this->kelas);
        }

        $students = $query->with(['poins' => function($q) {
            $q->where('konfirmasi', 'Benar');
        }])->get();

        // Transform data for Excel
        return $students->map(function($student, $index) {
            return [
                'No' => $index + 1,
                'NIS' => $student->nis,
                'Name' => $student->name,
                'Class' => $student->kelas,
                'Jurusan' => $student->jurusan,
                'Poin Prestasi' => $student->poins->where('jenis', 'Prestasi')->sum('poin'),
                'Poin Pelanggaran' => $student->poins->where('jenis', 'Hukuman')->sum('poin'),
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
            'Poin Prestasi',
            'Poin Pelanggaran',
        ];
    }
}
