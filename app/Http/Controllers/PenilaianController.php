<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Penilaian;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PenilaianController extends Controller
{
    public function index(){

        return view('backend.penilaian.index');
    }

    public function data(){

        $data = DB::table('users')
                ->leftjoin('detail_grup_penilaians','detail_grup_penilaians.user_id', '=', 'users.id')
                ->leftjoin('gruppenilaians','gruppenilaians.id', '=', 'detail_grup_penilaians.gruppenilaian_id')
                ->leftjoin('penilaians', 'penilaians.detail_grup_penilaian_id', '=', 'detail_grup_penilaians.id')
                ->select(
                    'users.name',
                    'users.jk', 
                    'users.no_reg',
                    
                    'detail_grup_penilaians.id as detail_grup_penilaian_id',
                    'penilaians.nilai_lari',
                    'penilaians.jarak_lari',

                    'penilaians.nilai_push_up',
                    'penilaians.jumlah_push_up',

                    'penilaians.nilai_sit_up',
                    'penilaians.jumlah_sit_up',

                    'penilaians.nilai_shuttle_run',
                    'penilaians.jumlah_shuttle_run'
                    
                )
                ->whereNotNull('detail_grup_penilaians.id')
                ->where('gruppenilaians.status', 'Aktif')
                ->where('users.role', 'Peserta')
                ->get();

        return response()->json([
            'data'  => $data
        ]);
    }

    public function store(Request $request){
        dd($request->all());
        //YANG DITES
        $peserta = DB::table('users')
                    ->join('detail_grup_penilaians', 'detail_grup_penilaians.user_id', '=', 'users.id')
                    ->where('detail_grup_penilaians.id', $request->detail_grup_penilaian_id)
                    ->first();

        //NILAI REF
        $nilai = DB::table('aturan_nilai_samaptas')
                    ->where('untuk', $peserta->jk == 'Laki-laki' ? 'Taruna' : 'Taruni')
                    ->get();

        if($peserta->jk == 'Laki-laki'){

            $nilai_lari         = $request->jarak_lari >= 3507.00 ? 
                                    100 : ($request->jarak_lari <= 1607.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Lari')->where('jumlah', $request->jarak_lari)->first());

            $nilai_pushup       = $request->jumlah_push_up >= 43.00 ?
                                    100 : ( $request->jumlah_push_up <= 16.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Push-up')->where('jumlah', $request->jumlah_push_up)->first());

            $nilai_situp        = $request->jumlah_sit_up >= 41.00 ? 
                                    100 : ( $request->jumlah_sit_up <= 14.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Sit-up')->where('jumlah', $request->jumlah_sit_up)->first());

            $nilai_shuttlerun   = $request->jumlah_shuttle_run >= 15.90 ?
                                    100 : ( $request->jumlah_shuttle_run <= 25.80 ?
                                    0 : $nilai->where('jenis_samapta', 'Shuttle Run')->where('jumlah', $request->jumlah_shuttle_run)->first());

        }else{

            $nilai_lari         = $request->jarak_lari >= 2630.00 ? 
                                    100 : ($request->jarak_lari <= 1419.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Lari')->where('jumlah', $request->jarak_lari)->first());

            $nilai_pushup       = $request->jumlah_push_up >= 28.00 ?
                                    100 : ( $request->jumlah_push_up <= 7.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Push-up')->where('jumlah', $request->jumlah_push_up)->first());

            $nilai_situp        = $request->jumlah_sit_up >= 42.00 ? 
                                    100 : ( $request->jumlah_sit_up <= 14.00 ? 
                                    0 : $nilai->where('jenis_samapta', 'Sit-up')->where('jumlah', $request->jumlah_sit_up)->first());

            $nilai_shuttlerun   = $request->jumlah_shuttle_run <= 17.20 ?
                                    100 : ( $request->jumlah_shuttle_run > 27.10 ?
                                    0 : $nilai->where('jenis_samapta', 'Shuttle Run')->where('jumlah', $request->jumlah_shuttle_run)->first());

        }
        

        Penilaian::updateOrCreate(
            [
                'detail_grup_penilaian_id'  => $request->detail_grup_penilaian_id
            ],
            [
                'jarak_lari'            => $request->jarak_lari, 
                'nilai_lari'            => $nilai_lari->nilai ?? $nilai_lari, 
                'jumlah_push_up'        => $request->jumlah_push_up, 
                'nilai_push_up'         => $nilai_pushup->nilai ?? $nilai_pushup, 
                'jumlah_sit_up'         => $request->jumlah_sit_up, 
                'nilai_sit_up'          => $nilai_situp->nilai ?? $nilai_situp, 
                'jumlah_shuttle_run'    => $request->jumlah_shuttle_run, 
                'nilai_shuttle_run'     => $nilai_shuttlerun->nilai ?? $nilai_shuttlerun,

                'panitia_id'            => Auth::user()->id ?? 1,
                'detail_grup_penilaian_id'  => $request->detail_grup_penilaian_id
            ]
        );

        $data = [
            'responCode'    => 1,
            'respon'        => 'Data Sukses Ditambah'
        ];

        return response()->json($data);
    }
}
