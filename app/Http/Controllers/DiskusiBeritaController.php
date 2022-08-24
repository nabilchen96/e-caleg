<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DiskusiBerita;
use Auth;
use Illuminate\Support\Facades\Validator;

class DiskusiBeritaController extends Controller
{
    public function index(){

        return view('backend.diskusi_berita.index');
    }

    public function data(){

        $data_user = Auth::user();

        $diskusi = DB::table('diskusi_beritas')
                    ->join('users as k', 'k.id', '=', 'diskusi_beritas.id_user') //komentar
                    ->join('beritas', 'beritas.id', '=', 'diskusi_beritas.id_berita')
                    ->join('users as p', 'p.id', '=', 'beritas.id_user') //pemilik produk
                    ->select(
                        'diskusi_beritas.*', 
                        'k.name', 
                        'beritas.judul'
                    );

        if($data_user->role == 'Admin'){

            $diskusi = $diskusi->get();
        }else{

            $diskusi = $diskusi->where('k.id', $data_user->id)->orWhere('p.id', $data_user->id)->get();
        }


        return response()->json(['data' => $diskusi]);
    }

    public function dataDetail($id){

        $diskusi = DB::table('diskusi_beritas')
                    ->join('users', 'users.id', '=', 'diskusi_beritas.id_user')
                    ->join('beritas', 'beritas.id', '=', 'diskusi_beritas.id_berita')
                    ->select(
                        'diskusi_beritas.*', 
                        'users.name', 
                        'beritas.judul'
                    )
                    ->where('diskusi_beritas.id_berita', $id)
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
            $data = DiskusiBerita::create([
                'pesan'     => $request->pesan, 
                'id_berita' => $request->id_berita,
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

        $data = DiskusiBerita::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
