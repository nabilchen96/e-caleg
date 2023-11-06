<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Partai;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PartaiController extends Controller
{
    public function index()
    {
        return view('backend.partai.index');
    }

    public function data()
    {

        $data = DB::table('partais');
        $data = $data->get();


        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'partai' => 'required',
        ]);

        //LOGO
        if($request->file){
            $file = $request->file;
            $nama_file = '1' . date('YmdHis.') . $file->extension();
            $file->move('file_logo', $nama_file);
        }

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {
            $data = Partai::create([    
                'partai' => $request->partai,
                'logo' => @$nama_file,
                'keterangan' => $request->keterangan
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

        //LOGO
        if($request->file){
            $file = $request->file;
            $nama_file = '1' . date('YmdHis.') . $file->extension();
            $file->move('file_logo', $nama_file);
        }

        if ($validator->fails()) {
            $data = [
                'responCode' => 0,
                'respon' => $validator->errors()
            ];
        } else {

            $kel = Partai::find($request->id);
            $data = $kel->update([
                'partai' => $request->partai,
                'logo' => @$nama_file ?? $kel->logo,
                'keterangan' => $request->keterangan
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

        $data = Partai::find($request->id)->delete();

        $data = [
            'responCode' => 1,
            'respon' => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
