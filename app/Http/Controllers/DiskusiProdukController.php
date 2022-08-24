<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DiskusiProduk;
use Auth;
use Illuminate\Support\Facades\Validator;

class DiskusiProdukController extends Controller
{
    public function index(){

        return view('backend.diskusi_produk.index');
    }

    public function data(){

        $data_user = Auth::user();

        $diskusi = DB::table('diskusi_produks')
                    ->join('users as k', 'k.id', '=', 'diskusi_produks.id_user') //komentar
                    ->join('produks', 'produks.id', '=', 'diskusi_produks.id_produk')
                    ->join('users as p', 'p.id', '=', 'produks.id_user') //pemilik produk
                    ->select(
                        'diskusi_produks.*', 
                        'k.name', 
                        'produks.judul_produk'
                    );

        if($data_user->role == 'Admin'){

            $diskusi = $diskusi->get();
        }else{

            $diskusi = $diskusi->where('k.id', $data_user->id)->orWhere('p.id', $data_user->id)->get();
        }


        return response()->json(['data' => $diskusi]);
    }

    public function dataDetail($id){

        $diskusi = DB::table('diskusi_produks')
                    ->join('users', 'users.id', '=', 'diskusi_produks.id_user')
                    ->join('produks', 'produks.id', '=', 'diskusi_produks.id_produk')
                    ->select(
                        'diskusi_produks.*', 
                        'users.name', 
                        'produks.judul_produk'
                    )
                    ->where('diskusi_produks.id_produk', $id)
                    ->get();


        return response()->json(['data' => $diskusi]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'pesan' => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{
            $data = DiskusiProduk::create([
                'pesan'     => $request->pesan, 
                'id_produk' => $request->id_produk,
                'id_user'   => Auth::user()->id ?? '2'
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Ditambah'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request){

        $data = DiskusiProduk::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
