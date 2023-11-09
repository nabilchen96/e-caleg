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

class RelawanController extends Controller
{
    public function index()
    {
        return view('backend.relawan.index');
    }

    public function data()
    {
        $data = DB::table('anggotas as a')
            ->leftjoin('kelurahans as k', 'k.id', '=', 'a.id_kelurahan')
            ->leftjoin('users as u', 'u.id', '=', 'a.id_user')
            ->leftjoin('calons as c', 'c.id', '=', 'a.id_calon')
            ->leftjoin('partais as p', 'p.id', '=', 'c.id_partai')
            ->leftjoin('anggotas as an', 'an.id', '=', 'a.id_anggota')
            ->where('a.status', 'RELAWAN')
            ->select(
                'a.*',
                'k.kelurahan',
                'c.nama_calon',
                'p.partai',
                'u.email', 
                'an.nama as nama_anggota'
            )
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
                'role' => 'RELAWAN',
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
                'status' => 'RELAWAN',
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'id_anggota' => $request->id_anggota
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
                'role' => 'RELAWAN',
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
                'status' => 'RELAWAN',
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'id_anggota' => $request->id_anggota
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
}
