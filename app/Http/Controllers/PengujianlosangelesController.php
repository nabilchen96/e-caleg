<?php

namespace App\Http\Controllers;

use App\Models\PengujianLosAngeles;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengujianlosangelesController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $baru = DB::table('pengujian_los_angeles')->where('status_verifikasi', '0')->get();
            $verif = DB::table('pengujian_los_angeles')->where('status_verifikasi', '1')->get();
            $tolak = DB::table('pengujian_los_angeles')->where('status_verifikasi', '2')->get();
        } else if (Auth::user()->role == 'Pengguna') {
            $baru = DB::table('pengujian_los_angeles')->where('status_verifikasi', '0')->where('user_id', Auth::user()->id)->get();
            $verif = DB::table('pengujian_los_angeles')->where('status_verifikasi', '1')->where('user_id', Auth::user()->id)->get();
            $tolak = DB::table('pengujian_los_angeles')->where('status_verifikasi', '2')->where('user_id', Auth::user()->id)->get();
        } else if (Auth::user()->role == 'Verifikator') {
            $baru = DB::table('pengujian_los_angeles')->where('status_verifikasi', '0')->get();
            $verif = DB::table('pengujian_los_angeles')->where('status_verifikasi', '1')->where('user_verifikator_id', Auth::user()->id)->get();
            $tolak = DB::table('pengujian_los_angeles')->where('status_verifikasi', '2')->where('user_verifikator_id', Auth::user()->id)->get();
        }

        if (Auth::user()->role != 'Verifikator') {
            return view('backend.losangeles.index', [
                'baru' => $baru->count(),
                'verif' => $verif->count(),
                'tolak' => $tolak->count(),
            ]);
        } else {
            return view('backend.verifikator.losangeles.index', [
                'baru' => $baru->count(),
                'verif' => $verif->count(),
                'tolak' => $tolak->count(),
            ]);
        }
    }

    public function data()
    {

        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Verifikator') {
            $beratisi = DB::table('pengujian_los_angeles')
                ->select('pengujian_los_angeles.*', 'users.name')
                ->leftJoin('users', 'users.id', 'pengujian_los_angeles.user_id')
                ->where('status_verifikasi', '0');
        } else if (Auth::user()->role == 'Pengguna') {
            $beratisi = DB::table('pengujian_los_angeles')->where('status_verifikasi', '0')->where('user_id', Auth::user()->id);
        }
        $beratisi = $beratisi->get();

        return response()->json(['data' => $beratisi]);
    }

    public function dataacc()
    {

        if (Auth::user()->role == 'Admin') {
            $beratisi = DB::table('pengujian_los_angeles')->where('status_verifikasi', '1');
        } else if (Auth::user()->role == 'Pengguna') {
            $beratisi = DB::table('pengujian_los_angeles')->where('status_verifikasi', '1')->where('user_id', Auth::user()->id);
        } else if (Auth::user()->role == 'Verifikator') {
            $beratisi = DB::table('pengujian_los_angeles')->where('status_verifikasi', '1')->where('user_verifikator_id', Auth::user()->id);
        }
        $beratisi = $beratisi->get();

        return response()->json(['data' => $beratisi]);
    }

    public function datatolak()
    {

        if (Auth::user()->role == 'Admin') {
            $beratisi = DB::table('pengujian_los_angeles')->where('status_verifikasi', '2');
        } else if (Auth::user()->role == 'Pengguna') {
            $beratisi = DB::table('pengujian_los_angeles')->where('status_verifikasi', '2')->where('user_id', Auth::user()->id);
        } else if (Auth::user()->role == 'Verifikator') {
            $beratisi = DB::table('pengujian_los_angeles')->where('status_verifikasi', '2')->where('user_verifikator_id', Auth::user()->id);
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
            'gradasi'      => 'required',
            'lampiran_bahan_uji' => 'required|mimes:pdf|max:5120',
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
            } else {
                $kelas_pubi_desk = "Konstruksi Ringan/Beton Kelas III";   
            }

            // upload file
            $pathGambar = $request->file('lampiran_bahan_uji')->store('lampiran-los-angeles');

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
                'lampiran_bahan_uji' => $pathGambar,
                'user_id'               => Auth::user()->id,
            ]);

            $data = [
                'responCode'    => 1,
                'respon'        => 'Data Sukses Ditambah'
            ];

            kirimEmail('Los Angeles Machine');
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

            if ($request->file('lampiran_bahan_uji')) {

                // hapus file lamanya
                Storage::delete($user->lampiran_bahan_uji);

                // upload file baru
                $pathGambar = $request->file('lampiran_bahan_uji')->store('lampiran-los-angeles');
            } else {
                // kalo tidak upload, ambil nilai lama pd field lampiran_bahan_uji
                $pathGambar = $user->lampiran_bahan_uji; //kota-images/namafile.ekstensi
            }

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
                'lampiran_bahan_uji' => $pathGambar
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

            $user = PengujianLosAngeles::find($request->id);
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

            kirimEmailUpdate('Los Angeles Machine', $getEmail->email, $request->status_verifikasi);
        }

        return response()->json($data);
    }

    public function delete(Request $request)
    {

        $data = PengujianLosAngeles::find($request->id);

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

        $data = PengujianLosAngeles::find($request->id);

        return view('backend.losangeles.cetak', compact('data'));
    }
}
