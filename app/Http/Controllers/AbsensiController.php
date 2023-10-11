<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Absensi;
use Auth;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    public function index(){

        if(Request('id_pegawai') != 'Semua Pegawai'){

            //jika id pegawai pilihan
            $data = DB::table('absensis')
                    ->join('users', 'users.id', '=', 'absensis.id_pegawai')
                    ->select(
                        'absensis.*', 
                        'users.name'
                    )
                    ->where('absensis.id_pegawai', Request('id_pegawai'))
                    ->whereBetween('absensis.tanggal', [Request('tanggal_awal'), Request('tanggal_akhir')])
                    ->orderBy('created_at', 'DESC')->get();
        }else{

             //jika id pegawai pilihan
             $data = DB::table('absensis')
             ->join('users', 'users.id', '=', 'absensis.id_pegawai')
             ->select(
                 'absensis.*', 
                 'users.name'
             )
             ->orderBy('created_at', 'DESC')->get();
        }

        return view('backend.absensi.index', [
            'data'  => $data
        ]);
    }

    public function data(){
        
        $data = DB::table('absensis')
                ->join('users', 'users.id', '=', 'absensis.id_pegawai')
                ->select(
                    'absensis.*', 
                    'users.name'
                )
                ->get();

        return response()->json(['data' => $data]);
    }

    public function store(Request $request){

        $scan_masuk = '';
        $scan_pulang = '';
        $terlambat = '';
        $pulang_cepat = '';

        //cek jadwal user
        $jadwal = DB::table('jadwals')
                    ->whereDate('tanggal_awal_shift', '<=', date('Y-m-d'))
                    ->whereDate('tanggal_akhir_shift', '>=', date('Y-m-d'))
                    ->where('id_pegawai', Auth::id())
                    ->first();

        //cek shift
        $shift = DB::table('shifts')->where('id', $jadwal->id_shift)->first();

        // dd($jadwal, $shift);

        //tentukan masuk atau pulang
        $sekarang = (date("H:i:s"));
        $awal_masuk = ($shift->awal_masuk);
        $batas_masuk = ($shift->batas_masuk);
        $terlambat_masuk = ($shift->terlambat_masuk);
        $awal_pulang = ($shift->awal_pulang);
        $batas_pulang = ($shift->batas_pulang);

        //jika terjadi penyeberangan hari
        //ini masih harus diperbaiki
        if($batas_masuk < $awal_masuk){

        }else{
            //jika jam scan saat ini lebih besar atau sama dengan dari jam awal masuk
            //dan jam scan saat ini lebih kecil atau sama dengan dari jam batas datang
            if($sekarang >= $awal_masuk && $sekarang <= $batas_masuk){

                
                $scan_masuk = $sekarang;

                //tentukan telat
                if($sekarang > $terlambat_masuk && $sekarang < $batas_masuk){

                    $new_sekarang = new \DateTime($sekarang);
                    $new_terlambat_masuk = new \DateTime($terlambat_masuk);
                    $selisih = $new_sekarang->diff($new_terlambat_masuk);
                    $selisih = $selisih->format('%H:%I:%S');

                    //total jam terlambat
                    $terlambat = $selisih;
                }

            
            //jika jam scan lebih besar atau sama dengan jam awal pulang
            //dan jika jam scan lebih kecil dari batas jam pulang --> hitung pulang tepat

            //atau jika jam scan lebih besar dari batas jam masuk
            //dan jika jam scan lebih kecil dari awal pulang --> hitung pulang cepat
            }elseif($sekarang >= $awal_pulang && $sekarang <= $batas_pulang 
            || $sekarang > $batas_masuk && $sekarang < $awal_pulang){

                $scan_pulang = $sekarang;

                if($sekarang < $awal_pulang){

                    $new_sekarang = new \DateTime($sekarang);
                    $new_awal_pulang = new \DateTime($awal_pulang);
                    $selisih = $new_awal_pulang->diff($new_sekarang);
                    $selisih = $selisih->format('%H:%I:%S');

                    $pulang_cepat = $selisih;

                }
            
            //kondisi diluar itu
            }else{

                // dd('tidak dapat absen diluar waktu');

                return redirect('/absensi');
            }
        }

        
        $cek = DB::table('absensis')
                ->where('id_pegawai', Auth::id())
                ->where('tanggal', date('Y-m-d'))
                ->first();

        
        if($scan_masuk != ''){

            Absensi::updateOrInsert(
                [
                    'id_pegawai'    => Auth::id(),
                    'tanggal'       => date("Y-m-d"),
                ],
                [
                    'id_pegawai'    => Auth::id(), 
                    'tanggal'       => date("Y-m-d"), 
                    'scan_masuk'    => $scan_masuk, 
                    'terlambat'     => $terlambat, 
                ]
            );

        }else{

            Absensi::updateOrInsert(
                [
                    'id_pegawai'    => Auth::id(),
                    'tanggal'       => date("Y-m-d"),
                ],
                [
                    'id_pegawai'    => Auth::id(), 
                    'tanggal'       => date("Y-m-d"), 
                    'scan_pulang'   => $scan_pulang, 
                    'pulang_cepat'  => $pulang_cepat
                ]
            );
        }
        


        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Ditambah'
        ];

        return redirect('/absensi');
    }
}
