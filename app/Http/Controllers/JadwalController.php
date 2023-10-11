<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Jadwal;
use Auth;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    public function index(){
        return view('backend.jadwal.index');
    }

    public function data(){
        
        $data = DB::table('jadwals')
                ->join('users', 'users.id', '=', 'jadwals.id_pegawai')
                ->join('shifts', 'shifts.id', '=', 'jadwals.id_shift')
                ->select(
                    'jadwals.*', 
                    'users.name', 
                    'shifts.nama_shift'
                )
                ->get();

        return response()->json(['data' => $data]);
    }

    public function store(Request $request){


        $validator = Validator::make($request->all(), [
            'id_pegawai'  => 'required',
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{
            $data = Jadwal::create([
                'id_pegawai'    => $request->id_pegawai, 
                'id_shift'      => $request->id_shift, 
                'tanggal_awal_shift'    => $request->tanggal_awal_shift, 
                'tanggal_akhir_shift'   => $request->tanggal_akhir_shift
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
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{

            $jadwal = Jadwal::find($request->id);
            $data = $jadwal->update([
                'id_pegawai'    => $request->id_pegawai, 
                'id_shift'      => $request->id_shift, 
                'tanggal_awal_shift'    => $request->tanggal_awal_shift, 
                'tanggal_akhir_shift'   => $request->tanggal_akhir_shift
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request){

        $data = jadwal::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
