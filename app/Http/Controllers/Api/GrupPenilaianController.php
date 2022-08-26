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
        return response([
            $data
        ]);
    }
}
