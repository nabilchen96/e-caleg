<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Suara;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Imports\SuaraImport;
use Maatwebsite\Excel\Facades\Excel; 
use App\Exports\SuaraCokExport;
use App\Exports\SuaraExport;

class SuaraController extends Controller
{
    public function index()
    {

        $data = DB::table('suaras as s')
            ->leftJoin('calons as c', 'c.id', '=', 's.id_calon')
            ->leftJoin('partais as p', 'p.id', '=', 'c.id_partai')
            ->leftJoin('tps as t', 't.id', '=', 's.id_tps')
            ->leftJoin('kelurahans as k', 'k.id', '=', 't.id_kelurahan')
            ->leftJoin('kecamatans as kc', 'kc.id', '=', 'k.id_kecamatan')
            ->leftJoin('users as u', 'u.id', '=', 's.id_user')
            ->leftJoin('jadwals as j', 'j.id', '=', 's.id_jadwal')
            ->where('j.status', 'AKTIF')
            ->select(
                's.*',
                'c.nama_calon',
                'p.partai',
                't.nama_tps',
                't.max_surat_suara',
                'k.kelurahan',
                'kc.kecamatan',
                'u.name',
            )
            ->orderBy('s.id_calon', 'ASC')
            ->orderBy('t.nama_tps', 'ASC')
            ->orderBy('k.id', 'ASC')
            ->get();

        return view('backend.suara.index', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id_calon' => 'required',
        ]);

        //LOGO
        if ($request->file) {
            $file = $request->file;
            $nama_file = '1' . date('YmdHis.') . $file->extension();
            $file->move('file_c1', $nama_file);
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
            $data = Suara::create([
                'id_calon' => $request->id_calon,
                'id_tps' => $request->id_tps,
                'id_user' => Auth::id(),
                'file_c1' => @$nama_file,
                'id_jadwal' => @$jadwal->id,
                'total_suara_sah'   => $request->total_suara_sah, 
                'total_suara_tidak_sah' => $request->total_suara_tidak_sah
            ]);

            $data = [
                'responCode' => 1,
                'respon' => 'Data Sukses Ditambah'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request)
    {

        $data = Suara::find($request->id)->delete();

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function import(Request $request){
        
        //melakukan import file
        Excel::import(new SuaraImport, request()->file('file'));

        //jika berhasil kembali ke halaman sebelumnya
        return back();
    }

    public function export()
    {
        return Excel::download( new SuaraExport, 'Data_Suara.xlsx');
    }
}
