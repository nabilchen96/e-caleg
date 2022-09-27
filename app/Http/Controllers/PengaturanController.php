<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class PengaturanController extends Controller
{
    public function index(){
        return view('backend.pengaturan.index');
    }

    public function data(){
        
        $user = DB::table('pengaturans');

        $user = $user->get();

        
        return response()->json(['data' => $user]);
    }

    public function store(Request $request){


        $validator = Validator::make($request->all(), [
            'waktu_lari'   => 'required',
            'waktu_lainnya'      => 'required',
            'batas_lintasan'      => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{
            $data = Pengaturan::insert([
                'waktu_lari'          => $request->waktu_lari,
                'waktu_lainnya'         => $request->waktu_lainnya,
                'batas_lintasan'            => $request->batas_lintasan,
                
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

            $user = Pengaturan::find($request->id);
            $data = $user->update([
                'waktu_lari'      => $request->waktu_lari,
                'waktu_lainnya'     => $request->waktu_lainnya,
                'batas_lintasan'        => $request->batas_lintasan,
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request){

        $data = Pengaturan::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
