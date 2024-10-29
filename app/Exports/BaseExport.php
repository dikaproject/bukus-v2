<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

abstract class BaseExport implements FromCollection, WithHeadings
{
    protected $search;
    protected $kelas;

    public function __construct($search, $kelas)
    {
        $this->search = $search;
        $this->kelas = $kelas;
    }

    /**
     * Apply common filters to the query.
     */
    protected function applyFilters($query)
    {
        // Apply search filter
        if ($this->search) {
            $search = $this->search; // Assign to local variable for closure
            $query->where(function ($q) use ($search) {
                $q->where('nis', 'LIKE', "%{$search}%")
                  ->orWhere('name', 'LIKE', "%{$search}%")
                  ->orWhere('kelas', 'LIKE', "%{$search}%")
                  ->orWhere('jurusan', 'LIKE', "%{$search}%");
            });
        }

        // Apply class filter
        if ($this->kelas) {
            $query->where('kelas', $this->kelas);
        }
    }
}
