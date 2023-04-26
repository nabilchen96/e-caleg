<?php

namespace App\Http\Controllers;

use App\Models\PengujianSsdAgregateHalus;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PengujianssdhalusController extends Controller
{
    public function index()
    {
        return view('backend.ssdhalus.index');
    }

    public function data()
    {

        $beratisi = DB::table('pengujian_ssd_agregate_haluses');
        $beratisi = $beratisi->get();

        return response()->json(['data' => $beratisi]);
    }

    public function kode_uji()
    {
        $datas =  DB::select("SELECT MAX(RIGHT(kode_uji, 4)) as lastid FROM pengujian_ssd_agregate_haluses");
        $rep = "";

        if ($datas) {
            foreach ($datas as $k) {
                $tmp = ((int)$k->lastid) + 1;
                $rep = sprintf("%04s", $tmp);
            }
        } else {

            $rep = "0001";
        }

        return $rep;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pasir_asal'   => 'required',
            'berat_pasir_tabung_air'      => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        } else {
            $A = $request->berat_pasir_tabung_air;
            $B = $request->berat_pasir_ssd;
            $C = $request->berat_tabung_air;
            $D = $request->berat_jenis_tungku;

            $berat_jenis_tungku = $D / (($C + $B) - $A);
            $ssd_pasir_kering_tungku =$D / (($C + $B) - $A);

            $data = PengujianSsdAgregateHalus::create([
                'kode_uji'              => "SSDH - " . $this->kode_uji(),
                'pasir_asal'            => $request->pasir_asal, 
                'berat_pasir_tabung_air'     => $request->berat_pasir_tabung_air, //A
                'berat_pasir_ssd'         => $request->berat_pasir_ssd, //B
                'berat_tabung_air'                    => $request->berat_tabung_air, //C
                'berat_jenis_tungku' => $berat_jenis_tungku, //D
                'ssd_pasir_kering_tungku' => $ssd_pasir_kering_tungku,
                'berat_jenis_tungku' => $berat_jenis_tungku,
                'user_id'               => Auth::user()->id,
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Ditambah'
            ];
        }

        return response()->json($data);
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id'    => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        } else {
            $A = $request->berat_pasir_tabung_air;
            $B = $request->berat_pasir_ssd;
            $C = $request->berat_tabung_air;
            $D = $request->berat_jenis_tungku;

            $berat_jenis_tungku = $D / (($C + $B) - $A);
            $ssd_pasir_kering_tungku =$D / (($C + $B) - $A);
            
            $user = PengujianSsdAgregateHalus::find($request->id);
            $data = $user->update([
                'berat_pasir_tabung_air'     => $request->berat_pasir_tabung_air, //A
                'berat_pasir_ssd'         => $request->berat_pasir_ssd, //B
                'berat_tabung_air'                    => $request->berat_tabung_air, //C
                'berat_jenis_tungku' => $berat_jenis_tungku, //D
                'ssd_pasir_kering_tungku' => $ssd_pasir_kering_tungku,
                'berat_jenis_tungku' => $berat_jenis_tungku,
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function delete(Request $request)
    {

        $data = PengujianSsdAgregateHalus::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function cetakBerat(Request $request)
    {

        $data = PengujianSsdAgregateHalus::find($request->id);

        return view('backend.ssdhalus.cetak',compact('data'));
    }
}
