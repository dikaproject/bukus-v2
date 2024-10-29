<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Collection;

class BerbintangExport extends BaseExport
{
    /**
     * Retrieve and transform the collection of students with Bintang.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Initialize the query with Bintang > 0 and confirmed poins
        $query = Student::query()
            ->where('bintang', '>', 0)
            ->whereHas('poins', function($q) {
                $q->where('konfirmasi', 'Benar');
            })
            ->with(['poins' => function($q) {
                $q->where('konfirmasi', 'Benar');
            }]);

        // Apply common search and kelas filters
        $this->applyFilters($query);

        // Execute the query to get the filtered students
        $students = $query->get();

        // Transform the data for Excel export
        return $students->map(function($student, $index) {
            // Calculate Prestasi and Pelanggaran points
            $prestasi = $student->poins->where('jenis', 'Prestasi')->sum('poin');
            $pelanggaran = $student->poins->where('jenis', 'Hukuman')->sum('poin');

            return [
                'No' => $index + 1,
                'NIS' => $student->nis,
                'Name' => $student->name,
                'Class' => $student->kelas,
                'Jurusan' => $student->jurusan,
                'Poin Prestasi' => $prestasi,
                'Poin Pelanggaran' => $pelanggaran,
                'Total Points' => $student->tpoin,
                'Bintang' => $student->bintang,
            ];
        });
    }

    /**
     * Define the headings for the Excel export.
     *
     * @return array
     */
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
            'Total Points',
            'Bintang',
        ];
    }
}
