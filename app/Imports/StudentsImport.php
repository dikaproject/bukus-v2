<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection; // Add this line

class StudentsImport implements ToCollection, ToModel
{
    private $current = 0;

    public function collection(Collection $collection)
    {
    }

    public function model(array $row)
    {
        $this->current++;
        if ($this->current > 1)
        {
            $count = Student::where('nis', '=', $row[0])->count();
            if(empty($count))
            {
                $student = new Student;
                $student->nis = $row[0];
                $student->name = $row[1];
                $student->kelas = $row[2];
                $student->jurusan = $row[3];
                $student->angkatan = $row[4];
                $student->tpoin = $row[5];
                $student->email = $row[6];
                $student->password = Hash::make($row[0]);
                $student->sekolah = 'SMK Telkom Purwokerto';
                $student->tanggal = now();
                $student->save();

                $student->assignRole('student');
            }
        }
        // return new Student([
        //     'nis' => $row[0],
        //     'name' => $row[1],
        //     'kelas' => $row[2],
        //     'jurusan' => $row[3],
        //     'angkatan' => $row[4],
        //     'tpoin' => $row[5],
        //     'email' => $row[6],
        //     'password' => Hash::make($row[0]),
        //     'sekolah' => 'SMK Telkom Purwokerto',
        //     'tanggal' => now(),
        // ]);
    }

}

