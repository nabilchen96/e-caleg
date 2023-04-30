<?php

namespace App\Http\Controllers;

use App\Models\PengujianBeratIsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Auth;

class PengujianBeratIsiController extends Controller
{
    public function index()
    {
        return view('backend.beratisihalus.index');
    }

    public function data()
    {

        if (Auth::user()->role == 'Admin') {
            $beratisi = DB::table('pengujian_berat_isis');
        } else if (Auth::user()->role == 'Pengguna') {
            $beratisi = DB::table('pengujian_berat_isis')->where('user_id', Auth::user()->id);
        }
        $beratisi = $beratisi->get();

        return response()->json(['data' => $beratisi]);
    }

    public function kode_uji()
    {
        $datas =  DB::select("SELECT MAX(RIGHT(kode_uji, 4)) as lastid FROM pengujian_berat_isis");
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
            'diameter_maksimum'      => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        } else {
            $b3 = $request->b2 - $request->b1;
            $d_konvert = $request->diameter_dalam / 10;
            $d_konvert2 = $request->tinggi_bejana_dalam / 10;
            $d_pangkat = $d_konvert ** 2;
            $v_bejana = 1 / 4 * 3.14 * $d_pangkat * $d_konvert2;

            $data = PengujianBeratIsi::create([
                'kode_uji'              => "BIH - " . $this->kode_uji(),
                'pasir_asal'            => $request->pasir_asal,
                'diameter_maksimum'     => $request->diameter_maksimum,
                'keadaan_pasir'         => $request->keadaan_pasir,
                'b1'                    => $request->b1,
                'b2'                    => $request->b2,
                'diameter_dalam'        => $request->diameter_dalam,
                'tinggi_bejana_dalam'   => $request->tinggi_bejana_dalam,
                'berat_pasir'           => $b3,
                'berat_satuan_pasir'    => number_format($b3 / $v_bejana, 6),
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
            $d_konvert = $request->diameter_dalam / 10;
            $d_konvert2 = $request->tinggi_bejana_dalam / 10;
            $d_pangkat = $d_konvert ** 2;
            $v_bejana = 1 / 4 * 3.14 * $d_pangkat * $d_konvert2;
            $user = PengujianBeratIsi::find($request->id);
            $data = $user->update([
                'pasir_asal'            => $request->pasir_asal,
                'diameter_maksimum'     => $request->diameter_maksimum,
                'keadaan_pasir'         => $request->keadaan_pasir,
                'b1'                    => $request->b1,
                'b2'                    => $request->b2,
                'diameter_dalam'        => $request->diameter_dalam,
                'tinggi_bejana_dalam'   => $request->tinggi_bejana_dalam,
                'berat_pasir'           => $b3,
                'berat_satuan_pasir'    => round($b3 / $v_bejana, 6),
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

        $data = PengujianBeratIsi::find($request->id)->delete();

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Dihapus'
        ];

        return response()->json($data);
    }

    public function cetakBerat(Request $request)
    {

        $data = PengujianBeratIsi::find($request->id);

        return view('backend.beratisihalus.cetak', compact('data'));
    }
}
