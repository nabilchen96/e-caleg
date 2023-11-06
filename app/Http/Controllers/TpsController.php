<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Tps;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Imports\TPSImport;
use Maatwebsite\Excel\Facades\Excel; 
use App\Exports\TPSExport;

class TpsController extends Controller
{
    public function index()
    {
        return view('backend.tps.index');
    }

    public function data()
    {

        $data = DB::table('tps as t')
            ->join('kelurahans as k', 'k.id', '=', 't.id_kelurahan')
            ->select(
                't.*',
                'k.kelurahan'
            );

        $data = $data->get();


        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {

        $data = Tps::create([
            'kode_tps'  => $request->kode_tps, 
            'nama_tps'  => $request->nama_tps, 
            'id_kelurahan'  => $request->id_kelurahan, 
            'max_surat_suara'   => $request->max_surat_suara
        ]);

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Ditambah'
        ];


        return response()->json($data);
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {

            $dapil = Tps::find($request->id);
            $data = $dapil->update([
                'kode_tps'  => $request->kode_tps, 
                'nama_tps'  => $request->nama_tps, 
                'id_kelurahan'  => $request->id_kelurahan, 
                'max_surat_suara'   => $request->max_surat_suara
            ]);

            $data = [
                'responCode' => 1,
                'respon' => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request)
    {

        $data = Tps::find($request->id)->delete();

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function import(Request $request){
        
        //melakukan import file
        Excel::import(new TPSImport, request()->file('file'));

        //jika berhasil kembali ke halaman sebelumnya
        return back();
    }

    public function export()
    {
        return Excel::download(new TPSExport, 'Data_tps.xlsx');
    }
}
