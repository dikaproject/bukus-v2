<?php

namespace App\Imports;

use App\Models\Pasal;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection; // Add this line

class PasalsImport implements ToCollection, ToModel
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
            $count = Pasal::where('kode', '=', $row[2])->count();
            if(empty($count))
            {
                $pasal = new Pasal;
                $pasal->jenis = $row[0];
                $pasal->kategori = $row[1];
                $pasal->kode = $row[2];
                $pasal->poin = $row[3];
                $pasal->keterangan = $row[4];
                $pasal->save();
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
