<?php

namespace App\Http\Controllers;

use App\Models\AnalisaSaringanHalus;
use App\Models\GradasiKasar;
use App\Models\PengujianBeratIsi;
use App\Models\PengujianBeratIsiKasar;
use App\Models\PengujianKadarLumpur;
use App\Models\PengujianLosAngeles;
use App\Models\PengujianSsdAgregateKasar;
use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $berat_isi_kasar = PengujianBeratIsiKasar::where('status_verifikasi','1')->get();
            $gradasi_kasar = GradasiKasar::where('status_verifikasi','1')->get();
            $ssd_kasar = PengujianSsdAgregateKasar::where('status_verifikasi','1')->get();
            $los_angeles_kasar = PengujianLosAngeles::where('status_verifikasi','1')->get();
            $kadar_lumpur_halus = PengujianKadarLumpur::where('status_verifikasi','1')->get();
            $berat_isi_halus = PengujianBeratIsi::where('status_verifikasi','1')->get();
            $analisa_saringan_halus = AnalisaSaringanHalus::where('status_verifikasi','1')->get();
            $ssd_halus = AnalisaSaringanHalus::where('status_verifikasi','1')->get();
        } else if(Auth::user()->role == "Pengguna") {
            $berat_isi_kasar = PengujianBeratIsiKasar::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $gradasi_kasar = GradasiKasar::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $ssd_kasar = PengujianSsdAgregateKasar::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $los_angeles_kasar = PengujianLosAngeles::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $kadar_lumpur_halus = PengujianKadarLumpur::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $berat_isi_halus = PengujianBeratIsi::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $analisa_saringan_halus = AnalisaSaringanHalus::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $ssd_halus = AnalisaSaringanHalus::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
        }

        return view('backend.dashboard', [
            'bi_kasar' => $berat_isi_kasar->count(),
            'gradasi_kasar' => $gradasi_kasar->count(),
            'ssd_kasar' => $ssd_kasar->count(),
            'los_angeles_kasar' => $los_angeles_kasar->count(),
            'kadar_lumpur_halus' => $kadar_lumpur_halus->count(),
            'berat_isi_halus' => $berat_isi_halus->count(),
            'analisa_saringan_halus' => $analisa_saringan_halus->count(),
            'ssd_halus' => $ssd_halus->count(),
        ]);
    }
}
