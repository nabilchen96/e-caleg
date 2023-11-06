<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Kelurahan;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Imports\KelurahanImport;
use Maatwebsite\Excel\Facades\Excel; //library excel
use App\Exports\KelurahanExport;

class KelurahanController extends Controller
{
    public function index()
    {
        return view('backend.kelurahan.index');
    }

    public function data()
    {

        $data = DB::table('kelurahans as k')
                ->join('kecamatans as kc', 'kc.id', '=', 'k.id_kecamatan')
                ->select(
                    'k.*', 
                    'kc.kecamatan'
                );

        $data = $data->get();


        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'id_kecamatan' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {
            $data = Kelurahan::create([
                'id_kecamatan' => $request->id_kecamatan,
                'kelurahan' => $request->kelurahan,
            ]);

            $data = [
                'responCode' => 1,
                'respon' => 'Data Sukses Ditambah'
            ];
        }

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

            $kel = Kelurahan::find($request->id);
            $data = $kel->update([
                'id_kecamatan' => $request->id_kecamatan,
                'kelurahan' => $request->kelurahan,
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

        $data = Kelurahan::find($request->id)->delete();

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function import(Request $request){
        
        //melakukan import file
        Excel::import(new KelurahanImport, request()->file('file'));

        //jika berhasil kembali ke halaman sebelumnya
        return back();
    }

    public function export()
    {
        return Excel::download(new KelurahanExport, 'Data_kelurahan.xlsx');
    }
}
