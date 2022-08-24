<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends Controller
{
    public function index(){

        $data_user      = Auth::user();

        $total_produk   = DB::table('produks')->count(); //all user

        $produk_user    = DB::table('produks')->where('id_user', $data_user->id)->count();

        $berita_user    = DB::table('beritas')->where('id_user', $data_user->id)->count();

        //diskusi
        $diskusi_produk = DB::table('diskusi_produks')->where('id_user', $data_user->id)->count();
        $diskusi_berita = DB::table('diskusi_beritas')->where('id_user', $data_user->id)->count();

        return view('backend.dashboard',[
            'total_produk'  => $total_produk, 
            'produk_user'   => $produk_user,
            'berita_user'   => $berita_user,
            'diskusi_produk'=> $diskusi_produk, 
            'diskusi_berita'=> $diskusi_berita
        ]);
    }
}
