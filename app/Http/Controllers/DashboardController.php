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

            $berat_isi_kasar_new = PengujianBeratIsiKasar::where('status_verifikasi','0')->get();
            $gradasi_kasar_new = GradasiKasar::where('status_verifikasi','0')->get();
            $ssd_kasar_new = PengujianSsdAgregateKasar::where('status_verifikasi','0')->get();
            $los_angeles_kasar_new = PengujianLosAngeles::where('status_verifikasi','0')->get();
            $kadar_lumpur_halus_new = PengujianKadarLumpur::where('status_verifikasi','0')->get();
            $berat_isi_halus = PengujianBeratIsi::where('status_verifikasi','0')->get();
            $analisa_saringan_halus_new = AnalisaSaringanHalus::where('status_verifikasi','0')->get();
            $ssd_halus_new = AnalisaSaringanHalus::where('status_verifikasi','0')->get();
        } else if(Auth::user()->role == "Pengguna") {
            $berat_isi_kasar = PengujianBeratIsiKasar::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $gradasi_kasar = GradasiKasar::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $ssd_kasar = PengujianSsdAgregateKasar::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $los_angeles_kasar = PengujianLosAngeles::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $kadar_lumpur_halus = PengujianKadarLumpur::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $berat_isi_halus = PengujianBeratIsi::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $analisa_saringan_halus = AnalisaSaringanHalus::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $ssd_halus = AnalisaSaringanHalus::where('user_id', Auth::user()->id )->where('status_verifikasi','1')->get();

            $berat_isi_kasar_new = PengujianBeratIsiKasar::where('user_id', Auth::user()->id )->where('status_verifikasi','0')->get();
            $gradasi_kasar_new = GradasiKasar::where('user_id', Auth::user()->id )->where('status_verifikasi','0')->get();
            $ssd_kasar_new = PengujianSsdAgregateKasar::where('user_id', Auth::user()->id )->where('status_verifikasi','0')->get();
            $los_angeles_kasar_new = PengujianLosAngeles::where('user_id', Auth::user()->id )->where('status_verifikasi','0')->get();
            $kadar_lumpur_halus_new = PengujianKadarLumpur::where('user_id', Auth::user()->id )->where('status_verifikasi','0')->get();
            $berat_isi_halus_new = PengujianBeratIsi::where('user_id', Auth::user()->id )->where('status_verifikasi','0')->get();
            $analisa_saringan_halus_new = AnalisaSaringanHalus::where('user_id', Auth::user()->id )->where('status_verifikasi','0')->get();
            $ssd_halus_new = AnalisaSaringanHalus::where('user_id', Auth::user()->id )->where('status_verifikasi','0')->get();

            
        } else if(Auth::user()->role == "Verifikator") {
            $berat_isi_kasar = PengujianBeratIsiKasar::where('user_verifikator_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $gradasi_kasar = GradasiKasar::where('user_verifikator_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $ssd_kasar = PengujianSsdAgregateKasar::where('user_verifikator_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $los_angeles_kasar = PengujianLosAngeles::where('user_verifikator_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $kadar_lumpur_halus = PengujianKadarLumpur::where('user_verifikator_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $berat_isi_halus = PengujianBeratIsi::where('user_verifikator_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $analisa_saringan_halus = AnalisaSaringanHalus::where('user_verifikator_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            $ssd_halus = AnalisaSaringanHalus::where('user_verifikator_id', Auth::user()->id )->where('status_verifikasi','1')->get();
            
            $berat_isi_kasar_new = PengujianBeratIsiKasar::where('status_verifikasi','0')->get();
            $gradasi_kasar_new = GradasiKasar::where('status_verifikasi','0')->get();
            $ssd_kasar_new = PengujianSsdAgregateKasar::where('status_verifikasi','0')->get();
            $los_angeles_kasar_new = PengujianLosAngeles::where('status_verifikasi','0')->get();
            $kadar_lumpur_halus_new = PengujianKadarLumpur::where('status_verifikasi','0')->get();
            $berat_isi_halus_new = PengujianBeratIsi::where('status_verifikasi','0')->get();
            $analisa_saringan_halus_new = AnalisaSaringanHalus::where('status_verifikasi','0')->get();
            $ssd_halus_new = AnalisaSaringanHalus::where('status_verifikasi','0')->get();
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

            'bi_kasar_new' => $berat_isi_kasar_new->count(),
            'gradasi_kasar_new' => $gradasi_kasar_new->count(),
            'ssd_kasar_new' => $ssd_kasar_new->count(),
            'los_angeles_kasar_new' => $los_angeles_kasar_new->count(),
            'kadar_lumpur_halus_new' => $kadar_lumpur_halus_new->count(),
            'berat_isi_halus_new' => $berat_isi_halus_new->count(),
            'analisa_saringan_halus_new' => $analisa_saringan_halus_new->count(),
            'ssd_halus_new' => $ssd_halus_new->count(),
        ]);
    }
}
