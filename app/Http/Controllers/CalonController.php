<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Calon;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Imports\CalonImport;
use Maatwebsite\Excel\Facades\Excel; //library excel
use App\Exports\CalonExport;

class CalonController extends Controller
{
    public function index()
    {
        return view('backend.calon.index');
    }

    public function data()
    {

        $data = DB::table('calons as c')
                ->leftjoin('partais as p', 'p.id', '=', 'c.id_partai')
                ->leftjoin('dapils as d', 'd.id', '=', 'c.id_dapil')
                ->leftjoin('jadwals as j', 'j.id', '=', 'c.id_jadwal')
                ->select(
                    'c.*', 
                    'p.partai', 
                    'd.dapil', 
                    'd.kabupaten'
                )
                ->where('j.status', 'AKTIF');

        $data = $data->get();


        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama_calon' => 'required',
        ]);

        //LOGO
        if($request->file){
            $file = $request->file;
            $nama_file = '1' . date('YmdHis.') . $file->extension();
            $file->move('file_foto', $nama_file);
        }

        //JADWAL
        @$jadwal = DB::table('jadwals')->first();

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {
            $data = Calon::create([    
                'nama_calon'    => $request->nama_calon, 
                'id_partai' => $request->id_partai, 
                'id_dapil'  => $request->id_dapil, 
                'foto'  => @$nama_file, 
                'id_jadwal' => @$jadwal->id
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

        //LOGO
        if($request->file){
            $file = $request->file;
            $nama_file = '1' . date('YmdHis.') . $file->extension();
            $file->move('file_foto', $nama_file);
        }

        //JADWAL
        @$jadwal = DB::table('jadwals')
                    ->where('status', 'AKTIF')
                    ->first();

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {

            $kel = Calon::find($request->id);
            $data = $kel->update([
                'nama_calon'    => $request->nama_calon, 
                'id_partai' => $request->id_partai, 
                'id_dapil'  => $request->id_dapil, 
                'foto'  => @$nama_file ?? $kel->foto, 
                'id_jadwal' => $jadwal->id
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

        $data = Calon::find($request->id)->delete();

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function import(Request $request){
        
        //melakukan import file
        Excel::import(new CalonImport, request()->file('file'));

        //jika berhasil kembali ke halaman sebelumnya
        return back();
    }

    public function export()
    {
        return Excel::download(new CalonExport, 'Data_calon.xlsx');
    }
}
