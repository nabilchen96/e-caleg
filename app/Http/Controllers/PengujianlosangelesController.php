<?php

namespace App\Http\Controllers;

use App\Models\PengujianLosAngeles;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PengujianlosangelesController extends Controller
{
    public function index()
    {
        return view('backend.losangeles.index');
    }

    public function data()
    {

        if (Auth::user()->role == 'Admin') {
            $beratisi = DB::table('pengujian_los_angeles');
        } else if (Auth::user()->role == 'Pengguna') {
            $beratisi = DB::table('pengujian_los_angeles')->where('user_id', Auth::user()->id);
        }
        $beratisi = $beratisi->get();

        return response()->json(['data' => $beratisi]);
    }

    public function kode_uji()
    {
        $datas =  DB::select("SELECT MAX(RIGHT(kode_uji, 4)) as lastid FROM pengujian_los_angeles");
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
            'gradasi'      => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        } else {

            $a = $request->berat_benda_uji;
            $b = $request->berat_benda_uji_sesudah_pertama;
            $c = $request->berat_benda_uji_sesudah_kedua;
            $keausan_1 = ($a - $b) / $a * 100;
            $keausan_2 = ($a - $c) / $a * 100;
            $total = $keausan_1 + $keausan_2;

            if ($total == 27) {
                $kelas_pubi_desk = "Kontruksi Berat/Beton Kelas III";
            } else if ($total >= 27 && $total <= 30) {
                $kelas_pubi_desk = "Konstruksi Sedang/Beton Kelas II";
            } else if ($total >= 40 && $total <= 50) {
                $kelas_pubi_desk = "Konstruksi Ringan/Beton Kelas I";
            }

            $data = PengujianLosAngeles::create([
                'kode_uji'              => "LA - " . $this->kode_uji(),
                'kerikil_asal'          => $request->kerikil_asal,
                'gradasi'               => $request->gradasi,
                'berat_benda_uji'       => $request->berat_benda_uji,
                'berat_benda_uji_sesudah_pertama'                    => $request->berat_benda_uji_sesudah_pertama,
                'berat_benda_uji_sesudah_kedua'                    => $request->berat_benda_uji_sesudah_kedua,
                'keausan_1' => $keausan_1,
                'keausan_2' => $keausan_2,
                'total_keausan' => $total,
                'kelas_pubi_desk' => $kelas_pubi_desk,
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
            $a = $request->berat_benda_uji;
            $b = $request->berat_benda_uji_sesudah_pertama;
            $c = $request->berat_benda_uji_sesudah_kedua;
            $keausan_1 = ($a - $b) / $a * 100;
            $keausan_2 = ($a - $c) / $a * 100;
            $total = $keausan_1 + $keausan_2;

            if ($total == 27) {
                $kelas_pubi_desk = "Kontruksi Berat/Beton Kelas III";
            } else if ($total >= 27 && $total <= 30) {
                $kelas_pubi_desk = "Konstruksi Sedang/Beton Kelas II";
            } else if ($total >= 40 && $total <= 50) {
                $kelas_pubi_desk = "Konstruksi Ringan/Beton Kelas I";
            }


            $user = PengujianLosAngeles::find($request->id);
            $data = $user->update([
                'kerikil_asal'          => $request->kerikil_asal,
                'gradasi'               => $request->gradasi,
                'berat_benda_uji'       => $request->berat_benda_uji,
                'berat_benda_uji_sesudah_pertama'    => $request->berat_benda_uji_sesudah_pertama,
                'berat_benda_uji_sesudah_kedua'      => $request->berat_benda_uji_sesudah_kedua,
                'keausan_1' => $keausan_1,
                'keausan_2' => $keausan_2,
                'total_keausan' => $total,
                'kelas_pubi_desk' => $kelas_pubi_desk,
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

        $data = PengujianLosAngeles::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function cetakBerat(Request $request)
    {

        $data = PengujianLosAngeles::find($request->id);

        return view('backend.losangeles.cetak', compact('data'));
    }
}
