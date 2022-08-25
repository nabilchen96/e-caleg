<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aturan_nilai_samapta;

class SamaptaController extends Controller
{
    public function index(){
        $users  = Aturan_nilai_samapta::all();
        return response([
            $users
        ]);
    }
}
