<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\detail_grup_penilaian;
use App\Models\User;
use App\Models\Gruppenilaian;
use Illuminate\Support\Facades\Validator;

class Detail_grup_penilaianController extends Controller
{
    public function index($id_grup){
        $grup = Gruppenilaian::where('id',$id_grup)->first();
        $user = User::all();
        
        return view('backend.detail_gruppenilaian.index', ['grup'=>$grup,'user' => $user]);
    }

    public function data(){
        

        $detailgrup = DB::table('detail_grup_penilaians')
                        ->leftjoin('gruppenilaians', 'gruppenilaians.id', '=', 'detail_grup_penilaians.gruppenilaian_id')
                        ->leftjoin('users', 'users.id', '=', 'detail_grup_penilaians.user_id')
                        ->get();

        return response()->json(['data' => $detailgrup]);
    }

    public function store(Request $request){


        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            // 'status'      => 'required'
        ]);

        if($validator->fails()){
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        }else{
            $data = Detail_grup_penilaian::insert([
                'user_id'     => $request->nama,
                'status'   => "",
                'gruppenilaian_id' => $request->id_grup,
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

            $detailgrup = Detail_grup_penilaian::find($request->id);
            $data = $detailgrup->update([
                'user_id'     => $request->nama,
                'status'   => "",
                'gruppenilaian_id' => $request->id_grup,
                ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request){

        $data = Detail_grup_penilaian::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }
}
