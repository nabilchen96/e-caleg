<?php

namespace App\Http\Controllers;

use App\Models\DokumenReferensi;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class DokumenReferensiController extends Controller
{
    public function index(){
        return view('backend.dokumen_referensi.index');
    }

    public function data(){
        
        $user = DB::table('dokumen_referensis');
        $user = $user->get();

        
        return response()->json(['data' => $user]);
    }

    public function store(Request $request){


        $validator = Validator::make($request->all(), [
            'judul'   => 'required',
            'link_file'      => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{
            $data = DokumenReferensi::create([
                'judul'          => $request->judul,
                'link_file'         => $request->link_file,
                'status_publish'    => $request->status_publish
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Ditambah'
            ];
        }

        return response()->json($data);
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'id'    => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{

            $user = DokumenReferensi::find($request->id);
            $data = $user->update([
                'judul'      => $request->judul,
                'link_file'     => $request->link_file,
                'status_publish'    => $request->status_publish
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request){

        $data = DokumenReferensi::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function referensi(){


        $data = DB::table('dokumen_referensis')->where('status_publish', '1');
        $data = $data->get();

        return view('frontend.referensi', [
            'data'  => $data
        ]);
    }
}
