<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'student';
    protected $fillable = ['name', 'nis', 'password', 'token', 'email', 'kelas', 'jurusan', 'angkatan', 'sekolah', 'tanggal', 'tpoin', 'bintang', 'aksi', 'pesan'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function pelanggaran() {
        return $this->hasMany(Poin::class, 'nis', 'nis')->where('jenis', 'Pelanggaran');
    }

    public function prestasi() {
        return $this->hasMany(Poin::class, 'nis', 'nis')->where('jenis', 'Prestasi');
    }

    public function poins()
    {
        return $this->hasMany(Poin::class, 'nis', 'nis');
    }

    public function updatePointsAndStars()
    {
        $this->bintang = $this->calculateStars(); // Asumsi bahwa calculateStars menghitung bintang berdasarkan tpoin
        $this->save();
    }

    private function calculateStars()
    {
        if ($this->tpoin >= 100) {
            return 5;
        } elseif ($this->tpoin >= 85) {
            return 4;
        } elseif ($this->tpoin >= 70) {
            return 3;
        } elseif ($this->tpoin >= 50) {
            return 2;
        } elseif ($this->tpoin >= 30) {
            return 1;
        } else {
            return 0;
        }
    }
}
