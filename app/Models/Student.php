<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
    protected $fillable = ['name', 'nis', 'password', 'token', 'email', 'kelas', 'jurusan', 'angkatan', 'sekolah', 'tanggal'];

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

    public function poins()
    {
        return $this->hasMany(Poin::class, 'nis', 'nis');
    }

    public function updatePointsAndStars() {
        $this->refresh(); // Refresh the model to ensure it's up to date

        $totalPrestasi = $this->poins()->where('jenis', 'Prestasi')->where('konfirmasi', 'Benar')->sum('poin');
        $totalHukuman = $this->poins()->where('jenis', 'Hukuman')->where('konfirmasi', 'Benar')->sum('poin');

        $this->tpoin = max(0, $totalPrestasi - $totalHukuman);
        $this->bintang = $this->calculateStars();
        $this->save();
    }

    public function calculateStars() {
        $netPoints = $this->tpoin;
        if ($netPoints >= 100) return 5;
        elseif ($netPoints >= 85) return 4;
        elseif ($netPoints >= 70) return 3;
        elseif ($netPoints >= 50) return 2;
        elseif ($netPoints >= 30) return 1;
        return 0;
    }
}
