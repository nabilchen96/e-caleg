<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use App\Models\Anggota;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AnggotaImport;

class TimPemenanganController extends Controller
{
    public function index()
    {
        $tim = DB::table("anggotas")
            ->where("id_calon", Request('id_calon'))
            ->where('status', 'TIM PEMENANGAN')
            ->count();

        $relawan = DB::table("anggotas")
            ->where("id_calon", Request('id_calon'))
            ->where('status', 'RELAWAN')
            ->count();

        $pendukung = DB::table("anggotas")
            ->where("id_calon", Request('id_calon'))
            ->where('status', 'PENDUKUNG')
            ->count();

        $saksi = DB::table("anggotas")
            ->where("id_calon", Request('id_calon'))
            ->where('status', 'SAKSI')
            ->count();

        return view('backend.tim_pemenangan.index', [
            'tim' => $tim, 
            'relawan' => $relawan,
            'pendukung' => $pendukung, 
            'saksi' => $saksi
        ]);
    }

    public function data()
    {
        // dd(Request('id_calon'));

        $data = DB::table('anggotas as a')
            ->leftJoin('kelurahans as k', 'k.id', '=', 'a.id_kelurahan')
            ->leftJoin('users as u', 'u.id', '=', 'a.id_user')
            ->leftjoin('calons as c', 'c.id', '=', 'a.id_calon')
            ->leftJoin('partais as p', 'p.id', '=', 'c.id_partai')
            ->where('status', 'TIM PEMENANGAN')
            ->select(
                'a.*',
                'k.kelurahan',
                'c.nama_calon',
                'p.partai',
                'u.email'
            )
            ->where('c.id', Request('id_calon'))
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'unique:users'
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {

            $data = User::create([
                'name' => $request->nama,
                'role' => 'TIM PEMENANGAN',
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            Anggota::create([
                'nama' => $request->nama,
                'kode_anggota' => $request->kode_anggota,
                'nik' => $request->nik,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'id_kelurahan' => $request->id_kelurahan,
                'id_user' => $data->id,
                'id_calon' => $request->id_calon,
                'status' => 'TIM PEMENANGAN',
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
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

        // dd($request->all());

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {

            $user = User::find($request->id_user);
            $user->update([
                'name' => $request->nama,
                'role' => 'TIM PEMENANGAN',
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password
            ]);

            $anggota = Anggota::find($request->id);
            $anggota->update([
                'nama' => $request->nama,
                'kode_anggota' => $request->kode_anggota,
                'nik' => $request->nik,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'id_kelurahan' => $request->id_kelurahan,
                'id_user' => $user->id,
                'id_calon' => $request->id_calon,
                'status' => 'TIM PEMENANGAN',
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
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

        $data = DB::table('anggotas as a')->where('id', $request->id)->first();
        User::find($data->id_user)->delete();
        Anggota::find($request->id)->delete();

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function import(Request $request){
        
        //melakukan import file
        Excel::import(new AnggotaImport, request()->file('file'));

        //jika berhasil kembali ke halaman sebelumnya
        return back();
    }
}
