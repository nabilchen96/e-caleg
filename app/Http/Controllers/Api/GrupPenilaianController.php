<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Gruppenilaian;
use Illuminate\Support\Facades\Validator;

class GrupPenilaianController extends Controller
{
    public function index(){
        $data  = Gruppenilaian::all();
        return response()->json([
            $data
        ]);
    }

    public function grupAktif(){
        
        $data = Gruppenilaian::where('status','Aktif')->first();

        return response()->json([
            'success' => true,
            'message' => 'Get data successfully',
            'data' => $data
        ], 200);
    }
}
