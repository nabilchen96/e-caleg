<?php

namespace App\Http\Controllers;

use App\Models\PengujianBeratIsiKasar;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PengujianberatisikasarController extends Controller
{
    public function index()
    {
        return view('backend.beratisikasar.index');
    }

    public function data()
    {

        $beratisi = DB::table('pengujian_berat_isi_kasars');
        $beratisi = $beratisi->get();

        return response()->json(['data' => $beratisi]);
    }

    public function kode_uji()
    {
        $datas =  DB::select("SELECT MAX(RIGHT(kode_uji, 4)) as lastid FROM pengujian_berat_isi_kasars");
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
            'diameter_maksimum'      => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        } else {
            $b3 = $request->b2 - $request->b1;
            $d_konvert = $request->diameter_dalam/10;
            $d_konvert2 = $request->tinggi_bejana_dalam/10;
            $d_pangkat = $request->diameter_dalam ** 2;
            $v_bejana = 1 / 4 * 3.14 * $d_pangkat * $request->tinggi_bejana_dalam;

            $data = PengujianBeratIsiKasar::create([
                'kode_uji'              => "BIHK - " . $this->kode_uji(),
                'kerikil_asal'          => $request->kerikil_asal,
                'diameter_maksimum'     => $request->diameter_maksimum,
                'keadaan_kerikil'       => $request->keadaan_kerikil,
                'b1'                    => $request->b1,
                'b2'                    => $request->b2,
                'diameter_dalam'        => $request->diameter_dalam,
                'tinggi_bejana_dalam'   => $request->tinggi_bejana_dalam,
                'berat_kerikil_tumbuk'  => $b3,
                'berat_satuan_kerikil_tumbuk'  => number_format($b3 / $v_bejana,6),
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
            $b3 = $request->b2 - $request->b1;
            $d_konvert = $request->diameter_dalam/10;
            $d_konvert2 = $request->tinggi_bejana_dalam/10;
            $d_pangkat = $d_konvert ** 2;
            $v_bejana = 1 / 4 * 3.14 * $d_pangkat * $d_konvert2;
            $user = PengujianBeratIsiKasar::find($request->id);
            $data = $user->update([
                'kerikil_asal'          => $request->kerikil_asal,
                'diameter_maksimum'     => $request->diameter_maksimum,
                'keadaan_kerikil'       => $request->keadaan_kerikil,
                'b1'                    => $request->b1,
                'b2'                    => $request->b2,
                'diameter_dalam'        => $request->diameter_dalam,
                'tinggi_bejana_dalam'   => $request->tinggi_bejana_dalam,
                'berat_kerikil_tumbuk'  => $b3,
                'berat_satuan_kerikil_tumbuk'  => number_format($b3 / $v_bejana,6),
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

        $data = PengujianBeratIsiKasar::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function cetakBerat(Request $request)
    {

        $data = PengujianBeratIsiKasar::find($request->id);

        return view('backend.beratisikasar.cetak',compact('data'));
    }
}
