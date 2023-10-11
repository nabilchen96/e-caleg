<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {

        if(Request('tanggal_awal')){
        
            $data = DB::table('absensis')
            ->join('users', 'users.id', '=', 'absensis.id_pegawai')
            ->select(
                'absensis.*', 
                'users.name'
            )
            ->where('absensis.id_pegawai', Auth::id())
            ->whereBetween('absensis.tanggal', [Request('tanggal_awal'), Request('tanggal_akhir')])
            ->orderBy('created_at', 'DESC')->get();

        }else{

            $data = DB::table('absensis')
            ->join('users', 'users.id', '=', 'absensis.id_pegawai')
            ->select(
                'absensis.*', 
                'users.name'
            )
            ->where('absensis.id_pegawai', Auth::id())
            ->orderBy('created_at', 'DESC')->get();   
        }
        return view('backend.dashboard', [
            'data'  => $data
        ]);
    }
}