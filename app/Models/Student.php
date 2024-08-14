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
    protected $fillable = ['name', 'nis', 'password', 'token', 'email', 'kelas', 'jurusan', 'angkatan', 'sekolah', 'tanggal', 'tpoin', 'bintang', 'reducepoin_prestasi', 'reducepoin_pelanggaran'];

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
        $this->refresh(); // Ensure the model has the latest data

        // Calculate only confirmed points
        $totalPrestasi = $this->poins()->where('jenis', 'Prestasi')->where('konfirmasi', 'Benar')->sum('poin');
        $totalHukuman = $this->poins()->where('jenis', 'Hukuman')->where('konfirmasi', 'Benar')->sum('poin');

        // Apply any reductions to prestasi points before updating tpoin
        $totalPrestasi = $this->applyReductions($totalPrestasi);

        // Update tpoin based on the net prestasi and hukuman points
        $this->tpoin = max(0, $totalPrestasi - $totalHukuman);
        $this->bintang = $this->calculateStars();
        $this->save();
    }

    private function applyReductions($totalPrestasi) {
        $reductions = Reduce::all(); // Assuming Reduce is a model that holds reduction rules
        foreach ($reductions as $reduce) {
            if ($totalPrestasi >= $reduce->poin_min && $totalPrestasi <= $reduce->poin_max) {
                $totalPrestasi *= (1 - ($reduce->reducepoin_prestasi / 100));
                break; // Apply only the most relevant reduction
            }
        }
        return $totalPrestasi;
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
