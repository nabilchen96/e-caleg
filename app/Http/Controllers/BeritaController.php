<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Berita;
use Auth;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    public function index(){

        return view('backend.berita.index');
    }

    public function data(){
        

        $data_user = Auth::user();

        $berita = Berita::join('users', 'users.id', '=', 'beritas.id_user')
                    ->select(
                        'users.name', 
                        'beritas.*'
                    );

        if($data_user->role == 'Admin'){
            
            $berita = $berita->get();
        }else{

            $berita = $berita->where('beritas.id_user', $data_user->id)->get();
        }

        return response()->json(['data' => $berita]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'gambar'        => 'required|mimes:png,jpg,JPEG,PNG|max: 500',

            'judul'         => 'required',
            'deskripsi'     => 'required', 
            'kategori'      => 'required',   
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //wajib
        $gambar       = $request->gambar;
        $nama_gambar  = date('YmdHis.').$gambar->extension();
        $gambar->move('gambar_berita', $nama_gambar);

        //proses insert
        $insert = Berita::create([
            'judul'         => $request->judul, 
            'deskripsi'     => $request->deskripsi, 
            'id_user'       => Auth::user()->id ?? 2,
            'kategori'      => $request->kategori, 
            'gambar'        => $nama_gambar,
        ]);

        return response()->json([
            'responCode'  => 1,
            'message'       => 'Success!',
            'data'          => $insert 
        ]);
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'judul'         => 'required',
            'deskripsi'     => 'required', 
            'kategori'      => 'required',  
            'id'            => 'required' 
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //wajib
        if($request->gambar){
            $gambar       = $request->gambar;
            $nama_gambar  = date('YmdHis.').$gambar->extension();
            $gambar->move('gambar_berita', $nama_gambar);
        }

        //proses Update
        $berita = Berita::find($request->id);
        $insert = $berita->update([
            'judul'         => $request->judul, 
            'deskripsi'     => $request->deskripsi, 
            'id_user'       => Auth::user()->id ?? 2,
            'kategori'      => $request->kategori, 
            'gambar'        => $nama_gambar ?? $berita->gambar,
        ]);

        return response()->json([
            'responCode'  => 1,
            'message'       => 'Success!',
            'data'          => $insert 
        ]);
    }

    public function delete(Request $request){

        $data = Berita::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function detail($id){

        //detail produk
        $detail = Berita::join('users', 'users.id', '=', 'beritas.id_user')
                    ->select(
                        'users.name', 
                        'beritas.*'
                    )
                    ->where('beritas.id', $id)->first();

        //list produk
        $berita = Berita::join('users', 'users.id', '=', 'beritas.id_user')
                    ->select(
                        'users.name', 
                        'beritas.*'
                    )
                    ->inRandomOrder()->limit(8)->get();


        return view('frontend.berita-detail', [
            'berita' => $berita, 
            'detail' => $detail
        ]);
    }

    public function show(){

        //list berita
        $berita = Berita::join('users', 'users.id', '=', 'beritas.id_user')
                    ->select(
                        'users.name', 
                        'beritas.*'
                    )
                    ->inRandomOrder()->paginate(8);


        return view('frontend.berita', [
            'berita' => $berita, 
        ]);
    }
}
