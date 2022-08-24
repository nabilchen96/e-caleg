<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Slider;
use Auth;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index(){
        return view('backend.slider.index');
    }

    public function data(){

        $slider = Slider::all();

        return response()->json(['data' => $slider]);
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'gambar'        => 'required|mimes:png,jpg,JPEG,PNG|max: 1024',

            'keterangan'    => 'required',
            'aktif'         => 'required', 
            'url'           => 'required',   
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //wajib
        $gambar       = $request->gambar;
        $nama_gambar  = date('YmdHis.').$gambar->extension();
        $gambar->move('gambar_slider', $nama_gambar);

        //proses insert
        $insert = Slider::create([
            'keterangan'=> $request->keterangan,  
            'aktif'     => $request->aktif, 
            'gambar'    => $nama_gambar,
            'url'       => $request->url,
        ]);

        return response()->json([
            'responCode'  => 1,
            'message'       => 'Success!',
            'data'          => $insert 
        ]);
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'gambar'        => 'nullable|mimes:png,jpg,JPEG,PNG|max: 1024',
            'id'            => 'required',
            'keterangan'    => 'required',
            'aktif'         => 'required', 
            'url'           => 'required',  
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        //wajib
        if($request->gambar){
            $gambar       = $request->gambar;
            $nama_gambar  = date('YmdHis.').$gambar->extension();
            $gambar->move('gambar_slider', $nama_gambar);
        }

        //proses Update
        $berita = Slider::find($request->id);
        $insert = $berita->update([
            'keterangan'=> $request->keterangan,  
            'aktif'     => $request->aktif, 
            'gambar'    => $nama_gambar ?? $berita->gambar,
            'url'       => $request->url,
        ]);

        return response()->json([
            'responCode'  => 1,
            'message'       => 'Success!',
            'data'          => $insert 
        ]);
    }

    public function delete(Request $request){

        $data = Slider::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
