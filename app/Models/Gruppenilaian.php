<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gruppenilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_grup', 'status'
    ];

    public function grupdetail()
    {
    	return $this->hasOne('App\Models\Detail_grup_penilaian');
    }
}
