<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Kecamatan;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Imports\KecamatanImport;
use Maatwebsite\Excel\Facades\Excel; //library excel
use App\Exports\KecamatanExport;

class KecamatanController extends Controller
{
    public function index()
    {
        return view('backend.kecamatan.index');
    }

    public function data()
    {

        $data = DB::table('kecamatans as k')
                ->join('dapils as d', 'd.id', '=', 'k.id_dapil')
                ->select(
                    'k.*', 
                    'd.dapil'
                );

        $data = $data->get();


        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'kecamatan' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {
            $data = Kecamatan::create([
                'id_dapil' => $request->id_dapil,
                'kecamatan' => $request->kecamatan,
                'kode_kecamatan' => $request->kode_kecamatan,
                'jumlah_dpt' => $request->jumlah_dpt
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

            $dapil = Kecamatan::find($request->id);
            $data = $dapil->update([
                'id_dapil' => $request->id_dapil,
                'kecamatan' => $request->kecamatan,
                'kode_kecamatan' => $request->kode_kecamatan,
                'jumlah_dpt' => $request->jumlah_dpt
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

        $data = Kecamatan::find($request->id)->delete();

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function import(Request $request){
        
        //melakukan import file
        Excel::import(new KecamatanImport, request()->file('file'));

        //jika berhasil kembali ke halaman sebelumnya
        return back();
    }

    public function export()
    {
        return Excel::download(new KecamatanExport, 'Data_kecamatan.xlsx');
    }
}
