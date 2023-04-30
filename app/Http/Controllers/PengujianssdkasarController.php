<?php

namespace App\Http\Controllers;

use App\Models\PengujianSsdAgregateKasar;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PengujianssdkasarController extends Controller
{
    public function index()
    {
        return view('backend.ssdkasar.index');
    }

    public function data()
    {

        if (Auth::user()->role == 'Admin') {
            $beratisi = DB::table('pengujian_ssd_agregate_kasars');
        } else if (Auth::user()->role == 'Pengguna') {
            $beratisi = DB::table('pengujian_ssd_agregate_kasars')->where('user_id', Auth::user()->id);
        }
        $beratisi = $beratisi->get();

        return response()->json(['data' => $beratisi]);
    }

    public function kode_uji()
    {
        $datas =  DB::select("SELECT MAX(RIGHT(kode_uji, 4)) as lastid FROM pengujian_ssd_agregate_kasars");
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
            'kerikil_asal'   => 'required',
            'berat_kerikil_ssd'      => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        } else {
            $berat_jenis_mutlak = $request->berat_kerikil_kering_tungku / ($request->berat_kerikil_kering_tungku - $request->berat_kerikil_air);
            $berat_jenis_kering_tungku = $request->berat_kerikil_kering_tungku / ($request->berat_kerikil_ssd - $request->berat_kerikil_air);
            $berat_jenis_ssd = $request->berat_kerikil_ssd / ($request->berat_kerikil_ssd - $request->berat_kerikil_air);
            $persentase_penyerapan = ($request->berat_kerikil_ssd - $request->berat_kerikil_kering_tungku) * 100 / $request->berat_kerikil_kering_tungku;

            $data = PengujianSsdAgregateKasar::create([
                'kode_uji'              => "SSDK - " . $this->kode_uji(),
                'kerikil_asal'            => $request->kerikil_asal,
                'berat_kerikil_ssd'     => $request->berat_kerikil_ssd, //A
                'berat_kerikil_air'         => $request->berat_kerikil_air, //B
                'berat_kerikil_kering_tungku'                    => $request->berat_kerikil_kering_tungku, //C
                'berat_jenis_mutlak' => $berat_jenis_mutlak,
                'berat_jenis_kering_tungku' => $berat_jenis_kering_tungku,
                'berat_jenis_ssd' => $berat_jenis_ssd,
                'presentase_penyerapan' => $persentase_penyerapan,
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
            $berat_jenis_mutlak = $request->berat_kerikil_kering_tungku / ($request->berat_kerikil_kering_tungku - $request->berat_kerikil_air);
            $berat_jenis_kering_tungku = $request->berat_kerikil_kering_tungku / ($request->berat_kerikil_ssd - $request->berat_kerikil_air);
            $berat_jenis_ssd = $request->berat_kerikil_ssd / ($request->berat_kerikil_ssd - $request->berat_kerikil_air);
            $persentase_penyerapan = $request->berat_kerikil_ssd - $request->berat_kerikil_kering_tungku / $request->berat_kerikil_kering_tungku * 10;

            $user = PengujianSsdAgregateKasar::find($request->id);
            $data = $user->update([
                'kerikil_asal'            => $request->kerikil_asal,
                'berat_kerikil_ssd'     => $request->berat_kerikil_ssd, //A
                'berat_kerikil_air'         => $request->berat_kerikil_air, //B
                'berat_kerikil_kering_tungku'                    => $request->berat_kerikil_kering_tungku, //C
                'berat_jenis_mutlak' => $berat_jenis_mutlak,
                'berat_jenis_kering_tungku' => $berat_jenis_kering_tungku,
                'berat_jenis_ssd' => $berat_jenis_ssd,
                'persentase_penyerapan' => $persentase_penyerapan,
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

        $data = PengujianSsdAgregateKasar::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function cetakBerat(Request $request)
    {

        $data = PengujianSsdAgregateKasar::find($request->id);

        return view('backend.ssdkasar.cetak', compact('data'));
    }
}
