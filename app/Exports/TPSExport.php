<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class TPSExport implements FromView
{
    public function view(): View
    {
        $data = DB::table('tps as t')
                ->join('kelurahans as k', 'k.id', '=', 't.id_kelurahan')
                ->join('kecamatans as kc', 'kc.id', '=', 'k.id_kecamatan')
                ->join('dapils as d', 'd.id', '=', 'kc.id_dapil')
                ->select(
                    't.*', 
                    'k.kelurahan', 
                    'kc.kecamatan', 
                    'd.dapil', 
                    'd.kabupaten'
                )
                ->get();

        return view('backend.tps.export', [
            'data' => $data
        ]);
    }
}
