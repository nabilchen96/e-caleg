<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Jaringan;
use Auth;
use Illuminate\Support\Facades\Validator;

class JaringanController extends Controller
{
    public function index(){
        return view('backend.jaringan.index');
    }

    public function data(){
        
        $data = Jaringan::all();

        return response()->json(['data' => $data]);
    }

    public function store(Request $request){


        $validator = Validator::make($request->all(), [
            'jaringan'  => 'required',
            'ip'        => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{
            $data = Jaringan::create([
                'jaringan'  => $request->jaringan,
                'ip'        => $request->ip,
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
            'id'        => 'required', 
            'jaringan'  => 'required', 
            'ip'        => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{

            $jaringan = Jaringan::find($request->id);
            $data = $jaringan->update([
                'jaringan'      => $request->jaringan,
                'ip'      => $request->ip,
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request){

        $data = jaringan::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
