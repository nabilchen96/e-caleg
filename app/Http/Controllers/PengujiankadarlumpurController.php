<?php

namespace App\Http\Controllers;

use App\Models\PengujianKadarLumpur;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengujiankadarlumpurController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $baru = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '0')->get();
            $verif = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '1')->get();
            $tolak = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '2')->get();
        } else if (Auth::user()->role == 'Pengguna') {
            $baru = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '0')->where('user_id', Auth::user()->id)->get();
            $verif = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '1')->where('user_id', Auth::user()->id)->get();
            $tolak = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '2')->where('user_id', Auth::user()->id)->get();
        } else if (Auth::user()->role == 'Verifikator') {
            $baru = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '0')->get();
            $verif = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '1')->where('user_verifikator_id', Auth::user()->id)->get();
            $tolak = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '2')->where('user_verifikator_id', Auth::user()->id)->get();
        }

        if (Auth::user()->role != 'Verifikator') {
            return view('backend.kadarlumpurhalus.index', [
                'baru' => $baru->count(),
                'verif' => $verif->count(),
                'tolak' => $tolak->count(),
            ]);
        } else {
            return view('backend.verifikator.kadarlumpurhalus.index', [
                'baru' => $baru->count(),
                'verif' => $verif->count(),
                'tolak' => $tolak->count(),
            ]);
        }
    }

    public function data()
    {

        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Verifikator') {
            $beratisi = DB::table('pengujian_kadar_lumpurs')
                ->select('pengujian_kadar_lumpurs.*', 'users.name')
                ->leftJoin('users', 'users.id', 'pengujian_kadar_lumpurs.user_id')
                ->where('status_verifikasi', '0');
        } else if (Auth::user()->role == 'Pengguna') {
            $beratisi = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '0')->where('user_id', Auth::user()->id);
        }
        $beratisi = $beratisi->get();

        return response()->json(['data' => $beratisi]);
    }

    public function dataacc()
    {

        if (Auth::user()->role == 'Admin') {
            $beratisi = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '1');
        } else if (Auth::user()->role == 'Pengguna') {
            $beratisi = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '1')->where('user_id', Auth::user()->id);
        } else if (Auth::user()->role == 'Verifikator') {
            $beratisi = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '1')->where('user_verifikator_id', Auth::user()->id);
        }
        $beratisi = $beratisi->get();

        return response()->json(['data' => $beratisi]);
    }

    public function datatolak()
    {

        if (Auth::user()->role == 'Admin') {
            $beratisi = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '2');
        } else if (Auth::user()->role == 'Pengguna') {
            $beratisi = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '2')->where('user_id', Auth::user()->id);
        } else if (Auth::user()->role == 'Verifikator') {
            $beratisi = DB::table('pengujian_kadar_lumpurs')->where('status_verifikasi', '2')->where('user_verifikator_id', Auth::user()->id);
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
            'berat_pasir_1'      => 'required',
            'lampiran_bahan_uji' => 'required|mimes:pdf|max:5120',
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

            // upload file
            $pathGambar = $request->file('lampiran_bahan_uji')->store('lampiran-kadar-lumpur-halus');

            $data = PengujianKadarLumpur::create([
                'kode_uji'              => "KL - " . $this->kode_uji(),
                'pasir_asal'            => $request->pasir_asal,
                'berat_pasir_1'         => $request->berat_pasir_1,
                'berat_pasir_2'         => $request->berat_pasir_2,
                'hasil_kadar_lumpur'    => round($kadar_lumpur, 2),
                'kesimpulan'            => $kesimpulan,
                'lampiran_bahan_uji'    => $pathGambar,
                'user_id'               => Auth::user()->id,
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Ditambah'
            ];

            kirimEmail('Kadar Lumpur');
        }

        return response()->json($data);
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id'    => 'required',
            'lampiran_bahan_uji' => 'mimes:pdf|max:5120',
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

            if ($request->file('lampiran_bahan_uji')) {

                // hapus file lamanya
                Storage::delete($user->lampiran_bahan_uji);

                // upload file baru
                $pathGambar = $request->file('lampiran_bahan_uji')->store('lampiran-kadar-lumpur-halus');
            } else {
                // kalo tidak upload, ambil nilai lama pd field lampiran_bahan_uji
                $pathGambar = $user->lampiran_bahan_uji; //kota-images/namafile.ekstensi
            }

            $data = $user->update([
                'pasir_asal'            => $request->pasir_asal,
                'berat_pasir_1'         => $request->berat_pasir_1,
                'berat_pasir_2'         => $request->berat_pasir_2,
                'hasil_kadar_lumpur'    => round($kadar_lumpur, 2),
                'kesimpulan'            => $kesimpulan,
                'lampiran_bahan_uji'    => $pathGambar
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];
        }

        return response()->json($data);
    }

    public function verifikasi(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id'    => 'required',
            'status_verifikasi' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'responCode'    => 0,
                'respon'        => $validator->errors()
            ];
        } else {

            $user = PengujianKadarLumpur::find($request->id);
            $getEmail = User::find($user->user_id);

            $data = $user->update([
                'status_verifikasi'         => $request->status_verifikasi,
                'alasan'                    => $request->alasan,
                'user_verifikator_id'       => Auth::user()->id,
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Disimpan'
            ];

            kirimEmailUpdate('Kadar Lumpur', $getEmail->email, $request->status_verifikasi);
        }

        return response()->json($data);
    }

    public function delete(Request $request)
    {

        $data = PengujianKadarLumpur::find($request->id);

        // hapus filenya jika ada
        if ($data->lampiran_bahan_uji) {
            // hapus filenya
            Storage::delete($data->lampiran_bahan_uji);
        }

        $data->delete();

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
