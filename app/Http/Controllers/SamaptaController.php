<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Aturan_nilai_samapta;

class SamaptaController extends Controller
{
    public function index(){
        return view('backend.samapta.index');
    }

    public function data(){
        
        $samapta = Aturan_nilai_samapta::all();

        return response()->json(['data' => $samapta]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'jenis'   => 'required',
            'ukuran'  => 'required',
            'jumlah'  => 'required',
            'untuk'   => 'required',
            'nilai'   => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{
            $data = Aturan_nilai_samapta::insert([
                'jenis_samapta'   => $request->jenis_samapta,
                'ukuran_menit'    => $request->ukuran_menit,
                'jumlah'          => $request->jumlah,
                'untuk'           => $request->untuk,
                'nilai'           => $request->nilai

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

            $samapta = Aturan_nilai_samapta::find($request->id);
            $data = Aturan_nilai_samapta::insert([
                'jenis_samapta'   => $request->jenis_samapta,
                'ukuran_menit'    => $request->ukuran_menit,
                'jumlah'          => $request->jumlah,
                'untuk'           => $request->untuk,
                'nilai'           => $request->nilai

            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request){

        $data = Aturan_nilai_samapta::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
