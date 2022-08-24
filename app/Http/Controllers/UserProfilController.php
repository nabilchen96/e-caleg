<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\UserProfil;
use App\Models\Produk;

class UserProfilController extends Controller
{
    public function detail($id){

        $data = DB::table('users')
                ->leftjoin('user_profils', 'user_profils.id_user', '=', 'users.id')
                ->select(
                    'users.name', 
                    'users.id as user_id',
                    'user_profils.*'
                )
                ->where('users.id', $id)
                ->first();

        return view('backend.user-profil.detail', ['data'    => $data]);
    }

    public function store(Request $request){

        // dd($request->all());

        if($request->foto_profil){
            $foto_profil       = $request->foto_profil;
            $nama_foto_profil  = date('YmdHis.').$foto_profil->extension();
            $foto_profil->move('foto_profil', $nama_foto_profil);
        }
        
        //proses insert
        $data   = UserProfil::where('id_user', $request->id_user)->first();
        $insert = UserProfil::updateOrCreate(
            [
                'id_user'           => $request->id_user
            ],
            [
                'foto_profil'       => $nama_foto_profil ?? @$data->foto_profil, 
                'deskripsi_toko'    => $request->deskripsi_toko, 
                'wa'                => $request->wa, 
                'facebook'          => $request->facebook, 
                'instagram'         => $request->instagram, 
                'tiktok'            => $request->tiktok, 
                'youtube'           => $request->youtube, 
                'alamat'            => $request->alamat
            ]
        );

        return back();
    }

    public function show($id){

        $data = DB::table('users')
                ->leftjoin('user_profils', 'user_profils.id_user', '=', 'users.id')
                ->select(
                    'users.name', 
                    'users.id as user_id',
                    'user_profils.*'
                )
                ->where('users.id', $id)
                ->first();

        //list produk
        $produk = Produk::join('users', 'users.id', '=', 'produks.id_user')
                    ->select(
                        'users.name', 
                        'produks.*'
                    )
                    ->where('produks.id_user', $id)
                    ->inRandomOrder()->paginate(8);

        return view('frontend.profil', [
            'data'    => $data, 
            'produk'  => $produk
        ]);
    }
}
