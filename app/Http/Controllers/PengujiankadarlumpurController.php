<?php

namespace App\Http\Controllers;

use App\Models\PengujianKadarLumpur;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PengujiankadarlumpurController extends Controller
{
    public function index()
    {
        return view('backend.kadarlumpurhalus.index');
    }

    public function data()
    {

        if (Auth::user()->role == 'Admin') {
            $beratisi = DB::table('pengujian_kadar_lumpurs');
        } else if (Auth::user()->role == 'Pengguna') {
            $beratisi = DB::table('pengujian_kadar_lumpurs')->where('user_id', Auth::user()->id);
        }
        $beratisi = $beratisi->get();

        return response()->json(['data' => $beratisi]);
    }

    public function kode_uji()
    {
        $datas =  DB::select("SELECT MAX(RIGHT(kode_uji, 4)) as lastid FROM pengujian_kadar_lumpurs");
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
            'berat_pasir_1'      => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        } else {
            $kadar_lumpur = ($request->berat_pasir_1 - $request->berat_pasir_2) / $request->berat_pasir_1 * 100;

            if ($kadar_lumpur <= 5) {
                $kesimpulan = "Sesuai";
            } else {
                $kesimpulan = "Tidak Sesuai";
            }

            $data = PengujianKadarLumpur::create([
                'kode_uji'              => "KL - " . $this->kode_uji(),
                'pasir_asal'            => $request->pasir_asal,
                'berat_pasir_1'         => $request->berat_pasir_1,
                'berat_pasir_2'         => $request->berat_pasir_2,
                'hasil_kadar_lumpur'    => round($kadar_lumpur, 2),
                'kesimpulan'            => $kesimpulan,
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
            $kadar_lumpur = ($request->berat_pasir_1 - $request->berat_pasir_2) / $request->berat_pasir_1 * 100;

            if ($kadar_lumpur <= 5) {
                $kesimpulan = "Sesuai";
            } else {
                $kesimpulan = "Tidak Sesuai";
            }

            $user = PengujianKadarLumpur::find($request->id);
            $data = $user->update([
                'pasir_asal'            => $request->pasir_asal,
                'berat_pasir_1'         => $request->berat_pasir_1,
                'berat_pasir_2'         => $request->berat_pasir_2,
                'hasil_kadar_lumpur'    => round($kadar_lumpur, 2),
                'kesimpulan'            => $kesimpulan,
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

        $data = PengujianKadarLumpur::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function cetakBerat(Request $request)
    {

        $data = PengujianKadarLumpur::find($request->id);

        return view('backend.kadarlumpurhalus.cetak', compact('data'));
    }
}
