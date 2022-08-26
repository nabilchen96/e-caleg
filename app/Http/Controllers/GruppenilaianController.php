<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Gruppenilaian;
use Illuminate\Support\Facades\Validator;

class GruppenilaianController extends Controller
{
    public function index(){
        return view('backend.gruppenilaians.index');
    }

    public function data(){
        
        $gruppenilaian = DB::table('gruppenilaians')
                            ->leftjoin('detail_grup_penilaians', 'detail_grup_penilaians.gruppenilaian_id', '=', 'gruppenilaians.id')
                            ->leftjoin('users', 'users.id', 'detail_grup_penilaians.user_id')
                            ->select(
                                'gruppenilaians.*',
                                DB::Raw('count(case when users.role = "Panitia" then 1 end) as total_panitia'),
                                DB::Raw('count(case when users.role = "Peserta" then 1 end) as total_peserta')
                            )
                            ->groupBy('gruppenilaians.id')
                            ->get();

        return response()->json(['data' => $gruppenilaian]);
    }

    public function store(Request $request){


        $validator = Validator::make($request->all(), [
            'nama_grup'   => 'required',
            'status'      => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{
            $data = Gruppenilaian::insert([
                'nama_grup'     => $request->nama_grup,
                'status'        => $request->status,
                'peserta'       => " ",
                'panitia'       => " "
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Ditambah'
            ];
        }

        return response()->json($data);
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'id'    => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{

            $gruppenilaian = Gruppenilaian::find($request->id);
            $data = $gruppenilaian->update([
                    'nama_grup'     => $request->nama_grup,
                    'status'        => $request->status,
                ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request){

        $data = Gruppenilaian::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
