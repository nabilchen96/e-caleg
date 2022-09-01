<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ListPesertaInput;
use Exception;
use Illuminate\Http\Request;
use DB;

class ListPesertaInputController extends Controller
{
    public function index($id)
    {
        // $data = ListPesertaInput::where('panitia_id', $id)->where('status', '0')->get();
        $data = DB::table('list_peserta_inputs')
        ->select('list_peserta_inputs.*', 'users.name')
        ->join('users','users.id','list_peserta_inputs.peserta_id')
        ->where('panitia_id', $id)->where('status', '0')
        ->get();

        return response()->json([
            'success' => true,
            'message' => 'Get data successfully',
            'data' => $data
        ], 200);
    }

    public function cekPeserta($peserta_id, $detail_group_penilaian_id)
    {
        $cekData = ListPesertaInput::where('peserta_id', $peserta_id)->where('detail_group_penilaian_id', $detail_group_penilaian_id)->first();

        if ($cekData) {
            return true;
        } else {
            return false;
        }
    }

    public function store(Request $request)
    {

        try {
            if ($this->cekPeserta($request->peserta_id, $request->detail_group_penilaian_id)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data sudah ada',
                ], 500);
            } else {
                $insert = ListPesertaInput::create([
                    'peserta_id' => (string)$request->peserta_id,
                    'grup_penilaian_id' => (string)$request->grup_penilaian_id,
                    'panitia_id' => (string)$request->panitia_id,
                    'nomor' => (string)$request->nomor,
                    'detail_group_penilaian_id' => $request->detail_group_penilaian_id
                ]);

                if ($insert) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Store data successfully',
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Store data failed',
                    ], 500);
                }
            }
        } catch (Exception $error) {
            return response()->json([
                'success' => false,
                'message' => $error->getMessage(),
            ], 500);
        }
    }
}
