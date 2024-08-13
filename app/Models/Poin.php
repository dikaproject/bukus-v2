<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;

    protected $fillable = ['nis', 'nama', 'kelas', 'kode', 'jenis', 'pelanggaran', 'poin', 'konfirmasi', 'bukti', 'status_bukti', 'tanggal', 'pelapor', 'pesan'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'nis', 'nis');
    }

    public function isConfirmed()
    {
        return $this->konfirmasi === 'Benar';
    }
}
