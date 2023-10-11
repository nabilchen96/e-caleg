<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Shift;
use Auth;
use Illuminate\Support\Facades\Validator;

class ShiftController extends Controller
{
    public function index(){
        return view('backend.shift.index');
    }

    public function data(){
        
        $data = Shift::all();

        return response()->json(['data' => $data]);
    }

    public function store(Request $request){


        $validator = Validator::make($request->all(), [
            'nama_shift'        => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{
            $data = Shift::create([
                'nama_shift'        => $request->nama_shift,
                'awal_masuk'        => $request->awal_masuk,
                'terlambat_masuk'   => $request->terlambat_masuk,
                'batas_masuk'       => $request->batas_masuk,
                'awal_pulang'       => $request->awal_pulang,
                'batas_pulang'      => $request->batas_pulang,
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
            'nama_shift'        => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{

            $shift = Shift::find($request->id);
            $data = $shift->update([
                'nama_shift'        => $request->nama_shift,
                'awal_masuk'        => $request->awal_masuk,
                'terlambat_masuk'   => $request->terlambat_masuk,
                'batas_masuk'       => $request->batas_masuk,
                'awal_pulang'       => $request->awal_pulang,
                'batas_pulang'      => $request->batas_pulang,
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request){

        $data = Shift::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
