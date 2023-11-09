<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Anggota;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class SaksiController extends Controller
{
    public function index()
    {
        return view('backend.saksi.index');
    }

    public function data()
    {
        $data = DB::table('anggotas as a')
            ->leftjoin('users as u', 'u.id', '=', 'a.id_user')
            ->leftjoin('calons as c', 'c.id', '=', 'a.id_calon')
            ->leftjoin('partais as p', 'p.id', '=', 'c.id_partai')
            ->leftjoin('anggotas as an', 'an.id', '=', 'a.id_anggota')
            ->leftjoin('tps as t', 't.id', '=', 'a.id_tps')
            ->leftjoin('kelurahans as k', 'k.id', '=', 't.id_kelurahan')
            ->where('a.status', 'SAKSI')
            ->select(
                'a.*',
                'k.kelurahan',
                'c.nama_calon',
                'p.partai',
                'u.email',
                'an.nama as nama_anggota',
                't.nama_tps'
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
                'role' => 'SAKSI',
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $tps = DB::table('tps')->where('id', $request->id_tps)->first();

            Anggota::create([
                'nama' => $request->nama,
                'kode_anggota' => $request->kode_anggota,
                'nik' => $request->nik,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'id_user' => $data->id,
                'id_calon' => $request->id_calon,
                'status' => 'SAKSI',
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'id_anggota' => $request->id_anggota,
                'id_tps' => $request->id_tps,
                'id_kelurahan' => $tps->id_kelurahan,
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
                'role' => 'SAKSI',
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
                'id_user' => $user->id,
                'id_calon' => $request->id_calon,
                'status' => 'SAKSI',
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'id_anggota' => $request->id_anggota,
                'id_tps' => $request->id_tps,
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
