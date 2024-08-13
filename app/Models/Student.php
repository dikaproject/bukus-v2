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

    public function totalConfirmedPrestasiPoints()
    {
        return $this->poins()->where('jenis', 'Prestasi')->where('konfirmasi', 'Benar')->sum('poin');
    }

    public function calculateStars()
    {
        $netPoints = $this->tpoin;
        if ($netPoints >= 100) return 5;
        elseif ($netPoints >= 85) return 4;
        elseif ($netPoints >= 70) return 3;
        elseif ($netPoints >= 50) return 2;
        elseif ($netPoints >= 30) return 1;
        else return 0;
    }

    public function getTotalPrestasiAttribute()
    {
        return $this->poins()->where('jenis', 'Prestasi')->sum('poin');
    }

    // Method to get total "Hukuman" points
    public function getTotalHukumanAttribute()
    {
        return $this->poins()->where('jenis', 'Hukuman')->sum('poin');
    }
}
