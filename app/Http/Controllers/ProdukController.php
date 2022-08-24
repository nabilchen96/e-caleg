<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Produk;
use Auth;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index(){

        return view('backend.products.index');
    }

    public function data(){

        $data_user = Auth::user();

        $produk = DB::table('produks');

        if($data_user->role == 'Admin'){
            $produk = $produk->get();
        }else{
            $produk = $produk->where('id_user', $data_user->id)->get();
        }

        return response()->json([
            'data'  => $produk, 
            'user'  => $data_user
        ]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'gambar_1'      => 'required|mimes:png,jpg,JPEG,PNG|max: 1024',
            'gambar_2'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 1024',
            'gambar_3'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 1024',
            'gambar_4'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 1024',

            'judul_produk'  => 'required',
            'deskripsi'     => 'required', 
            'jenis_produk'  => 'required', 
            'deskripsi'     => 'required',
            'harga'         => 'required',     
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //wajib
        $gambar_1       = $request->gambar_1;
        $nama_gambar_1  = '1'.date('YmdHis.').$gambar_1->extension();
        $gambar_1->move('gambar_produk', $nama_gambar_1);

        if($request->gambar_2){
            $gambar_2       = $request->gambar_2;
            $nama_gambar_2  = '2'.date('YmdHis.').$gambar_2->extension();
            $gambar_2->move('gambar_produk', $nama_gambar_2);
        }

        if($request->gambar_3){
            $gambar_3       = $request->gambar_3;
            $nama_gambar_3  = '3'.date('YmdHis.').$gambar_3->extension();
            $gambar_3->move('gambar_produk', $nama_gambar_3);
        }

        if($request->gambar_4){
            $gambar_4       = $request->gambar_4;
            $nama_gambar_4  = '4'.date('YmdHis.').$gambar_4->extension();
            $gambar_4->move('gambar_produk', $nama_gambar_4);
        }

        //proses insert
        $insert = Produk::insert([
            'judul_produk'  => $request->judul_produk, 
            'deskripsi'     => $request->deskripsi, 
            'id_user'       => Auth::user()->id ?? 2,
            'harga'         => $request->harga, 
            'jenis_produk'  => $request->jenis_produk, 
            'gambar_1'      => $nama_gambar_1,
            'gambar_2'      => $nama_gambar_2 ?? "",
            'gambar_3'      => $nama_gambar_3 ?? "",
            'gambar_4'      => $nama_gambar_4 ?? "",
            'stok'          => '9'
        ]);

        return response()->json([
            'responCode'  => 1,
            'message'       => 'Success!',
            'data'          => $insert 
        ]);
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [

            'id'            => 'required',

            'gambar_1'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 500',
            'gambar_2'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 500',
            'gambar_3'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 500',
            'gambar_4'      => 'nullable|mimes:png,jpg,JPEG,PNG|max: 500',

            'judul_produk'  => 'required',
            'deskripsi'     => 'required', 
            'jenis_produk'  => 'required', 
            'deskripsi'     => 'required',
            'harga'         => 'required',     
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        if($request->gambar_1){
            $gambar_1       = $request->gambar_1;
            $nama_gambar_1  = '1'.date('YmdHis.').$gambar_1->extension();
            $gambar_1->move('gambar_produk', $nama_gambar_1);
        }

        if($request->gambar_2){
            $gambar_2       = $request->gambar_2;
            $nama_gambar_2  = '2'.date('YmdHis.').$gambar_2->extension();
            $gambar_2->move('gambar_produk', $nama_gambar_2);
        }

        if($request->gambar_3){
            $gambar_3       = $request->gambar_3;
            $nama_gambar_3  = '3'.date('YmdHis.').$gambar_3->extension();
            $gambar_3->move('gambar_produk', $nama_gambar_3);
        }

        if($request->gambar_4){
            $gambar_4       = $request->gambar_4;
            $nama_gambar_4  = '4'.date('YmdHis.').$gambar_4->extension();
            $gambar_4->move('gambar_produk', $nama_gambar_4);
        }

        //proses insert
        $produk = Produk::find($request->id);
        $insert = $produk->update([
            'judul_produk'  => $request->judul_produk, 
            'deskripsi'     => $request->deskripsi, 
            'id_user'       => Auth::user()->id ?? 2,
            'harga'         => $request->harga, 
            'jenis_produk'  => $request->jenis_produk, 
            'gambar_1'      => $nama_gambar_1 ?? $produk->gambar_1,
            'gambar_2'      => $nama_gambar_2 ?? $produk->gambar_2,
            'gambar_3'      => $nama_gambar_3 ?? $produk->gambar_3,
            'gambar_4'      => $nama_gambar_4 ?? $produk->gambar_4,
            'stok'          => '9'
        ]);

        return response()->json([
            'responCode'  => 1,
            'message'       => 'Success!',
            'data'          => $insert 
        ]);
    }

    public function delete(Request $request){

        $data = Produk::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function pilihanUKM(Request $request){

        $data = Produk::find($request->id);

        if($data->pilihan_ukm == ''){

            $data->update([
                'pilihan_ukm'   => 1
            ]);
        }else{

            $data->update([
                'pilihan_ukm'   => ''
            ]);
        }

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function detail($id){

        //detail produk
        $detail = Produk::join('users', 'users.id', '=', 'produks.id_user')->where('produks.id', $id)->first();

        //list produk
        $produk = Produk::join('users', 'users.id', '=', 'produks.id_user')
                    ->select(
                        'users.name', 
                        'produks.*'
                    )
                    ->inRandomOrder()->limit(8)->get();


        return view('frontend.produk-detail', [
            'produk' => $produk, 
            'detail' => $detail
        ]);
    }

    public function show(Request $request){

        $cari = $_GET['cari'] ?? 'all';

        //list produk
        $produk = Produk::join('users', 'users.id', '=', 'produks.id_user')
                    ->select(
                        'users.name', 
                        'produks.*'
                    );

        if($cari == 'all'){
            $produk = $produk->paginate(8);

        }else{

            $produk = $produk->where('judul_produk', 'like', '%'.$cari.'%')->paginate(8);
            $produk->appends($request->all());
        }

        // $produk = $produk->where('judul_produk', 'like', '%'.$cari.'%')->inRandomOrder()->paginate(8);

        // dd($produk);

        return view('frontend.produk', [
            'produk' => $produk, 
        ]);
    }
}
