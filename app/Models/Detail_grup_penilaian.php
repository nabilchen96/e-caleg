<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_grup_penilaian extends Model
{
    use HasFactory;
    protected $fillable = [
        'gruppenilaian_id', 'user_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function grup()
    {
        return $this->belongsTo('App\Models\Gruppenilaian','gruppenilaian_id');
    }
    
}
