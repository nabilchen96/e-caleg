<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index(){

        $tipe = request('tipe');

        $pengaturan = Pengaturan::first();

        
        return response()->json([
            'success' => true,
            'message' => 'Get data successfully',
            'data' => $pengaturan
        ], 200);
    }
}
