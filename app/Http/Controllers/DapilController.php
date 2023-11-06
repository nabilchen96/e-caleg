<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Dapil;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Imports\DapilImport;
use Maatwebsite\Excel\Facades\Excel; //library excel
use App\Exports\DapilExport;

class DapilController extends Controller
{
    public function index()
    {
        return view('backend.dapil.index');
    }

    public function data()
    {

        $dapil = DB::table('dapils');
        $dapil = $dapil->get();


        return response()->json(['data' => $dapil]);
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'dapil' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {
            $data = Dapil::create([
                'kabupaten' => $request->kabupaten,
                'jumlah_kursi' => $request->jumlah_kursi,
                'dapil' => $request->dapil,
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

            $dapil = Dapil::find($request->id);
            $data = $dapil->update([
                'kabupaten' => $request->kabupaten,
                'jumlah_kursi' => $request->jumlah_kursi,
                'dapil' => $request->dapil,
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

        $data = Dapil::find($request->id)->delete();

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function import(Request $request){
        
        //melakukan import file
        Excel::import(new DapilImport, request()->file('file'));

        //jika berhasil kembali ke halaman sebelumnya
        return back();
    }

    public function export()
    {
        return Excel::download(new DapilExport, 'Data_dapil.xlsx');
    }
}
