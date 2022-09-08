<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KalkulatorController extends Controller
{
    public function index(){

        $jk         = request('jenis_kelamin');
        $lari       = request('jarak_lari');
        $pushup     = request('jumlah_push_up');
        $situp      = request('jumlah_sit_up');
        $shuttlerun = request('jumlah_shuttle_run');

        //NILAI REF
        $nilai = DB::table('aturan_nilai_samaptas')
                    ->where('untuk', $jk == '1' ? 'Taruna' : 'Taruni')
                    ->get();

        if($jk == '1'){

            $nilai_lari         = $lari >= 3507.00 ? 
                                    100 : ($lari <= 1607.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Lari')->where('jumlah', $lari)->first());

            $nilai_pushup       = $pushup >= 43.00 ?
                                    100 : ( $pushup <= 16.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Push-up')->where('jumlah', $pushup)->first());

            $nilai_situp        = $situp >= 41.00 ? 
                                    100 : ( $situp <= 14.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Sit-up')->where('jumlah', $situp)->first());

            $nilai_shuttlerun   = $shuttlerun <= 15.90 ?
                                    100 : ( $shuttlerun > 25.80 ?
                                    0 : $nilai->where('jenis_samapta', 'Shuttle Run')->where('jumlah', $shuttlerun)->first());


        }else if($jk == '0'){

            $nilai_lari         = $lari >= 2630.00 ? 
                                    100 : ($lari <= 1419.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Lari')->where('jumlah', $lari)->first());

                                    // dd($nilai_lari);

            $nilai_pushup       = $pushup >= 28.00 ?
                                    100 : ( $pushup <= 7.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Push-up')->where('jumlah', $pushup)->first());

                                    // dd($nilai_pushup);

            $nilai_situp        = $situp >= 42.00 ? 
                                    100 : ( $situp <= 14.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Sit-up')->where('jumlah', $situp)->first());

                                    // dd($nilai_situp);

            $nilai_shuttlerun   = $shuttlerun <= 17.20 ?
                                    100 : ( $shuttlerun > 27.10 ?
                                    0 : $nilai->where('jenis_samapta', 'Shuttle Run')->where('jumlah', $shuttlerun)->first());
        }

        return view('kalkulator', [
            'nilai_lari'        => $nilai_lari->nilai ?? $nilai_lari, 
            'nilai_pushup'      => $nilai_pushup->nilai ?? $nilai_pushup, 
            'nilai_situp'       => $nilai_situp->nilai ?? $nilai_situp, 
            'nilai_shuttlerun'  => $nilai_shuttlerun->nilai ?? $nilai_shuttlerun
        ]);
    }
}
