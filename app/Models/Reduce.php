<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reduce extends Model
{
    use HasFactory;

    protected $fillable = ['poin_min', 'poin_max', 'reducepoin_prestasi', 'reducepoin_pelanggaran'];
}
