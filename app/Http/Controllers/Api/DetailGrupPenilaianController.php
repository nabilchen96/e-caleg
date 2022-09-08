<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class DetailGrupPenilaianController extends Controller
{
    public function index($id){

        $data  = DB::table('detail_grup_penilaians')
                    ->leftjoin('gruppenilaians', 'gruppenilaians.id', '=', 'detail_grup_penilaians.gruppenilaian_id')
                    ->leftjoin('users', 'users.id', '=', 'detail_grup_penilaians.user_id')
                    ->where('gruppenilaians.id', $id)
                    ->where('users.role', 'Peserta')
                    ->select(
                        'gruppenilaians.id as id_grup_penilaian',
                        'detail_grup_penilaians.user_id as id_user',
                        'detail_grup_penilaians.id as id_detail_grup_penilaian',
                        'users.name', 
                        'users.role',
                    )
                    ->get();

        return response()->json([
            'success' => true,
            'message' => 'Get data successfully',
            'data' => $data
        ], 200);

    }
}
