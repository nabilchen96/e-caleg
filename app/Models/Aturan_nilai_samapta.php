<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan_nilai_samapta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nilai', 'untuk', 'password', 'jenis_samapta','ukuran_menit','jumlah', 'status'
    ];
}
